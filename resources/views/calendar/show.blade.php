@extends('layouts.app')

@section('content')
{{-- @foreach($appointments as $appointment)
    {{$appointment->start}} <br>
@endforeach --}}
<calendar :appointments="{{$appointments}}"></calendar>
@endsection