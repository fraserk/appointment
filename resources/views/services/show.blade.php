@extends('layouts.front')
  @section('content')


        <appointmentcalendar :company="{{ auth()->user()->company}}" :user="{{ auth()->user()}}" >
        </appointmentcalendar>


  @endsection

  @section('scripts')

  @endsection
