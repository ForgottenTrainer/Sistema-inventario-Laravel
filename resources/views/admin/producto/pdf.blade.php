<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Documento pdf</title>
</head>
<body>
    <style>
        /* Reset some default browser styles */
        /* Main container */
        * {
            font-family: 'Roboto', sans-serif;
        }
        .container {
            width: 100%;
            margin-bottom: 1rem;
        }

        /* Heading */
        h1 {
            text-align: end;
            margin-top: 5rem;
            margin-bottom: 2rem;
            font-family: 'Roboto', sans-serif;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            font-family: 'Roboto', sans-serif;
        }

        table th,
        table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        table thead th {
            vertical-align: middle;
            border-bottom: 2px solid #dee2e6;
        }

        /* Table striped */
        .table-striped tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }


    </style>
    <main class="container">
        <h1 class="text-end mb-5 mt-5" style="text-align:right;">
            JPS Reporte de Productos
        </h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Areas</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)       
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->area }}</td>
                    <td>{{ $producto->proveedor}}</td>
                    <td>{{ $producto->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>