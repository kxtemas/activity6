@extends('layouts.app')

@section('content')
    @foreach($memberships as $membership)
        <div class="card">
            <div class="card-header">
                <h2 class="h2 m-auto" style="display: inline"><a href="{{route('group.page', $membership->group->id)}}">{{$membership->group->title}}</a></h2>
            </div>
            <div class="card-body">
                {{$membership->group->description}}
            </div>
        </div>
        <br>
    @endforeach
@endsection