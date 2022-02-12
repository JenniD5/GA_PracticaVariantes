<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit variant</h1>
    @if(Session::has('sucess'))
    <p style="color:green;">{{Session::get('sucess')}}</p>
    @endif

    @if(Session::has('error'))
    <p style="color:red;">{{Session::get('error')}}</p>
    @endif
    <a href="{{route('variantes.index')}}">Back to list</a>
    <form method="post" action="{{route('variantes.update',  $variante->id)}}">
        @csrf
        @method('put')
        <label>Lineage</label>
        <input type="text" name="lineage" value="{{$variante->lineage}}">
        <br/>
        <label>Common countries</label>
        <textarea name="common_countries" rows="6">{{$variante->common_countries}}</textarea>
        <br/>
        <label> earliest date</label>
        <input type="text" name=  "earliest_date" value="{{$variante->earliest_date}}">
        <br/>
        <label> designated number</label>
        <input type="text" name=  "designated_number" value="{{$variante->designated_number}}">
        <br/>
        <label> assigned number</label>
        <input type="text" name=  "assigned_number" value="{{$variante->assigned_number}}">
        <br/>
        <label> description</label>
        <textarea name="description" rows="10">{{$variante->description}}</textarea>
        <br/>
        <label> who name</label>
        <input type="text" name=  "who_name" value="{{$variante->who_name}}">
        <br/>
        <button type="submit">Update</button>

    </form>
</body>
</html>