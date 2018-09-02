@extends('layouts.app')
    @section('content')
        <div class="flex flex-wrap mx-4 rounded border">
            <div class=" flex w-full bg-grey-lighter p-4 py-2 border-b">
                <span class="font-medium text-md text-grey-darkest">Create New Service<span>
            </div>

            <form class="flex flex-wrap w-full bg-white" action="{{route('service.store')}}" method="post">
            {{csrf_field()}}
                <div class="flex flex-wrap w-full p-4 border-b mb-4">
                    <div class="w-full md:w-1/3 py-4">
                        <span class="text-lg font-lg ">Service info</span>
                    </div>

                    <div class="flex flex-wrap w-full md:w-2/3 py-4">
                        <div class="flex w-full mb-2">
                            <div class="w-full md:w-1/2">
                                <label class="block text-grey-darker text-sm font-semibold mb-2" for="service name">Service Name</label>
                                <input name="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="" placeholder="Name">
                            </div>
                        </div>
                        <div class="flex w-full mb-2">
                            <div class="w-full md:w-1/4">
                                <label class="block text-grey-darker text-sm font-semibold mb-2" for="service name">Price</label>
                                <input name="price" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="" placeholder="Price">
                            </div>
                        </div>

                        <div class="flex w-full mb-2">
                        <div class="w-full md:w-3/4">
                                <label class="block text-grey-darker text-sm font-semibold mb-2" for="service name">Service Description</label>
                                <textarea name="detail" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Service Name">
                                </textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex w-full">
                    <div class="flex flex-wrap w-full p-4 border-b mb-4">
                        <div class="w-full md:w-1/3 py-4">
                            <span class="text-lg font-lg ">Service Duration</span>
                        </div>

                        <div class="w-full md:w-2/3 py-4">
                            <div class="flex w-full mb-2">
                                <div class="w-full md:w-1/2">
                                    <label class="block text-grey-darker text-sm font-semibold mb-2" for="service name"> Duration</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="" name="duration" placeholder="How long is this service">
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="flex flex-wrap w-full p-4 border-b mb-4">
                        <div class="w-full md:w-1/3 py-4">
                            <span class="text-lg font-lg ">Who can Perform this service</span>
                        </div>

                        <div class="w-full md:w-2/3 py-4">
                            <div class="flex w-full mb-2">
                                <div class="w-full md:w-1/2">
                                    <label class="block text-grey-darker text-sm font-semibold mb-2" for="service name">Select Staff/worker</label>
                                    <select class="block appearance-none w-full bg-white  hover:border-greypy-2 pr-8" id="multiple" multiple name="staff[]">
                                      @foreach ($company->providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                      @endforeach

                                    </select>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class=" flex w-full">
                    <div class="w-full p-4  mb-4 text-right">
                         cancel <button class="rounded border py-2 px-2 bg-blue text-white text-sm">create service</button>
                    </div>
                </div>



              </form>


        </div>

    @endsection
