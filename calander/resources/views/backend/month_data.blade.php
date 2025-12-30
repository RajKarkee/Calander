<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .editable input {
        width: 100%;
        height: 100%;
        border: none;
        padding: 6px;
        font-size: inherit;
        font-family: inherit;
        background: transparent;
        outline: none;
    }

    .loading-overlay {
        position: fixed;
        inset: 0;
        background: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .spinner {
        width: 48px;
        height: 48px;
        border: 4px solid #ddd;
        border-top-color: #198754;
        border-radius: 50%;
        animation: spin 0.9s linear infinite;
    }

    .loading-text {
        margin-top: 10px;
        font-size: 14px;
        color: #333;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <button id="fetchapi">Fetch API Data</button>
    <button id="fetchDbData">Fetch DB Data</button>
    <div id="loadingOverlay" class="loading-overlay" style="display:none;">
        <div class="spinner"></div>
        <div class="loading-text">Fetching data…</div>
    </div>

    <h1>Add Events for Month: {{ $month }}</h1>

    <form method="POST" action="{{ route('add.month.data', ['month' => $month]) }}" id="monthForm">
        @csrf
        <input type="hidden" name="month" value="{{ $month }}">
        <table border="1" cellpadding="10" id="calendarTable">
            <tr>
                <th>Sn</th>
                <th>Date</th>
                <th>Event</th>
                <th>Holiday</th>
                <th>Extra Event</th>
                <th>Date Text</th>
                <th>Notes</th>
            </tr>
            @for ($i = 1; $i <= 32; $i++)
                @php
                    $datekey = "2082-{$month}-$i";
                    $day = $data->get($datekey);
                    if (!isset($data[$datekey])) {
                        $day = [
                            'date' => '--',
                            'holiday' => false,
                            'event' => '',
                            'text' => '',
                            'notes' => '',
                        ];
                    }
                @endphp
                <tr data-date="{{ $datekey }}">
                    <td>{{ $i }}</td>
                    <td>{{ $datekey }}</td>
                    @if ($day)
                        <td class="editable" data-field="event">{{ ($day['date'] ?? '') !== '--' ? $day['date'] : '' }}
                        </td>
                        <td class="editable" data-field="holiday">{{ $day['holiday'] ? 'Yes' : '' }}</td>
                        <td class="editable" data-field="extra_event">{{ $day['event'] ?? '' }}</td>
                        <td class="editable" data-field="date_text">{{ $day['text'] ?? '' }}</td>
                        <td class="editable" data-field="notes"></td>
                    @else
                        <td class="editable" data-field="event"></td>
                        <td class="editable" data-field="holiday"></td>
                        <td class="editable" data-field="extra_event"></td>
                        <td class="editable" data-field="date_text"></td>
                        <td class="editable" data-field="notes"></td>
                    @endif
                </tr>
            @endfor
        </table>
        <br>
        <button type="submit" class="btn btn-success">Save Month Data</button>
    </form>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>
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
                const date = row.getAttribute('data-date');
                row.querySelectorAll('.editable').forEach(td => {
                    const field = td.getAttribute('data-field');
                    const input = td.querySelector('input');
                    const value = input ? input.value.trim() : td.innerText.trim();
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = `data[${date}][${field}]`;
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

        const fetchApiBtn = document.getElementById('fetchapi');
        fetchApiBtn.addEventListener('click', function() {
            const message = prompt(
                'Are you sure you want to fetch API data? This will overwrite current table data. yes/no');
            if (message.toLowerCase() == 'yes') {
                showLoader();
                toggleEditing(true);
                $.ajax({
                    url: '/admin/add-month-data/{[month=>{ $month }]}',
                    type: 'GET',
                    success: function(response) {
                        populateTable(response);
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
                const date = row.getAttribute('data-date');
                const dayData = data[date];
                row.querySelectorAll('.editable').forEach(td => {
                    const field = td.dataset.field;
                    if (dayData && dayData[field] !== undefined) {
                        if (field === 'holiday') {
                            td.innerText = dayData[field] ? 'Yes' : '';

                        } else {
                            td.innerText = dayData[field] ?? '';
                        }
                    } else {
                        td.textContent = '';
                    }
                });
            });
        }
    </script>
</body>

</html>
