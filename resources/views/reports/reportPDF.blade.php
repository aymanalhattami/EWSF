<html>
    <head>
        <title>PDF Reports</title>
        <style>
            table{
                width: 70%;
                margin: 0 auto;
                border: 1px solid #000000;
            }
            table th, table td{
                border: 1px solid #000000;
                text-align: center;
            }
            .re-header{
                text-align: center
            }

            .re-header div{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="re-header">
            <p style="word-wrap:break-word; float: left; width: 30%; ">Early Warning System For Floods</p>
            <img src="file:///C:/wamp64/www/ewsf/public/images/EWSF logo.png" width="150">
            <div style="float: right; width: 30%">
                <span><?php echo date("Y-m-d") ?></span> | <span><?php date_default_timezone_set('Asia/Kuwait'); echo date('h:i') ?></span>
                <h4 style="font-style: italic">Report by:</h4>
                <h4 style="font-style: normal">{{ auth()->user()->name }}</h4>
            </div>

            <div style="clear: both"></div>
        </div>

        <hr/>
        <div>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sensor 1</th>
                    <th>Sensor 2</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allSensorData as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->arduino_1 }}</td>
                        <td>{{ $s->arduino_2 }}</td>
                        <td>{{ $s->created_at }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </body>
</html>