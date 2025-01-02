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
        <p>Data Alat Report</p>
    </div>
    <h1>Data Alat</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Jenis</th>
                <th>Kondisi</th>
                <th>Deskripsi Barang</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaris as $data )
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->kode_alat }}</td>
                <td>{{ $data->nama_alat }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->kondisi }}</td>
                <td>{{ $data->deskripsi_barang }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
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
