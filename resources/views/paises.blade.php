<!DOCTYPE html>
<html>
<head>
    <title>Lista de Países</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Enlaza a tu archivo CSS externo -->
</head>
<body>
    <div class="header">
        <h1>Lista de Países</h1>
    </div>
    <div class="configurations">
        <ul><p class="bold">Registros a mostrar: {{ $registrosAMostrar }}</p></ul>
        <ul><p class="bold">Población mínima: {{ $poblacionMinima }}</p></ul>
        <ul><p class="bold">Ordenar por: {{ $ordenarPor }}</p></ul>
            <ul><p class="bold">Orden: {{ $orden }}</p></ul>
    </div>
    <table>
        <thead>
            <tr>
                <th class="header-cell">País</th>
                <th class="header-cell">Capital</th>
                <th class="header-cell">Moneda</th>
                <th class="header-cell">Población</th>
                <th class="header-cell">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paises as $pais => $datos)
                <tr>
                    <td class="bold">{{ $pais }}</td>
                    <td>{{ $datos['capital'] }}</td>
                    <td>{{ $datos['moneda'] }}</td>
                    <td>{{ $datos['poblacion'] }}</td>
                    <td>{{ $datos['descripcion'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
