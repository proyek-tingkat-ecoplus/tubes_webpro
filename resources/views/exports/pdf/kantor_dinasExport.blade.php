<!DOCTYPE html>
<html>
<head>
    <title>Data Kantor Dinas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #264417;
            margin-bottom: 10px;
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
            padding: 12px;
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
        <p>Data Kantor Dinas</p>
    </div>
    <h1>Data Kantor Dinas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Website</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantor_dinas as $data )
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->bio }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->kode_pos }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->website }}</td>
                <td>{{ $data->tanggal_jam_buka }}</td>
                <td>{{ $data->tanggal_jam_tutup }}</td>
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
