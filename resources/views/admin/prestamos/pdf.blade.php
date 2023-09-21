<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato JPS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
        }

        table td {
            text-align: center;
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Contrato de alquiler JPS</h1>
        <div class="content" contenteditable="true">
            <p>
                El empleado {{ $productos->empleado }} se hará responsable de cuidar y traer en tiempo y forma el material {{ $productos->herramienta }} dentro del tiempo estipulado, comenzado por el día {{ $productos->inicio }} y fecha de entrega {{ $productos->fin }}, en caso de daño o pérdida el empleado {{ $productos->empleado }} se hará responsable del daño y/o pérdida de la herramienta.
            </p>
            <br>
            <br>
            <table>
                <tr>
                    <td>
                        <hr>
                        Nombre y firma empleado
                    </td>
                    <td>
                        <hr>
                        Nombre y firma arrendador
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
