<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PLP-PRO-602-REG-02 Entrega de insumos</title>
    <style>
        @page {
            margin-top: 1cm;
            margin-bottom: 0cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        body {
            margin-top: 120px;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 50px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 9px;
            color: #353535;
        }


        /* Estilo para los bordes de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .head th,
        .head td {
            border: 1px solid black;
        }

        .cuerpo {
            font-size: 0.6rem;
        }

        .cuerpo th,
        .cuerpo td {
            padding: 0.1rem 0.2rem;
            width: 15px;

        }

        .cel-img img {
            width: 100%;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        .cont_div {
            font-size: 0.6rem;
        }
    </style>
    <style>
        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }



        .page-number:before {
            content: "Página " counter(page);

        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.6rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }



        /*header*/
        .header-table {
            width: 100%;
            border-collapse: collapse;

        }

        .header-td1 {
            width: 20%;
            text-align: left;
            vertical-align: middle;
            background-color: white;
        }

        .header-td2 {
            width: 60%;
            text-align: center;
            font-size: 0.6rem;
            vertical-align: middle;
            background-color: white;

        }

        .header-td3 {
            width: 20%;
            text-align: right;
            font-size: 0.6rem;
            vertical-align: middle;
            background-color: white;
        }

        /*cuerpo tabla*/
        .contenido table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }


        .contenido th {
            color: #fff;
            background-color: #5e5d5d;

        }

        .contenido tr:nth-child(odd) td {
            background-color: #eee;
        }


        /*para firmas*/
        .signatures {
            width: 100%;
            margin-top: 50px;
            align-items: center;
        }

        .signature-row {
            clear: both;
            /* Forzar un salto de línea después de cada fila */
        }

        .signature {
            width: 17%;
            /* Ancho de cada columna de firma con un margen para evitar desbordamientos */
            float: left;
            padding: 5px;
            margin: 5px;
            /* Margen entre las firmas */
            text-align: center;

            /* Borde alrededor de cada firma */
            font-size: 0.6rem;
            margin-bottom: 40px;
        }

        .signature p {
            margin: 0;
            padding: 0;
        }

        .table-container {
            width: 100%;
            font-weight: normal;


        }

        .table-container td {
            vertical-align: top;
            /* Alinea las tablas al tope */
        }

        .table-container tr {
            border: 1px solid black;
            text-align: center;
            padding-left: 2px|px;
            /* Alinea las tablas al tope */
        }

        .table-container th {
            font-weight: normal;
            /* Alinea las tablas al tope */
        }

        .columna_principal {
            text-align: left;

        }

        .columna_secundaria {}
    </style>
    <style>
        .capitalize {
            text-transform: capitalize;
        }

        /* Estilo para la tabla con la clase "mi-tabla" */
        table.mi-tabla {
            page-break-inside: avoid;
            width: 40%;
            border-collapse: collapse;
            /* Colapsa los bordes de las celdas */
            border: 1px solid #000;
            /* Borde externo de la tabla */
        }

        /* Estilo para las cabeceras de la tabla con la clase "mi-tabla" */
        table.mi-tabla th {
            padding: 8px;
            text-align: left;
            background-color: #f2f2f2;
            /* Color de fondo para las cabeceras */
        }

        /* Estilo para las celdas del cuerpo de la tabla con la clase "mi-tabla" */
        table.mi-tabla td {
            padding: 4px;
            text-align: left;
        }

        /* Estilo para las celdas de cabecera en la primera fila de la tabla con la clase "mi-tabla" */
        table.mi-tabla thead th {
            border-bottom: 2px solid #000;
            /* Borde inferior más grueso para las cabeceras */
        }
    </style>
    <style>
        .table-pdf {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        .table-pdf th,
        .table-pdf td {
            border: 1px solid #ddd;
            padding: 4px;
            font-size: 10px;
            text-align: left;
        }

        .table-pdf th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .icon {
            width: 15px;
            height: 15px;
            display: inline-block;
        }

        .warning-details {
            font-size: 8px;
            background-color: #fff3cd;
            padding: 5px;
            border-radius: 3px;
            margin-top: 2px;
        }
    </style>
</head>
<header>
    <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
        <tr>
            <th class="cel-img" style="width: 20%;"><img src="img/logo/logocompleto.png" alt=""></th>
            <th style="width: 55%;">REGISTRO</th>
            <th style="width: 25%; font-size: 0.8rem">PLP - PRO - 604 - REG - 01 <br> Versión 003 <br>
                <div class="page-number"></div>
            </th>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">SEGUIMIENTO - EVACUACIÓN DE RESIDUOS SÓLIDOS</td>
        </tr>
    </table>
</header>

<body>



    <footer>
        SOALPRO SRL - Planta Panaderia - Reporte generado el {{ date('d/m/Y') }}
        <div class="page-number"></div>
    </footer>

    <div class="page">
        <main>

            <table class="table-pdf">
                <thead>
                <tr>
                    <th nowrap>Fecha</th>
                    <th nowrap>Zunino</th>
                    <th nowrap>Molde</th>
                    <th nowrap>Hiline</th>
                    <th nowrap>Repostería</th>
                    <th nowrap>BK</th>
                    <th nowrap>Grissin</th>
                    <th nowrap>Hornos</th>
                    <th nowrap>Codificado</th>
                    <th nowrap>Embolsado T1</th>
                    <th nowrap>Embolsado T2</th>
                    <th>Embolsado Pan Molde</th>
                    <th nowrap>Embolsado BK</th>
                    <th>Embolsado Repostería</th>
                    <th>Embolsado Grissin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reporte as $fila)
                    <tr>
                        <td nowrap>
                            {{ \Carbon\Carbon::parse($fila['fecha'])->format('d/m/y') }}
                            (06:01)
                            a
                            {{ \Carbon\Carbon::parse($fila['fecha'])->addDay()->format('d/m/y') }}
                            (06:00)
                        </td>
                        <td>{{ $fila['zunino'] }}</td>
                        <td>{{ $fila['molde'] }}</td>
                        <td>{{ $fila['hiline'] }}</td>
                        <td>{{ $fila['reposteria'] }}</td>
                        <td>{{ $fila['bk'] }}</td>
                        <td>{{ $fila['grissin'] }}</td>
                        <td>{{ $fila['hornos'] }}</td>
                        <td>{{ $fila['codificado'] }}</td>
                        <td>{{ $fila['embolsado_t1'] }}</td>
                        <td>{{ $fila['embolsado_t2'] }}</td>
                        <td>{{ $fila['embolsado_pan_molde'] }}</td>
                        <td>{{ $fila['embolsado_bk'] }}</td>
                        <td>{{ $fila['embolsado_reposteria'] }}</td>
                        <td>{{ $fila['embolsado_grissin'] }}</td>
                    </tr>
                @endforeach
            </tbody>

            </table>
        </main>

        <div style="margin-top: 100px">
            <div style=" display: flex; justify-content: flex-end;  page-break-inside: avoid; ">
                <div style="padding-left: 650px; ">
                    <strong
                        style=" border-top: 1px solid #000; padding-top: 7px; padding-right: 25px; padding-left: 25px; ">
                        REVISADO </strong>
                </div>


            </div>


        </div>

    </div>
</body>

</html>
