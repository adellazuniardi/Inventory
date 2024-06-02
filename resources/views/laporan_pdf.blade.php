<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        h1 {
            margin-bottom: 0;
        }
        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>TELKOM YOGYAKARTA</h1>
    <hr>
    <h2>Laporan Gudang</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Gudang</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Nama PIC</th>
                <th>Kontak PIC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->namabarang }}</td>
                    <td>{{ $row->gudang->gudang }}</td>
                    <td>{{ $row->tanggal_masuk }}</td>
                    <td>{{ $row->tanggal_keluar }}</td>
                    <td>{{ $row->namapic }}</td>
                    <td>{{ $row->kontakpic }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
