<!DOCTYPE html>
<html>
<head>
    <title>Data Report Alat</title>
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
        <p>Data Pemetaan Alat</p>
    </div>
    <h1>Data Report Alat</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Judul Report</th>
                {{-- <th>Deskripsi</th> --}}
                {{-- <th>Binwas</th> --}}
                <th>Status</th>
                <th>Tahun Operasi</th>
                {{-- <th>Address</th> --}}
                <th>Tanggal</th>
                {{-- <th>Approved By</th>
                <th>Rejected By</th> --}}
                {{-- <th>Created At</th>
                <th>Updated At</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($pemetaan as $data )
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->alat->kode_alat }}</td>
                <td>{{ $data->alat->nama_alat }}</td>
                <td>{{ $data->judul_report }}</td>
                {{-- <td>{{ $data->deskripsi }}</td>
                <td>{{ $data->binwas }}</td> --}}
                <td>{{ $data->status }}</td>
                <td>{{ $data->tahun_operasi }}</td>
                {{-- <td>{{ $data->address }}</td> --}}
                <td>{{ $data->tanggal }}</td>
                {{-- <td>{{ $data->approved_by->username ?? '-' }}</td>
                <td>{{ $data->rejected_by->username ?? '-' }}</td> --}}
                {{-- <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td> --}}
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
