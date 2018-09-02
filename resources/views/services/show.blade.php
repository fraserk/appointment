@extends('layouts.booking')
@section('ProfileHeader')
    @include('partials.ProfileHeader',['company'=> $service->company])
  @endsection
  @section('content')

        <book-provider :company="{{ $service->company}}"></book-provider>
        


  @endsection

  @section('scripts')

  @endsection
