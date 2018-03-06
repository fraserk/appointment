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
            <div class="w-full md:w-1/2 px-2 mb-4">
                <div class="bg-white border shadow rounded p-4 ">
                    <div class="flex justify-between">
                        <div class="text-lg border-l-4 border-blue -ml-4 pl-2 text-grey-darkest">
                          {{ $service->name }} 
                        </div>
                      <div class="text-grey-darkest font-semibold">${{$service->price}}</div>
                    </div>
                    
                  <p class="text-sm  text-grey-darker my-8 h-24">{{$service->detail}}</p>
    
    
                  <div class=" flex flex-wrap -m-4 mt-12 ">
                      <div class="w-full bg-green-lightest p-4 flex justify-between items-center ">
                          <a href="{{route('show.service',$service)}}" class="hover:bg-blue-light shadow bg-blue   py-2 px-4 text-white font-semibold  no-underline rounded text-xs">Book</a>
                          <div class="text-grey-dark text-xs"> <span class="text-grey-darkest">{{$service->duration}} Min</span> </div>
                      </div>
                  </div>
                </div>
            </div>
    
          @endforeach
        </div>

  @endsection
