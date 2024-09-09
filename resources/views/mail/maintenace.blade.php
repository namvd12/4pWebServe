<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenace plan</title>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #04AA6D;
        color: white;
    }

    #customers td {
        color: black;
    }

    .header{
        text-align: center;
    }

    .footer p{
        text-align: center;
    }

    </style>
</head>
<body>
    <div class="header">
        <h2>Warning List of maintenance plans</h2>
        <h3>{{ date("d-m-Y")}}</h3>
    </div>
        <p>Hello {{ $name }},<br> {{config('app.name')}} sends you a list of devices that are due for maintenance.</p>
        <table id = "customers">
            <thead>
                <tr>
                    <th>Line</th>
                    <th>Machine</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Cycles</th>
                    <th>Time Lates</th>
                    <th>Time Maintenace</th>
                    <th>Time Remaining</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($listMachineWarning as $machineWarning) 
                    <tr>
                        <td>{{ $machineWarning['line'] }}</td>
                        <td>{{ $machineWarning['deviceName'] }}</td>        
                        <td>{{ $machineWarning['item'] }}</td>
                        <td>{{ $machineWarning['status'] }}</td>
                        <td>{{ $machineWarning['cycles'] }}</td>
                        <td>{{ $machineWarning['timeLates'] }}</td>
                        <td>{{ $machineWarning['timeMaintenace'] }}</td>
                        <td>{{ $machineWarning['timeRemaining'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <P>Click<a href="{{ $_SERVER['SERVER_ADDR'] }}"> here</a> to view detail Job Order.</P>
        <p>Thanks,<br>
            {{ config('app.name') }}</p>   
    <div class="footer">
        <p>© {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
    </div>
</body>
</html>
