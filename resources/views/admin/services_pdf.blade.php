<!DOCTYPE html>
<html>

<head>
    <title>Data Services</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>DATA SERVICES</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Deskripsi</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
    <img src="{{ public_path('image/' . $service->foto) }}" width="100">
</td>
                    <td>{{ $service->nama }}</td>
                    <td>{{ $service->desc }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
