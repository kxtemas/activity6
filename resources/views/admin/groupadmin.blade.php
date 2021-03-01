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
             @if(Auth::user()->usertype == 'admin')
            
@section('content')

        <table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
              
                <th>Group Name</th>
                <th>Group Description</th>
            
            </tr>
            </thead>
            <tbody>
            @foreach($list as $group)
                <tr>
                  
                    <td>{{$group->title}}</td>
           
                    <td>{{$group->description}}</td>
                 
                    <td align="center">
                    
    			<form action="{{route('admin.group.edit')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$group->id}}" name="id">
                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{action('GroupController@deleteGroup')}}" method="post"> 
                             @csrf 
                             <input type="hidden" value="{{$group->id}}" name="id">
                            <button class="btn btn-danger" type="submit">Delete</button> 
                      </form> 
                     </td> 
                </tr>
            @endforeach

            </tbody>

        </table>
  @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    
    @endif
@endsection
