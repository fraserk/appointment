@extends('layouts.app')

@section('content')
    <div class="w-full ">
        <span class="text-2xl text-grey-darkest font-normal">//Dashboard</span>
    </div>
    <div class=" bg-white border flex mt-4 rounded p-4 mb-4">
        <div class="w-1/3 text-center  border-r ">
            <div class="text-grey-darker text-lg font-semibold mb-4">Today's Appointments</div>
            <span class="text-4xl text-grey-darkest font-bold "> 129 </span>
        </div>
        <div class="w-1/3 text-center  border-r ">
            <div class="text-grey-darker text-lg font-semibold mb-4">Today's Appointments</div>
            <span class="text-4xl text-grey-darkest font-bold "> 129 </span>
        </div>
        <div class="w-1/3 text-center ">
            <div class="text-grey-darker text-lg font-semibold mb-4">Today's Appointments</div>
            <span class="text-4xl text-grey-darkest font-bold "> 129 </span>
        </div>
    </div>
    <div class="flex">
        <div class="w-1/4 rounded bg-white border shadow">
            <div class="bg-grey-lightest p-4 font-semibold">
                Upcomming Appointments
            </div>
            <div class="bg-white p-4">
                <div class="border rounded mb-4">
                    <div class="p-4">
                        <span class="text-sm"> 12/12 10:00 AM - 10:30 AM</span>
                        <div class="mt-4 font-bold text-3xl text-grey-darkest">Kim Fraser</div>
                        <div class="text-grey-dark">347-834-0666</div>
                        <div class="mt-6 text-grey">
                            <span class="block">Shape up</span>
                            <span class="block"> Shave</span>
                        </div>
                    </div>
                    <div class="bg-grey-lighter p-4 text-right">
                        <span class="py-2 px-2 rounded bg-blue text-white text-xs">Check In</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
