<?php

namespace App\Http\Controllers;
use Pratiksh\Nepalidate\Services\NepaliDate;
use Illuminate\Support\Facades\Http;
use carbon\carbon;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index(){

        $now =NepaliDate::create(Carbon::now('Asia/Kathmandu'))->toBS();
   

$NepaliDate=NepaliDate::create(\Carbon\Carbon::now())->toBS(); // 2082-02-04
// NepaliDate::create(\Carbon\Carbon::now())->toFormattedEnglishBSDate(); // 4 Jestha 2082, Sunday
// $NepaliDate=NepaliDate::create(\Carbon\Carbon::now())->toFormattedNepaliBSDate(); // ४ जेठ २०८२, आइतवार
        $details=toDetailBS(\carbon\carbon::now('Asia/Kathmandu'));
        // dd($NepaliDate,$now,$detailsnm);
        return view('calendar.layout.app');
    }
    public function adminIndex(Request $request){
        if($request->isMethod('post')){
            // Handle POST request logic here
            return response()->json(['message' => 'POST request received']);
        }
        // Handle GET request logic here
        return view('backend.app');
    }
    public function loadEvents(){

        $response = Http::get('http://localhost:3000/api/calendar/summary');
        if($response->failed()){
             return response()->json(['error' => 'Failed to fetch events'], 500);
                    }
                    
                
                     return $response->json();
    }
    public function addMonthData(Request $request, $month){
        if($request->isMethod('post')){
     

         foreach($request ->input('data',[]) as $bsDate =>$payload){
            [$bsYear , $bsMonth, $bsDay] = array_map('intval', explode('-', $bsDate));
            CalendarEvent::updateOrCreate(
                [
                    'bs_year'=>$bsYear,
                    'bs_month'=>$bsMonth,
                    'bs_day'=>$bsDay,
                ],
                [
                    'ad_date'=>$payload['ad_date'],
                    'title'=>$payload['event'] ?? '',
                    'tithi'=>$payload['date_text'] ?? null,
                    'is_holiday'=>!empty($payload['holiday']),
                    'holiday_type'=>$payload['holiday_type'] ?? null,
                    'extra_events'=>$payload['extra_event'] ? json_encode($payload['extra_event']) : null,
                    'notes'=>$payload['notes'] ?? null,
                ]
                );
         }
         return back()->with('success','Month data saved successfully.');
        
        }
        $response= Http::get('http://localhost:3000/api/calendar/summary');
        if($response->failed()){
             return response()->json(['error' => 'Failed to fetch events'], 500);
                    }
        $calendarSummary = collect($response->json('calendarSummary'));
        $monthData=$calendarSummary->firstWhere('monthIndex', (int)$month);
        if(!$monthData){
            abort(404, 'Month data not found');
        }
        $dayByDate=collect($monthData['days'])->mapWithKeys(function($day){
         [$y,$m,$d]=explode('-',$day['nepaliDate']);
         $normalizedKey= sprintf('%d-%d-%d',$y,(int)$m,(int)$d);
         return [$normalizedKey => $day];
        });
        $daysInMonth =$request->query('days');
        $year=$request->query('year');

        $events = DB::table('calendar_events')->where('bs_year', $year)
            ->where('bs_month', $month)
            ->get()
            ->keyBy(function ($item) {
                return sprintf('%d-%d-%d', $item->bs_year, (int)$item->bs_month, (int)$item->bs_day);
            });
           
        // Display the form to add data for the specified month
        return view('backend.month_data', ['month' => $month,'events' => $events
        , 'daysInMonth' => $daysInMonth, 'data' => $dayByDate, 'year' => $year]);
    }
    public function showMonthData($month){
        $response=Http::get('http://localhost:3000/api/calendar/summary');
        if($response->failed()){
             return response()->json(['error' => 'Failed to fetch events'], 500);
        }
        $calendarSummary = collect($response->json('calendarSummary'));
        $monthData=$calendarSummary->firstWhere('monthIndex', (int)$month);
        if(!$monthData){
            return response()->json(['error' => 'Month data not found'], 404);
        }
        $dayByDate=collect($monthData['days'])->mapWithKeys(function($day){
         [$y,$m,$d]=explode('-',$day['nepaliDate']);
         $normalizedKey= sprintf('%d-%d-%d',$y,(int)$m,(int)$d);
         return [$normalizedKey => $day];
        });
      
        return response()->json($dayByDate);
    }
    public function getCalendarData($year, $month){
        $events =DB::table('calendar_events')->where('bs_year', $year)->where('bs_month',$month)->get()->keyBy(function($item){
            return sprintf('%04d-%02d-%02d', $item->bs_year, $item->bs_month, $item->bs_day);
        });
        return response()->json($events);
    }
}
