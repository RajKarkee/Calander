<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<style>
    .grid {
        display: grid;
        grid-template-columns: 0.2fr 2fr;
        gap: 10px;
    }

    .sidebar {
        background-color: #f4f4f4;
        padding: 15px;
        height: 100vh;
    }
</style>

<body>
    <h1>Welcome to the Admin Panel</h1>
    <div class="containerfluid">
        <div class ='grid'>
            <div class="sidebar">
                <h3>Sidebar</h3>
            </div>
            <div class="main-content">
                <h3>
                    <button class="btn btn-primary" type="button" id="addEventBtn">Add Event</button>
                    <table border="1" cellpadding="10">
                        <tr>
                            <th>Sn</th>
                            <th>Date</th>
                            <th>Events</th>
                            <th>Holidays</th>
                            <th>Extra Events</th>
                            <th>Notes</th>
                        </tr>
                        <tr>
                            <td>Data 1</td>
                            <td>Data 2</td>
                            <td>Data 1</td>
                            <td>Data 2</td>
                            <td>Data 1</td>
                            <td>Data 2</td>
                        </tr>
                </h3>
            </div>
        </div>
    </div>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>
    <script>
        let calendarData = [];
        const addEventBtn = document.getElementById('addEventBtn');
        addEventBtn.onclick = function() {
            const promt = prompt('Do you want to load the event yes/No');
            console.log(promt);
            if (promt.toLowerCase() === 'yes') {

                $.ajax({
                    url: '/admin/load-event',
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        const arr1 = response.calendarSummary[0].days;
                        const arr2 = response.calendarSummary[1].days;
                        console.log(arr1);
                        console.log(arr2);
                        calendarData = response.calendarSummary;
                        alert('Event Loaded Successfully');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Error loading events ' +
                            xhr.message);
                    }
                });


            } else {
                alert('Event Loading Cancelled');
            }
        }
    </script>
</body>

</html>
