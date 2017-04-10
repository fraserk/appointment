@extends('layouts.app')
  @section('content')
    <div class="row">
      <div class="column">
        <h3>Services</h3>
        <createservices :user="{{auth()->user()}}">

        </createservices>

        <getservices :user="{{ auth()->user()}}">
        </getservices>

        <hr />
      </div>
    </div>


  @endsection
