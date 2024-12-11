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
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button {
            padding: 5px;
            color: green;
            border: 0.5px;
        }
        tbody {
            background-color: #f9f9f9;
            color: #333;
        }
        tbody tr:hover {
            background-color: #d1e7dd;
        }
        tbody td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }
        .alert {
            padding: 10px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <button onclick="location.href='{{ route('export.csv') }}'">Export CSV</button>
    <br><br>

    @if (session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ url('/dashboard') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email">

        <label for="priority">Choose a priority level</label>
        <select name="priority" id="priority">
            <option value="">Select priority</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <label for="option">Option</label>
        <select name="option" id="option">
            <option value="">Select option</option>
            <option value="technical support">Technical support</option>
            <option value="sale">Sale</option>
            <option value="else">Else</option>
        </select>

        <label for="updated_at">Time</label>
        <select name="updated_at" id="updated_at">
            <option value="">Select time</option>
            <option value="old">Old</option>
            <option value="new">New</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <br><br>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Message</th>
                <th>Option</th>
                <th>Priority</th>
                <th>Uploaded</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->option }}</td>
                    <td>{{ $contact->priority }}</td>
                    <td>{{ $contact->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $contacts->links() }}
    <br>
    <button><a href="login.blade.php">Log out</a></button>
</body>
</html>
