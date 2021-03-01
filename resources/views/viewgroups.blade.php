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

        <table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
              
                <th>Group Name</th>
                <th>Group Description</th>
                <th>Actions</th>
                <th> Members</th>
            
            </tr>
            </thead>
            <tbody>
            @foreach($list as $group)
                <tr>
                  
                    <td>{{$group->title}}</td>
           
                    <td>{{$group->description}}</td>
                   
                    <td align="center">
                    
    			 
                    <form action="{{route('group.leave')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-danger">{{__('Leave')}}</button>
                    </form>
                
                    <form action="{{route('group.join')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-success">{{__('Join')}}</button>
                    </form>
               
                     </td> 
                
         
             @foreach($members as $mem)
                    <td>{{$mem}}
                  @endforeach
                   @endforeach
</tr>
            </tbody>

        </table>
         
    

    </div>

@endsection
    
    			