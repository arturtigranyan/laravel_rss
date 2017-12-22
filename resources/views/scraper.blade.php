<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Main image</th>
        <th>Data</th>
        <th>Url</th>
        <th>Actions</th>        
      </tr>
    </thead>
    <tbody>       
    @foreach ($items as $item)
      <tr>
        <td>{{$item->get_title()}}</td>        
        <td>{{$item->get_description()}}</td>        
        <td><img width="200px" src="{{$item->get_enclosure()->link}}"> </td>   
        <td>{{$item->get_date()}}</td>        
        <td>{{$item->get_link()}}</td>                  
        
        <td>
            <a href="{{url('edit/10')}}">Edit</a>         | 
            <a href="{{url('edit/10')}}">Delete</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
