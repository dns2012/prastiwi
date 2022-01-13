<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black
        }

        tr, td, th {
            border: 1px solid black;
            text-align: left;
            padding: 5px;
        }

        td {
            padding: 10px 5px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>#</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index +=1 }}</td>
                <td>{{ $user['member_id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['password'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<script>
    window.print();
</script>