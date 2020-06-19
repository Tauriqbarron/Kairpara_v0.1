
@extends('Client.layout')
@section('nav')
    <a href="{{route('client.dashboard')}}" id="profileBtn"><img  src="{{url('images/Dashboard_active.png')}}" class="navbar-brand d-flex mr-auto text-light">
    </a>
    <h4 class="navbar-brand w-25"></h4>
    <div class="navbar-collapse collapse w-100 " id="collapsingNavbar3">
        <ul class="navbar-nav w-100 h-100 justify-content-center text-nowrap align-items-end">
            <li class="nav-item" >
                <a class="nav-link" href="{{route('client.security')}}" >Security</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.property')}}">Property Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.jobs')}}">Service Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('client.bookings')}}">Security Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.quotes')}}">Quotes</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end align-items-end">
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul>
    </div>
@endsection
@section('mainContent')
    <div class="row">
        <div class="container ml-4">
            <div class="row">
                <div class="col">
                    <h5 class="w-100 text-center">Your Security Bookings</h5>
                    <div class="container jumbotron p-3">
                        <div class="row text-center px-2">
                            <div class="col-8"></div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 text-right">
                                        <a class="" href="{{route('client.bookings')}}">{{isset($filtered) ? 'Show All' : ''}}</a>
                                    </div>
                                    <div class="col-8">
                                        <select id="filter" class="form-control" onchange="window.location.href = this.options[selectedIndex].value">
                                            <option class="text-secondary" disabled selected hidden>Filter Results</option>
                                            <option value="{{route('client.getAvailableBookings')}}">Available</option>
                                            <option value="{{route('client.getAssignedBookings')}}">Assigned</option>
                                            <option value="{{route('client.getCompletedBookings')}}">Completed</option>
                                            <option value="{{route('client.getOlderBookings')}}">Older Bookings</option>
                                            <option value="{{route('client.getNewerBookings')}}">Newer Bookings</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($bookings as $booking)
                            <div class="row bg-light shadow m-2 p-2">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-2">
                                            {{\Carbon\Carbon::parse(substr('00:00', 0, (-(strlen(number_format($booking->start_time ,2 , ':','')))) ) . number_format($booking->start_time ,2 , ':',''))->isoFormat('LT')}}
                                        </div>
                                        <div class="col-4">
                                            {{\Carbon\Carbon::parse($booking->date)->isoFormat('dddd Do MMM')}} - {{\Carbon\Carbon::parse($booking->end_date)->isoFormat('dddd Do MMM')}}
                                        </div>
                                        <div class="col-5 text-capitalize text-{{$booking->status == 'available' ? 'success': 'danger'}}">
                                            Status: {{$booking->status}}
                                        </div>
                                        <div class="col-1 btn-group-toggle  toggle-btn">
                                            <input type="radio" class="" id="btnb{{$booking->id}}" data-toggle="collapse" data-target="#b{{$booking->id}}" aria-errormessage="false" aria-controls="b{{$booking->id}}">
                                            <label class="rounded bg-secondary text-center" for="btnb{{$booking->id}}"></label>
                                        </div>
                                    </div>
                                    {{--Booking Info--}}
                                    <div class="row bg-white collapse p-3  shadow-sm" id="b{{$booking->id}}">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <h5>{{$booking->booking_type->description}} on {{\Carbon\Carbon::parse($booking->date)->isoFormat('dddd Do MMM')}}</h5>
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <div class="col text-center text-secondary">
                                                    <em>{{$booking->description}}</em>
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2 text-right">
                                                    <strong>Time</strong>
                                                </div>
                                                <div class="col-4">
                                                    {{\Carbon\Carbon::parse(substr('00:00', 0, (-(strlen(number_format($booking->start_time ,2 , ':','')))) ) . number_format($booking->start_time ,2 , ':',''))->isoFormat('LT')}} -
                                                    {{\Carbon\Carbon::parse(substr('00:00', 0, (-(strlen(number_format($booking->finish_time ,2 , ':','')))) ) . number_format($booking->finish_time ,2 , ':',''))->isoFormat('LT')}}
                                                </div>
                                                <div class="col-3 text-right">
                                                    <strong>Staff Required</strong>
                                                </div>
                                                <div class="col-3">
                                                    {{$booking->staff_needed}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2 text-right">
                                                    <strong>Date</strong>
                                                </div>
                                                <div class="col-4">
                                                    {{\Carbon\Carbon::parse($booking->date)->isoFormat('dddd Do MMM')}} - {{\Carbon\Carbon::parse($booking->end_date)->isoFormat('dddd Do MMM')}}
                                                </div>
                                                <div class="col-3 text-right">
                                                    <strong>Staff Assigned</strong>
                                                </div>
                                                <div class="col-3">
                                                    {{$booking->staff_needed - $booking->available_slots}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2 text-right">
                                                    <strong>Address</strong>
                                                </div>
                                                <div class="col-4">
                                                    {{$booking->street}}<br>{{$booking->suburb}}<br>{{$booking->city}}, {{$booking->postcode}}
                                                </div>
                                                <div class="col-3 text-right">
                                                    <strong>Status</strong>
                                                </div>
                                                <div class="col-3 text-capitalize text-{{$booking->status == 'available' ? 'success': 'danger'}}">
                                                    <em>{{$booking->status}}</em>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
