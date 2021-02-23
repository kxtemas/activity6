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
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">
                {{$job->title}}
            </h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Company:</th>
                    <td>{{$job->company}}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{$job->description}}</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td>{{$job->location}}</td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>{{$job->type}}</td>
                </tr>
                <tr>
                    <th>Pay Range:</th>
                    <td>{{$job->pay_range}}</td>
                </tr>
                <tr>
                    <th>Employment Type:</th>
                    <td>{{$job->employment}}</td>
                </tr>
                <tr>
                    <th>Contact Phone Number:</th>
                    <td>{{$job->phonenumber}}</td>
                </tr>
                <tr>
                    <th>Contact Email Address:</th>
                    <td>{{$job->email}}</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
@endsection
