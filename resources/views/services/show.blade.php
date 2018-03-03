@extends('layouts.booking')
  @section('content')

        <book-provider :company="{{ $service->company}}"></book-provider>
        {{--    --}}


  @endsection

  @section('scripts')

  @endsection
