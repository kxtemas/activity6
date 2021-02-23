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
              
                <th>Job Position</th>
                <th>Company</th>
                <th>Description</th>
                <th>Location</th>
                <th>Type</th>
                <th>Pay Range</th>
                <th>Employment Type</th>
                <th>Contact Phone Number</th>
                <th>Contact Email Address</th>
              
            </tr>
            </thead>
            <tbody>
            @foreach($list as $job)
                <tr>
                  
                    <td>{{$job->title}}</td>
                    <td>{{$job->company}}</td>
                    <td>{{$job->description}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->type}}</td>
                    <td>{{$job->pay_range}}</td>
                    <td>{{$job->employment}}</td>
                    <td>{{$job->phonenumber}}</td>
                    <td>{{$job->email}}</td>
                    <td align="center">
                      </td>
                </tr>
            @endforeach

            </tbody>

        </table>     
  
@endsection
                    