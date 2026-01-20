@extends('backend.layout.app')
@section('content')
    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="dashboard-header">
            <div>
                <h1 class="page-title">Edit Month Events: {{ $month }}</h1>
                <p class="page-subtitle">Add and manage events for all days in this month</p>
            </div>
            <div>
                <button id="fetchapi" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i>
                    Fetch API Data
                </button>
            </div>
        </div>

        <div id="loadingOverlay" class="loading-overlay" style="display:none;">
            <div class="spinner"></div>
            <div class="loading-text">Fetching data…</div>
        </div>

        <div class="content-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-calendar-alt"></i>
                    Calendar Events for Month {{ $month }}
                </h2>
                <div class="card-subtitle">
                    Click on any cell to edit. Changes will be saved when you submit the form.
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.month.data.edit', ['month' => $month]) }}" id="monthForm">
                    @csrf
                    <input type="hidden" name="month" value="{{ $month }}">

                    <div class="table-responsive">
                        <table class="month-data-table" id="calendarTable">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">S.N.</th>
                                    <th style="width: 120px;">BS Date</th>
                                    <th style="width: 120px;">AD Date</th>
                                    <th style="width: 200px;">Event</th>
                                    <th style="width: 100px;">Holiday</th>
                                    <th style="width: 180px;">Extra Event</th>
                                    <th style="width: 150px;">Tithi/Date Text</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= $daysInMonth; $i++)
                                    @php
                                        $datekey = "{$year}-{$month}-$i";
                                        $day = $events[$datekey] ?? null;
                                    @endphp
                                    <tr data-date="{{ $datekey }}">
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="bs-date">{{ $datekey }}</td>
                                        <td class="addate" data-field="ad-date" id='ad-date'></td>
                                        <td class="editable" data-field="event">
                                            {{ $day && $day->title !== '--' ? $day->title : '' }}
                                        </td>
                                        <td class="editable text-center" data-field="holiday">
                                            {{ $day && $day->is_holiday ? 'Yes' : '' }}
                                        </td>
                                        <td class="editable" data-field="extra_event">
                                            {{ $day ? $day->extra_events : '' }}
                                        </td>
                                        <td class="editable" data-field="date_text">
                                            {{ $day ? $day->tithi : '' }}
                                        </td>
                                        <td class="editable" data-field="notes">
                                            {{ $day ? $day->notes : '' }}
                                        </td>
                                        <input type="hidden" class="ad-date-input">
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>

                    <div class="form-actions" style="margin-top: 24px;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Month Data
                        </button>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Back to Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src={{ asset('js/nepali.datepicker.min.js') }}></script>
        <script>
            document.querySelectorAll('#calendarTable tr[data-date]').forEach((row, index) => {

                const bsDate = row.getAttribute('data-date');
                const adDate = NepaliFunctions.BS2AD(`{{ $year }}-{{ $month }}-${index+1}`);
                if (!adDate) return;

                const adTd = row.querySelector('.addate');
                if (adTd) adTd.innerText = adDate;
                row.querySelector('.ad-date-input').value = adDate;



            });
        </script>
        <script>
            document.addEventListener('click', function(e) {
                const td = e.target.closest('.editable');
                if (!td || td.querySelector('input')) return;
                const value = td.innerText.trim();
                const input = document.createElement('input');
                input.type = 'text';
                input.value = value;
                td.innerText = '';
                td.appendChild(input);
                input.focus();
                input.addEventListener('blur', () => {
                    td.textContent = input.value;

                });
                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        input.blur();
                    }
                });
            });
            document.getElementById('monthForm').addEventListener('submit', function() {
                document.querySelectorAll('#calendarTable tr[data-date]').forEach(row => {
                    const bsDate = row.dataset.date;
                    const adDate = row.querySelector('.ad-date-input').value;
                    //data lai send garene structure ma
                    const adInput = document.createElement('input');
                    adInput.type = 'hidden';
                    adInput.name = `data[${bsDate}][ad_date]`;
                    adInput.value = adDate;
                    this.appendChild(adInput);
                    row.querySelectorAll('.editable').forEach(td => {
                        const field = td.getAttribute('data-field');
                        const input = td.querySelector('input');
                        const value = input ? input.value.trim() : td.innerText.trim();
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = `data[${bsDate}][${field}]`;
                        hiddenInput.value = value;
                        document.getElementById('monthForm').appendChild(hiddenInput);
                    });
                });
            })
            const loadingOverlay = document.getElementById('loadingOverlay');

            function showLoader() {
                loadingOverlay.style.display = 'flex';
            }

            function hideLoader() {
                loadingOverlay.style.display = 'none';
            }

            function toggleEditing(disabled) {
                document.querySelectorAll('.editable').forEach(td => {
                    td.style.pointerEvents = disabled ? 'none' : 'auto';
                    td.style.opacity = disabled ? '0.6' : '1';
                });
            }
            const month = {{ $month }};

            const fetchApiBtn = document.getElementById('fetchapi');
            fetchApiBtn.addEventListener('click', function() {
                const message = prompt(
                    'Are you sure you want to fetch API data? This will overwrite current table data. yes/no');
                if (message.toLowerCase() == 'yes') {
                    showLoader();
                    toggleEditing(true);
                    $.ajax({
                        url: `/admin/api/month-data/${month}`,
                        type: 'GET',
                        success: function(response) {
                            populateTable(response);
                            console.log(response);
                        },
                        error: function(error) {
                            console.error('Error fetching API data:', error);
                            alert('Error fetching API data: ' + error.message);
                        },
                        complete: function() {
                            hideLoader();
                            toggleEditing(false);
                        }

                    });
                } else {
                    return;
                }
            });

            function populateTable(data) {
                document.querySelectorAll('#calendarTable tr[data-date]').forEach(row => {

                    const date = row.dataset.date;
                    const apiDay = data[date];
                    if (!apiDay) {
                        row.querySelector('editable').forEach(td => {
                            td.innerText = '';
                        });
                    }
                    row.querySelector('[data-field="event"]').innerText = apiDay.date !== '--' ? apiDay.date : '';
                    row.querySelector('[data-field="holiday"]').innerText = apiDay.holiday ? 'Yes' : '';
                    row.querySelector('[data-field="extra_event"]').innerText = apiDay.event || '';
                    row.querySelector('[data-field="date_text"]').innerText = apiDay.text || '';
                    row.querySelector('[data-field="notes"]').innerText = '';
                });
            }
        </script>
    @endpush
@endsection
