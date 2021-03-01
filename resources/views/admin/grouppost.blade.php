
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
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Post a Group')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('group.add')}}" method="post">
            @csrf
            <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('Title:')}}</label>
                    <input type="text" class="form-control" id="titleInput" placeholder="Title" name="title">
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">{{__('Description:')}}</label><br>
                    <textarea class="form-control" name="description" id="descriptionInput" rows="5"
                              placeholder="Description"></textarea>

                </div>
           
            
            
                <td align="center">
                        <form action="{{action('GroupController@addGroup')}}" method="post"> 
                             @csrf 
                           
                            <button class="btn btn-danger" type="submit">Add</button> 
                      </form> 
                     </td> 
                     </form>
                     </div>
                     
                   

        </div>
  
  @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    
    @endif
@endsection
