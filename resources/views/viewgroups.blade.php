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
        
                <tr>
                  
                    <td>{{$group->title}}</td>
           
                    <td>{{$group->description}}</td>
                   
                    <td align="center">
                    
    			 
                    @if(in_array(Auth::id(), $userid))
                     <form action="{{route('group.leave')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-danger">{{__('Leave')}}</button>
                    </form>
                     </td> 
                     @else
                
                    <form action="{{route('group.join')}}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" value="{{$group->id}}" name="id">
                        <button type="submit" class="btn btn-success">{{__('Join')}}</button>
                    </form>
                    @endif
               
                
         
      @foreach($members as $mem)
			<td>{{$mem}}</td>   
	         
                       
 </tr>
            </tbody>
 @endforeach
        </table>
       
    

    </div>

@endsection
    
    			