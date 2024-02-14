<!doctype html>
<html lang="en">
    <head>
        <title>Ficha Clinica</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        {{-- bootstrap 4 --}}
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZfzisyJ6BdOzFLkhJ5uoXf3Tx"
            crossorigin="anonymous">
    </head>
    <style>
        body{
            color: #479459;
            font-weight: bold;
            font-style: italic;
        }

        .bg-success{
            background-color: #75c487 !important;
        }

        h1{
            font-size: 16px;
            padding: 2px;
            color: white;
            font-weight: bold;
        }

        hr{
            border: 1px solid rgb(219, 131, 131);
            margin: 0px;
        }

        .ws {
            position: relative;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: #4cb0bd;
            margin-bottom: 24.5px;
        }

        .overlay-text {
            position: absolute;
            top: 0;
            left: 0;
            line-height: 25px;
            z-index: 1;
        }
    </style>

    <body>
        <div class="bg-success">
            <h1 class="text-center">FICHA CLINICA - CENTRO VETERINARIO AA TARIJA</h1>
        </div>
        <span>
            PROPIETARIO: {{ $clinical_records->client->name }}
        </span>
        <span class="float-right">
            CELULAR: {{ $clinical_records->client->phone }}
        </span>
        <div class="bg-success">
            <h1>DATOS DEL PACIENTE</h1>
        </div>
        <span>
            NOMBRE: {{ $clinical_records->animal->name }}
        </span>
        <span class="ml-5">
            ESPECIE: {{ $clinical_records->animal->specie }}
        </span>
        <span class="ml-5">
            RAZA: {{ $clinical_records->animal->race }}
        </span>
        <span class="ml-5">
            SEXO: {{ $clinical_records->animal->gender }}
        </span>
        <hr>
        <span>
            ESTERILIZADO: {{ $clinical_records->sterilized }}
        </span>
        <span class="ml-5">
            TEMP: {{ $clinical_records->temp }}
        </span>
        <span class="ml-5">
            PESO: {{ $clinical_records->weight }}
        </span>
        <span class="ml-5">
            EDAD: {{ $clinical_records->age }}
        </span>
        <span class="ml-5">
            COLOR: {{ $clinical_records->color }}
        </span>
        <span class="ml-4">
            FECHA: {{ $clinical_records->date }}
        </span>

        <div class="ws" style="position: relative;">
            @for ($i = 0; $i < 22; $i++)
                <div class="line"></div>
            @endfor
            <p class="overlay-text">
                {{ $clinical_records->observation }}
            </p>
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
