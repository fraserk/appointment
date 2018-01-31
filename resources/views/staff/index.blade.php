@extends('layouts.app')
  @section('content')

    <div class="flex flex-wrap">
      <div class="w-full p-4">
        <h2 class="text-grey-darkest">People & Teams Directory</h2>
      </div>
    </div>

    <div class="flex flex-wrap mt-4 md:-mx-2">
      <div class=" mx-2 md:mx-0 w-full md:w-1/3 px-2">
          <div class="bg-white rounded border shadow">
            <div class="bg-grey-lightest p-4">
              Create New Staff
            </div>
            <div class="p-4">
              <form action="{{route('staff.store')}}" method="post" class="flex flex-wrap appearance-none">
                {{csrf_field()}}
                 <div class="w-full">
                  <label for="" class="block mb-2 text-sm font-semibold">Employee Name</label>
                  <input type="text" name="name" class="border shadow py-2 px-4 w-full">
                </div>
                <div class="w-full mt-4">
                  <label for="" class="block mb-2 text-sm font-semibold">Employee Emil</label>
                  <input type="text" name="email" class="border shadow py-2 px-4 w-full">
                </div>
                <div class="w-full mt-4">
                  <label for="" class="block mb-2 text-sm font-semibold">Employee Password</label>
                  <input type="text" name="password" class="border shadow py-2 px-4 w-full">
                </div>
                <div class="w-full mt-4 text-right">
                  cancel
                  <input type="submit" class="border border-white text-white  bg-blue text-sm  py-2 px-4 rounded">
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="mx-2 md:mx-0 w-full md:w-2/3 px-2">


       @foreach ($company->Staffs as $staff)
         <div class=" flex  bg-white border border-l-8  border-blue-darkest p-4 mb-4">
           <div class="flex flex-wrap w-full items-center">
             <div class="w-1/4">
               <span class="rounded-full h-12 w-12 flex items-center justify-center bg-orange">KF</span>
             </div>
             <div class="w-1/4">
               <span class="text-sm text-grey-darker font-semibold">{{ $staff->name }}</span>
             </div>
             <div class="w-1/4">
               <span class="text-sm text-grey-darker font-semibold">{{ $staff->email }}</span>
             </div>
             <div class="w-1/4">
               <span class="text-sm text-grey-darker font-semibold">347-834-0666</span>
             </div>
           </div>
         </div>

       @endforeach

        </div>
    </div>
  @endsection
