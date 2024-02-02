<!doctype html>
<html lang="en">
    <head>
        <title>Solicitud de Atención Médica</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .td, .th {
            border: 1px dotted #030303;
        }

        h3 {
            text-align: center;
            text-decoration: underline;
        }

        td, th {
            border: 2px solid #111111;
            text-align: center;
            padding: 4px;
        }
    </style>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th class="th">POLICIA BOLIVIANA</th>
                    <th class="th">CÓDIGO: F-VET-01</th>
                    <th class="th">VERSIÓN: 0 Pág. N° 1</th>
                </tr>
            </thead>
        </table>

        <h3 class="mb-4">SOLICITUD DE ATENCIÓN VETERINARIA</h3>

        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>NOMBRE DEL CAN</th>
                    <th>TATUAJE / CHIP</th>
                    <th>SIGNOS CLINICOS</th>
                    <th>NOMBRE DEL SOLICITANTE</th>
                    <th>FIRMA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attentions as $attention)
                    <tr>
                        <td>{{ $attention->id }}</td>
                        <td>{{ $attention->created_at }}</td>
                        <td>{{ $attention->dog->name }}</td>
                        <td>
                            @if($attention->dog->tattoo == null)
                                {{ $attention->dog->chip }}
                            @else
                                {{ $attention->dog->tattoo }}
                            @endif
                        </td>
                        <td>{{ $attention->clinical_signs }}</td>
                        <td>{{ $attention->applicant_name }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
