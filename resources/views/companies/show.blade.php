@extends('layouts.booking')
  @section('ProfileHeader')
    @include('partials.ProfileHeader')
  @endsection
  @section('content')

        
        {{--  <address class="">
          {{ $company->name }}<br>
          {{ $company->street_address }}<br>
          {{ $company->city }} {{ $company->state }} {{ $company->zip_code }}
        </address>
      </div>  --}}

      {{--  <div class="large-4 columns">
        <h3>Hours of Operation</h3>
        <ul>
          {{ $store_hours->render() }}
        @foreach ($store_hours->hours_overview() as $days => $hours)
          <li>{{$days}} = {{$hours}}</li>
        @endforeach
      </ul>

      </div>  --}}
    
       
        <div class="flex flex-wrap md:-mx-2">
          @foreach ($company->service as $service)
          <a href="{{route('show.service',$service)}}" class="w-full no-underline">
            <div class="w-full  px-2 mb-4 ">
              <div class="bg-white border border-l-8 border-orange  rounded p-4 hover:border-blue-light">
                <div class="flex justify-between">
                  <div class="text-lg  -ml-4 pl-2 text-grey-darkest">
                    <span class="font-semibold tracking-wide">{{ $service->name }} </span>
                  </div>
                  <div class="text-grey-darker font-bold text-3xl ">${{$service->price}}</div>
                </div>
                
                <p class="text-sm  text-grey-darker -ml-2 my-2 ">{{$service->detail}}</p>
                
                
                {{-- <div class=" flex flex-wrap -m-4 mt-12 ">
                  <div class="w-full bg-green-lightest p-4 flex justify-between items-center ">
                    <a href="{{route('show.service',$service)}}" class="hover:bg-blue-light shadow bg-blue   py-2 px-4 text-white font-semibold  no-underline rounded text-xs">Book</a>
                    <div class="text-grey-dark text-xs"> <span class="text-grey-darkest">{{$service->duration}} Min</span> </div>
                  </div>
                </div> --}}
              </div>
            </div>
            
          </a>  
            @endforeach
          </div>
          
          @endsection
