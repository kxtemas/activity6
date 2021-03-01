
@extends('layouts.app')

@section('content')
@if(Auth::user()->usertype == 'admin')
           
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Edit Job')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('admin.job.update')}}" method="post">
            @csrf
            <!-- HIDDEN ID -->
                <input type="hidden" value="{{$job->id}}" name="id">
                <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('Title:')}}</label>
                    <input type="text" class="form-control" id="titleInput" placeholder="Name" value="{{$job->title}}"
                           name="title">
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">{{__('Description:')}}</label><br>
                    <textarea class="form-control" name="description" id="descriptionInput" rows="5"
                              placeholder="Description">{{$job->description}}</textarea>

                </div>

                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-3">
                        <!--COMPANY-->
                        <label for="companyInput">{{__('Company Name:')}}</label>
                        <input type="text" class="form-control" id="companyInput" placeholder="Company Name"
                               name="company" value="{{$job->company}}">
                    </div>
                    <!--LOCATION-->
                    <div class="col-md-4 mb-3">
                        <label for="locationInput">{{__('Location:')}}</label>
                        <input type="text" class="form-control" id="locationInput"
                               placeholder="Location" value="{{$job->location}}" name="location">
                    </div>
                    <!--TYPE-->
                    <div class="col-md-4 mb-3">
                        <label for="typeInput">{{__('Type:')}}</label>
                        <select class="form-control" id="typeInput" name="type">
                            <option value="{{$job->type}}">{{$job->type}}</option>
                            @if($job->type == 'On-Ground')
                                <option value="Remote">Remote</option>
                            @else
                                <option value="On-Ground">On-Ground</option>
                            @endif
                        </select>
                    </div>
                    <!--PAY RANGE-->
                    <div class="col-md-4 mb-3">
                        <label for="payInput">{{__('Pay Range:')}}</label>
                        <input type="text" class="form-control" id="payInput" placeholder="Pay Range"
                               value="{{$job->pay_range}}" name="pay_range">
                    </div>
                    <div class="col-md-4 mb-3">
                        <!--EMPLOYMENT-->
                        <label for="employmentInput">{{__('Employment Type:')}}</label>
                        <select class="form-control" id="employmentInput" name="employment">
                            <option value="{{$job->employment}}">{{$job->employment}}</option>
                            @if($job->employment == "Full-Time")
                                <option value="Part-Time">{{__('Part Time')}}</option>
                                <option value="Seasonal">{{__('Seasonal')}}</option>
                                <option value="Internship">{{__('Internship')}}</option>
                                <option value="Other">{{__('Other')}}</option>
                                
                            @elseif($job->employment == "Part-Time")
                                <option value="Full-Time">{{__('Full-Time')}}</option>             
                                <option value="Seasonal">{{__('Seasonal')}}</option>                   
                                <option value="Internship">{{__('Internship')}}</option>
                                <option value="Other">{{__('Other')}}</option>
                           
                            @elseif($job->employment == "Seasonal")
                                <option value="Full-Time">{{__('Full-Time')}}</option>
                                <option value="Part-Time">{{__('Part Time')}}</option>
                                <option value="Internship">{{__('Internship')}}</option>
                                <option value="Other">{{__('Other')}}</option>
                           
                            @elseif($job->employment == "Internship")
                                <option value="Full-Time">{{__('Full-Time')}}</option>
                                <option value="Part-Time">{{__('Part Time')}}</option>                             
                                <option value="Seasonal">{{__('Seasonal')}}</option>
                                <option value="Other">{{__('Other')}}</option>
                            @elseif($job->employment == "Other")
                                <option value="Full-Time">{{__('Full-Time')}}</option>
                                <option value="Part-Time">{{__('Part Time')}}</option>                      
                                <option value="Seasonal">{{__('Seasonal')}}</option>   
                                <option value="Internship">{{__('Internship')}}</option>
                            @endif
                        </select>
                    </div>
                    <!-- CONTACT PHONE NUMBER -->
                    <div class="col-md-6 mb-3">
                        <label for="phoneInput">{{__('Contact Phone Number:')}}</label>
                        <input type="text" class="form-control" id="phoneInput" placeholder="Contact Phone Number"
                               value="{{$job->phonenumber}}" name="phonenumber">
                    </div>
                    <!-- CONTACT EMAIL ADDRESS -->
                    <div class="col-md-6 mb-3">
                        <label for="emailInput">{{__('Contact Email Address:')}}</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Contact Email Address"
                               value="{{$job->email}}" name="email">
                    </div>
                </div>
               <td align="center">
                        <form action="{{action('JobController@updateJob')}}" method="post"> 
                             @csrf                           
                            <button class="btn btn-danger" type="submit">Update</button> 
                      </form> 
                     </td> 
            </form>
        </div>
    </div>
   @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    
    @endif
@endsection