@extends('layouts.app')
  @section('content')
      <div class="flex flex-wrap">
        <div class=" flex mx-2 w-full md:mx-0">
          <div class="bg-white shadow w-full rounded">
            <div class="p-4 bg-grey-darkest rounded-t">
              <span class="text-sm text-grey-lightest ">Create your schedule</span>
            </div>
            <update-schedule :defaultdata="{{ $schedules }}"></update-schedule>
        </div>
      </div>
    </div>
  @endsection
