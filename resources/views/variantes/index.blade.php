<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de variantes Covid 19</title>
</head>
<body>
    <h1>Lista de variantes Covid19</h1>
    <p>*Actualizado al día 28 de enero</p>
    <a href="{{route('variantes.create')}}">Add variant</a>
    <table>
        <thead>
    
            <tr>

            <th>Lineage </th>
            <th>Common countries </th>
            <th>earliest date </th>
            <th>designated number </th>
            <th>assigned number </th>
            <th>descripcion </th>
            <th>who name </th>
            </tr>
        </thead>

        <tbody>
             @foreach($variantes as $variante)
             <tr>
             <td>{{$variante->lineage}}</td>
             <td>{{$variante->common_countries}}</td>
             <td>{{$variante->earliest_date}}</td>
             <td>{{$variante->designated_number}}</td>
             <td>{{$variante->assignated_number}}</td>
             <td>{{$variante->description}}</td>
             <td>{{$variante->who_name}}</td>
            
             </tr>
             @endforeach
        </tbody>
    </table>

    
   

            

    
    
</body>
</html>