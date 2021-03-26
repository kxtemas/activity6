@extends('layouts.app')

@section('content')
           
<div class="card">
    <div class="card-header">
        <h2 class="h2 m-auto">Search For Jobs</h2>
    </div>
    <div class="card-body">
        <form action="{{route('job.search')}}" method="post">
        @csrf
            <!--SearchBar-->
            <div class="form-group">
                <label for="searchInput">Search:</label>
                <input type="text" class="form-control" id="keywordInput" name="keyword">
            </div>
            
            <button class="btn btn-danger" type="submit">Search</button> 
        </form>
    </div>
</div>
@endsection
