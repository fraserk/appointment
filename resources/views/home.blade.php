@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-1/5">
            <aside>
                <span class="uppercase text-grey-darker text-sm">
                    Dashboard
                </span>
                <ul class="list-reset mt-4 ">
                    <li class="my-2 text-sm"><a href="#" class="no-underline text-grey-darkest hover:text-grey-dark leading-wide">Home</a></li>
                <li class="my-2 text-sm"><a href="{{route('calendar')}}" class="no-underline text-grey-darkest hover:text-grey-dark leading-wide"> My Calendar</a></li>
                    <li class="my-2 text-sm"><a href="#" class="no-underline text-grey-darkest hover:text-grey-dark leading-wide">Schedule</a></li>
                    <li class="my-2 text-sm"><a href="#" class="no-underline text-grey-darkest hover:text-grey-dark leading-wide">Booking Page</a></li>
                </ul>
            </aside>
        </div>
        <div class="w-4/5">      
        {{--  <calendar :appointments="{{$appointments}}"></calendar>  --}}
            <div class="flex -mx-2">
                <div class="w-1/3  px-2">
                    <div class=" border bg-white rounded p-4">
                        <div class="text-grey-dark text-right text-xs uppercase tracking-wide">Appointment's This Week</div>
                        <div class="text-grey-darkest text-right font-semibold text-lg pt-2">90</div>

                    </div>
                </div>
                <div class="w-1/3 px-2">
                    <div class=" border bg-white rounded p-4">
                        <div class="text-grey-dark text-right text-xs uppercase tracking-wide">Appointment's This Week</div>
                        <div class="text-grey-darkest text-right font-semibold text-lg pt-2">900</div>

                    </div>
                </div>
                <div class="w-1/3  px-2">
                    <div class=" border bg-white rounded p-4">
                        <div class="text-grey-dark text-right text-xs uppercase tracking-wide">Appointment's This Week</div>
                        <div class="text-grey-darkest text-right font-semibold text-lg pt-2">56</div>

                    </div>
                </div>
            </div>

            <div class="flex flex-wrap mt-4 -mx-2">
                <div class="w-2/3 px-2">
                    <div class="bg-white border rounded p-4 ">
                        <div class="flex  justify-between">
                            <div class="text-grey-dark " >Today Appointments</div> 
                            <div class="text-xs"><a href="#">View All</a></div> 

                        </div>
                        <div class="flex flex-wrap mt-4">
                            <div class="w-full my-2">
                                <div class="font-semibold text-grey-darkest">Lauren Fraser</div>
                                <span class="text-grey-dark text-xs">Hair Cut - </span> <span class="text-grey-darkest text-xs">Mon Jul 23 @ 12:00 PM</span>
                            </div>
                            <div class="w-full my-2">
                                <div class="font-semibold text-grey-darkest">Lauren Fraser</div>
                                <span class="text-grey-dark text-xs">Hair Cut - </span> <span class="text-grey-darkest text-xs">Mon Jul 23 @ 12:00 PM</span>
                            </div>
                            <div class="w-full my-2">
                                <div class="font-semibold text-grey-darkest">Lauren Fraser</div>
                                <span class="text-grey-dark text-xs">Hair Cut - </span> <span class="text-grey-darkest text-xs">Mon Jul 23 @ 12:00 PM</span>
                            </div>
                            <div class="w-full my-2">
                                <div class="font-semibold text-grey-darkest">Lauren Fraser</div>
                                <span class="text-grey-dark text-xs">Hair Cut - </span> <span class="text-grey-darkest text-xs">Mon Jul 23 @ 12:00 PM</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>

        

    </div>
@endsection
