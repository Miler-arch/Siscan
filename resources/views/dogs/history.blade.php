<!doctype html>
<html lang="en">
    <head>
        <title>Historia Clínica</title>
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

        .info {
            border: 3px solid #111111;
            border-radius: 5px;
            padding: 10px;
        }

        .text-dotted {
            border-bottom: 1px dotted #000;
        }

        .space {
            margin-left: 180px;
        }

        .space-x{
            margin-left: 80px;
            font-weight: bold;
        }

        .space-date{
            margin-left: 200px;
            font-weight: bold;
        }
    </style>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th class="th">POLICIA BOLIVIANA</th>
                    <th class="th">CÓDIGO: F-VET-02</th>
                    <th class="th">VERSIÓN: 0 Pág. N° 1</th>
                </tr>
            </thead>
        </table>

        <h3 class="mb-4">HISTORIA CLÍNICA</h3>
        <div class="info">
            <b>NOMBRE DEL CAN</b> <span class="text-dotted">{{$dog->name}}</span><span class="space"> <b>TATUAJE</b> </span><span class="text-dotted">{{$dog->tattoo}}</span><br>
            <b>RAZA</b> <span class="text-dotted">{{$dog->race}}</span> <span class="space-x">EDAD</span> <span class="text-dotted">{{$dog->birthdate}}</span> <span class="space-x">COLOR</span> <span class="text-dotted">{{$dog->color}}</span>
        </div>

        <div class="mt-2">
            @foreach ($medicalHistories as $medicalHistory)
                <b>ANAMNESIS</b> <span class="text-dotted">{{$medicalHistory->anamnesis}}</span> <span class="space-date">FECHA</span> <span class="text-dotted">{{$medicalHistory->date}}</span><br> <b>DIAGNÓSTICO PRESUNTIVO </b><span class="text-dotted">{{$medicalHistory->presumptive_diagnosis}}</span><br> <b>EXAMENES COMPLEMENTARIOS</b> <span class="text-dotted">{{$medicalHistory->complementary_exam}} </span><br> <b>TRATAMIENTO</b> <span class="text-dotted">{{$medicalHistory->treatment}}</span>
                <div class="mt-4">

                </div>
            @endforeach
        </div>


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
