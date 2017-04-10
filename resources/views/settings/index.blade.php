@extends('layouts.app')
  @section('content')
    <div class="row">
      <div class="column">

        <company :user="{{ $user }}">
        </company>
        <storehours :user="{{ auth()->user()}}"></storehours>
      </div>
    </div>
  @endsection
