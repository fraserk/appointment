@extends('layouts.front')
  @section('content')
    <div class="top-bar">
      <div class="top-bar-title">
        {{ $user->name }}
      </div>
      <div class="top-bar-right">
        <a href="#" class="button primary">Book An Appointment</a>
      </div>
    </div>

    <div class="row">
      <div class="large-3 columns ">
        <h4>Address</h4>
        <address class="">
          {{ $user->company->name }}<br>
          {{ $user->company->street_address }}<br>
          {{ $user->company->city }} {{ $user->company->state }} {{ $user->company->zip_code }}
        </address>
      </div>

      <div class="large-4 columns">
        <h3>Hours of Operation</h3>
        <ul>
          {{ $store_hours->render() }}
        @foreach ($store_hours->hours_overview() as $days => $hours)
          <li>{{$days}} = {{$hours}}</li>
        @endforeach
      </ul>

      </div>
    </div>
    <hr>
    <div class="row">
      @foreach ($user->service as $service)
        <div class="small-3 columns">
          <div class="card">
            <div class="card-divider">
              Price: $400
              <div class="">
                <a href="{{route('show.service',$service)}}" class="button tiny">Book</a>
              </div>
            </div>
            <div class="card-section">
              <h5>{{ $service->name }} </h5>

              <small>PRice: - $40.00</small> <small>Duration:10 Mins</small>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>

            </div>
          </div>
        </div>

      @endforeach
    </div>
  @endsection
