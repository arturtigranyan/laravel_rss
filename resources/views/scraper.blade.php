@extends('layout')
@section('content')
<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
    {{$scrapers->links()}}
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
    @foreach ($scrapers as $scraper)
      <tr>
        <td>{{$scraper->title}}</td>        
        <td>{{$scraper->description}}</td>        
        <td><img width="200px" src="images/{{$scraper->image_name}}"> </td>   
        <td>{{$scraper->created_at}}</td>        
        <td>{{$scraper->link}}</td>  
        <td>
            <a href="{{url('edit/'.$scraper->id)}}">Edit</a>         | 
            <a href="{{url('delete/'.$scraper->id)}}">Delete</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
        {{$scrapers->links()}}
</div>
@endsection