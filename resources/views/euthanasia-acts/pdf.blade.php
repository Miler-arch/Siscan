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

        <h3 class="mb-4 text-decoration-underline">ACTA CONSEJO CONSULTIVO EUTANASIA CANINA</h3>

        {{ $euthanasia_act->reason }} <br>

        CONSIDERANDO: <br>
        {{ $euthanasia_act->considering }} <br>
        POR LO TANTO: <br>
        {{ $euthanasia_act->therefore }} <br>
        RESUELVE: <br>
        {{ $euthanasia_act->solve }} <br>

        <table class="mt-2 mb-2">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>SEXO</th>
                    <th>EDAD</th>
                    <th>COLOR</th>
                    <th>RAZA</th>
                    <th>TATUAJE</th>
                    <th>OBSERAVACIONES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $euthanasia_act->dog->name }}</td>
                    <td>{{ $euthanasia_act->dog->gender }}</td>
                    <td>{{ $euthanasia_act->dog->birthdate }}</td>
                    <td>{{ $euthanasia_act->dog->color }}</td>
                    <td>{{ $euthanasia_act->dog->race }}</td>
                    <td>{{ $euthanasia_act->dog->tattoo }}</td>
                    <td>{{ $euthanasia_act->observation }}</td>
                </tr>
            </tbody>
        </table>

            INSTRUCTOR
            ENCARGADO DE POBLACIÓN CANINA
            PRIMER VOCAL
            SEGUNDO VOCAL
            DR. MÉDICO VETERINARIO
            JEFE DE CURSO
            PRESIDENTE DEL CONSEJO CONSULTIVO
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
