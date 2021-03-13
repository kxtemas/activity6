
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
 @if(Auth::user()->usertype == 'admin')
        <table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
               <th> Role</th>
         
                <th colspan="2">Actions</th>
            </tr>
            </thead>
             <tbody>
             
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->email_verified_at == NULL)
                            NO
                        @else
                            YES
                        @endif
                    </td>
                    <td>
                     @if($user->usertype == "user")
                            USER
                        @else
                            ADMIN
                            @endif
                            </td>
                    <td align="center">
                        <form action="{{action('AdminController@showSuspend')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button class="btn btn-warning"type="submit">Suspend</button>
                        </form>
                    </td>
                      
                        <td align="center">
                            <form action="{{action('AdminController@showReactivate')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="id">
                                <button class="btn btn-success"type="submit">Reactivate</button>
                            </form>
                        </td>

                    <td align="center">
                        <form action="{{action('AdminController@showDelete')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}"  name="id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td align="center">
                   <button> <a href="{{url('/editprofile')}}" class="btn btn-info">Update</a></button>
                    </td>
                              
      @endforeach
            </tbody>
        </table>
        @endif
  @endsection
