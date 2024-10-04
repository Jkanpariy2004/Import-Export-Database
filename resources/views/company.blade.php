<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <h2>Companies List</h2>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $companie)
                <tr>
                    <td>{{ $companie->id }}</td>
                    <td>{{ $companie->c_name }}</td>
                    <td>{{ $companie->c_email }}</td>
                    <td>{{ $companie->c_phone_no }}</td>
                    <td>{{ $companie->c_address }}</td>
                    <td>{{ $companie->city }}</td>
                    <td>{{ $companie->country }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
