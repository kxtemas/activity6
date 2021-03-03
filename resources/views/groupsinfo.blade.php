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
			<th>Details</th>
		</tr>
	</thead>
	<tbody>
		@foreach($list as $group)
		<tr>

			<td>{{$group->title}}</td>

			<!--  <td>{{$group->description}}</td>-->

			<td align="center">
				
				     
    			<form action="{{route('group.actions',$group->id)}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$group->id}}" name="id">
                            <button class="btn btn-info" type="submit">Details</button>
                        </form>
			</td> 
			@endforeach
		</tr>
	</tbody>

</table>



</div>

@endsection

