<?php

namespace App\Http\Controllers;
use Pratiksh\Nepalidate\Services\NepaliDate;
use Illuminate\Support\Facades\Http;
use carbon\carbon;

use Illuminate\Http\Request;

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
}
