<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <button><a href="login.blade.php">Back</a></button>
    
</body>
</html>
