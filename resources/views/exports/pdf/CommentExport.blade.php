<!DOCTYPE html>
<html>
<head>
    <title>Data Alat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #264417;
        }
        .header, .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #264417;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="header">
        <p><strong>EcoPulse</strong></p>
        <p>Data comment Report</p>
    </div>
    <h1>Data Comment</h1>
    <table>
        <thead>
            <tr>
            <th>ID</th>
                <th>Form Name</th>
                <th>Username</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comment as $data )
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->form->name }}</td>
                <td>{{ $data->parent->user->username ?? $data->user->username }}</td>
                <td>{{ $data->content }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>Generated on: {{ now() }}</p>
        <p>&copy; {{ date('Y') }} Company Name. All rights reserved.</p>
    </div>
</body>
</html>
