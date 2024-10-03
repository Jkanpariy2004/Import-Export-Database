<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Export & Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex w-100">
            <div class="m-3">
                <a href="{{ route('export.pdf') }}" class="btn btn-primary w-100">Export Data as PDF</a>
            </div>
            <div class="m-3">
                <a href="{{ route('export.csv') }}" class="btn btn-primary w-100">Export Data as CSV</a>
            </div>
            <div class="m-3">
                <a href="{{ route('export.excel') }}" class="btn btn-primary w-100">Export Data as Excel</a>
            </div>
            <div class="m-3">
                <a href="{{ route('print') }}" class="btn btn-primary w-100">Print Company Data</a>
            </div>
            <div class="m-3">
                <a href="{{ route('show.import.form') }}" class="btn btn-primary w-100">Import Data From CSV File In
                    Database</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
