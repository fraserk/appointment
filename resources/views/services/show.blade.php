@extends('layouts.front')
  @section('content')
    <div class="top-bar">
      <div class="top-bar-title">

      </div>
      <div class="top-bar-right">
        <a href="#" class="button primary">Book An Appointment</a>
      </div>
    </div>

    <div class="row">
      <div class="small-2 columns">
        <div class="card">
          <div class="card-divider">
            price ${{$service->price  }}
          </div>
          <div class="card-section">
            test
          </div>
        </div>
      </div>

      <div class="small-10 columns">
        <h5>Available Appointment</h5>
        <hr>
        <div id='calendar'></div>
        <ul>
          @foreach ($period as $dt)
            <li>{{ $dt->format('H:i:s A') }}</li>
          @endforeach

        </ul>

      </div>
    </div>


  @endsection

  @section('scripts')
    <script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })

      });
    </script>
  @endsection
