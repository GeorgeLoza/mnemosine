<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLP-PRO-610-REG-02 Orden de Trabajo - Mantenimiento</title>

    <style>
        @page {
            margin: 1cm;
        }

        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 9px;
            color: #353535;
            margin: 0;
        }

        header,
        footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 50px;
        }

        header {
            top: 0;
        }

        footer {
            bottom: 0;
            text-align: center;
            font-size: 8px;
        }

        .page-number:before {
            content: "Página " counter(page);
        }

        main {
            margin-top: 110px;
            margin-bottom: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.7rem;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            vertical-align: top;
        }

        .sin-borde th,
        .sin-borde td {
            border: none;
        }

        .titulo-seccion {
            font-weight: bold;
            text-align: left;
            background-color: #f2f2f2;
            padding: 4px;
        }
    </style>

<style>
    .compact-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10px;
        table-layout: fixed;
    }
    
    .compact-table th, 
    .compact-table td {
        border: 1px solid #ddd;
        padding: 5px;
        vertical-align: top;
        word-wrap: break-word;
    }
    
    .compact-table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: center;
    }
    
    .compact-table p {
        margin: 3px 0;
        line-height: 1.2;
    }
    
    .highlight {
        background-color: #f8f8f8;
        padding: 3px;
        border-radius: 2px;
        font-size: 12px;
    }
    
    @media print {
        .compact-table {
            page-break-inside: avoid;
        }
    }
</style>

</head>

<body>

    <header>
        <table class="head">
            <tr>
                <th style="width: 20%;"><img src="img/logo/logocompleto.png" alt="" style="width: 100px;"></th>
                <th style="width: 55%;">REGISTRO</th>
                <th style="width: 25%; font-size: 0.8rem;">
                    PLP - PRO - 610 - REG - 02 <br> Versión 003 <br>
                    <div class="page-number"></div>
                </th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; padding: 0.6rem; font-weight: bold;">ORDEN DE TRABAJO -
                    MANTENIMIENTO</td>
            </tr>
        </table>
    </header>


    <main>
        <table class="compact-table">
            <thead>
                <tr>
                    <th class="titulo-seccion">Información general</th>
                    <th class="titulo-seccion">Usuarios</th>
                    <th class="titulo-seccion">Equipo / Infraestructura</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Columna 1: Información general -->
                    <td>
                        <p><strong># OT:</strong> {{ $orden->numero_ot }}</p>
                        <p><strong>Tipo de OT:</strong> {{ $orden->tipo_ot }}</p>
                        <p><strong>Estado:</strong> {{ ucfirst($orden->estado) }}</p>
                        <p><strong>Solicitud:</strong> {{ \Carbon\Carbon::parse($orden->tiempo_solicitud)->format('d/m/y') }}</p>
                        <p><strong>Respuesta:</strong> {{ $orden->tiempo_respuesta ? \Carbon\Carbon::parse($orden->tiempo_respuesta)->format('d/m/y') : 'No registrado' }}</p>
                    </td>
                    
                    <!-- Columna 2: Usuarios -->
                    <td>
                        <p><strong>Solicitante:</strong> {{ $orden->solicitante ? $orden->solicitante->name . ' ' . $orden->solicitante->lastname : 'Desconocido' }}</p>
                        <p><strong>Técnico:</strong> {{ $orden->tecnico ? $orden->tecnico->name . ' ' . $orden->tecnico->lastname : 'No asignado' }}</p>
                        <p><strong>Aprobado por:</strong> {{ $orden->aprobadoPor ? $orden->aprobadoPor->name . ' ' . $orden->aprobadoPor->lastname : 'No aprobado' }}</p>
                    </td>
                    
                    <!-- Columna 3: Equipo/Infraestructura -->
                    <td>
                        @if ($orden->maquinaEquipo)
                            <p><strong>Equipo:</strong> {{ $orden->maquinaEquipo->_interno }}</p>
                            <p><strong>Tipo:</strong> {{ $orden->maquinaEquipo->tipo ?? 'No registrado' }}</p>
                            <p><strong>Marca/Modelo:</strong> {{ ($orden->maquinaEquipo->marca ?? '') . ' ' . ($orden->maquinaEquipo->modelo ?? '') }}</p>
                        @endif
                        @if ($orden->mantenimientoInfrestructura)
                            <p><strong>Área/Subárea:</strong> {{ ($orden->mantenimientoInfrestructura->area ?? '') . ' / ' . ($orden->mantenimientoInfrestructura->subarea ?? '') }}</p>
                            <p><strong>Infraestructura:</strong> {{ $orden->mantenimientoInfrestructura->infraestructura ?? 'No especificada' }}</p>
                        @endif
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <table class="compact-table">
            <thead>
                <tr>
                    <th class="titulo-seccion">Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Desperfecto: </strong><span>{{ $orden->desperfecto }}</span></p>
                        <p><strong>Acción: </strong><span>{{ $orden->accion ?? 'Pendiente' }}</span></p>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        
        
        @if ($herramientas->count())
            <div class="tools-table-container">
                <table class="compact-table">
                    <thead>
                        <tr>
                            <th>Herramienta</th>
                            <th>Cantidad Ingreso</th>
                            <th>Responsable Ingreso</th>
                            <th>Cantidad Salida</th>
                            <th>Responsable Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($herramientas as $verif)
                            <tr>
                                <td>{{ $verif->herramienta }}</td>
                                <td>{{ $verif->cantidad_ingreso ?? '-' }}</td>
                                <td>
                                    {{ $verif->userIngreso ? $verif->userIngreso->name . ' ' . $verif->userIngreso->lastname : '-' }}
                                </td>
                                <td>{{ $verif->cantidad_salida ?? '-' }}</td>
                                <td>
                                    {{ $verif->userSalida ? $verif->userSalida->name . ' ' . $verif->userSalida->lastname : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
        
    </main>

</body>

</html>
