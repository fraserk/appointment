@extends('layouts.app')
  @section('content')
    <div class="row">
      <div class="column">
        <h3>Services</h3>
        <createservices :user="{{auth()->user()}}" :company="{{auth()->user()->company->id}}">

        </createservices>

        <getservices :user="{{ auth()->user()}}" :company="{{auth()->user()->company->id}}">
        </getservices>

        <hr />
      </div>
    </div>


  @endsection
