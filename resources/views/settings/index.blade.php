@extends('layouts.app')
  @section('content')


        <company :user="{{ $user }}">
        </company>
        <storehours :user="{{ auth()->user()}}"></storehours>

  @endsection
