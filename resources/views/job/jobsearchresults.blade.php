@extends('layouts.app')
 <style>
            html, body {
                background-color: #E9967A;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            </style>
            
       
                
@section('content')

<h2>Search Results</h2>	
<table class="table table-dark table-hover">
    <thead>
    <tr class="table-bordered border-light">
      
        <th>Job Position</th>
         <th>Description</th>
        <th>Location</th>   
        <th>Employment Type</th>
       
      
    </tr>
    </thead>
    <tbody>
    @foreach($lists as $job)
   
        <tr>
          
            <td>{{$job->title}}</td>
            <td>{{$job->description}}</td>
            <td>{{$job->location}}</td>     
            <td>{{$job->employment}}</td>
           
            <td align="center">
            <form action="{{route('job.actions',$job->id)}}" method="get">
                    @csrf
                    <input type="hidden" value="{{$job->id}}" name="id">
                    <button class="btn btn-info" type="submit">Details</button>
                </form>
              </td>
        </tr>
    @endforeach
     @foreach($list as $job)
   
        <tr>
          
            <td>{{$job->title}}</td>
            <td>{{$job->description}}</td>
            <td>{{$job->location}}</td>     
            <td>{{$job->employment}}</td>
           
            <td align="center">
            <form action="{{route('job.actions',$job->id)}}" method="get">
                    @csrf
                    <input type="hidden" value="{{$job->id}}" name="id">
                    <button class="btn btn-info" type="submit">Details</button>
                </form>
              </td>
        </tr>
    @endforeach

    </tbody>

</table>  
        
                 

                       
             
  
@endsection
             