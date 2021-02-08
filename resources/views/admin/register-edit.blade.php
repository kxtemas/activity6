
@extends('layouts.app')

@section('content')

        <table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Usertype</th>
                <th>Created At</th>
                <th>Updated At</th>
           
             
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
         </tr>
                
                        <form action="{{action('AdminController@showSuspend')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button class="btn btn-warning"type="submit">Suspend</button>
                        </form>
                    </td>
                        <!--action('UserController@showSuspend')}}-->
                   
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
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                       
                </tr>
            @endforeach

            </tbody>

        </table>
   
        <h1 class="h1" align="center">Unauthorized Access</h1>
  
@endsection