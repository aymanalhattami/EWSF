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
    <table class="table table-bordered table-condense audit-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Type</th>
            <th>Action</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allAuditingData as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->user_name }}</td>
                <td>{{ $a->user_email }}</td>
                <td>{{ $a->type }}</td>
                <td>{{ $a->action }}</td>
                <td>{{ $a->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
