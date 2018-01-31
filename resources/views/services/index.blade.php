@extends('layouts.app')
  @section('content')
        <div class="flex ">
          <div class="flex bg-white p-4 border  sm:rounded-none   md:rounded w-full items-center mx-2 md:mx-0 ">
          <div class="w-1/2 font-semibold text-lg text-grey-darkest">
          Services
          </div>
          <div class="w-1/2 text-2xl text-grey-darkest font-normal text-right"> 
            <a href="{{route('service.create')}}" class="no-underline bg-blue rounded border p-2 text-sm text-grey-lightest hover:bg-blue-light">+ Add New Service</a>
          </div>
          </div>
        </div>  
        <!-- <createservices :user="{{auth()->user()}}" :company="{{auth()->user()->company->id}}">

        </createservices> -->

        <getservices :user="{{ auth()->user()}}" :company="{{auth()->user()->company->id}}">
        </getservices>



  @endsection
