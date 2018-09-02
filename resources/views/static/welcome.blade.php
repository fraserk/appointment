<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PicBlock</title>
    <link rel="stylesheet" href="css/main.css">


    </head>
    <body class="font-sans border-t-8 border-orange bg-blue">
        <div class="container container-lg mx-auto ">
            <header>
                <div class="w-full py-4 items-align flex">
                    <span class="ml-4 text-grey-lightest tracking-wide text-2xl"><span class="text-orange font-bold">pic</span>block</span>
                </div>
            </header>
            <div class="flex flex-wrap items-center h-screen -mx-2 px-4">
                <div class="w-full lg:px-2 lg:w-1/2 ">              
                        
                        <p class="text-3xl  tracking-wide text-grey-darkest font-bold mb-4">
                           <span class=""> Book More Appointments. </span>
                         </p>
                        <p class="leading-normal text-grey-lightest mb-4 font-thin">
                            Save time and money while delighting your customer's. With Picblocks, your customers can schedule online booking's and receive reminder's notification's with ease. Accept online payment for appointment and booking. You can use Picblocks to book an appointment for a service or class.
                        </p>
                    
                        <form action="/invite" method="post">
                        <div class="flex ">
                            <a href="/1/booking" class="p-4 bg-orange shadow h-12 w-28 mr-8 rounded no-underline text-grey-lightest hover:bg-orange-light text-xs tracking-wide">VIEW DEMO</a>
                            {{csrf_field()}}
                                <input type="text"  name="email" placeholder="Email Address" class="h-12 p-4  w-1/2  border border-orange border-r-0 shadow bg-grey-lightest text-grey-dark rounded-l text-xs"> <button class="bg-orange py-2 px-2  shadow text-grey-lightest text-xs hover:bg-blue-light rounded-r tracking-wide">GET BETA INVITE</button>
                            </div>
                            <div class="text-center">
                                <span class="text-red-light ">{{$errors->first('email')}}</span>
                                @if(session('message'))
                                    <span class="text-white">{{session('message')}}</span>
                                @endif
                            </div>
                        </form>
                        
                </div>
                <div class="w-full lg:px-2 lg:w-1/2 ">
                    <img src="images/pb_ss.png" alt="" class="shadow-lg">
                </div>
            </div>   
        </div>
        <section class="bg-grey-lighter ">
            <div class="container container-lg mx-auto py-4">                
                <div class="flex flex-wrap -mx-2 minus-margin pb-8">
                    <div class="w-full md:w-1/3 px-2">
                        <div class="border-grey border border-t-0 rounded shadow-lg bg-grey-lighter h-48">

                            <div class=" bg-white  border-grey border-t rounded-t  h-24  rounded-t p-4 flex items-center justify-around"> 
                                <span class="flex  bg-blue  rounded-full flex items-center justify-around p-4 text-red-darkest ">
                                    @include('svg.icon',['path'=>'M13 16v5a1 1 0 0 1-1 1H9l-3-6a2 2 0 0 1-2-2 2 2 0 0 1-2-2v-2c0-1.1.9-2 2-2 0-1.1.9-2 2-2h7.59l4-4H20a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2.41l-4-4H13zm0-2h1.41l4 4H20V4h-1.59l-4 4H13v6zm-2 0V8H6v2H4v2h2v2h5zm0 2H8.24l2 4H11v-4z','class'=>'fill-current  inline-block h-8 w-8'])</span>  
                            </div>
                            <div class="px-4 py-4  -m-2 text-sm tracking-wide leading-normal">
                                <h4>Book</h4>
                                Invoicing & Payments
                                Send your clients beautiful invoices and collect payments online using Stripe or PayPal.  Read more</div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="border-grey border border-t-0 rounded shadow-lg bg-grey-lighter h-48">

                            <div class=" bg-white  border-grey border-t rounded-t  h-24  rounded-t p-4 flex items-center justify-around"> 
                                <span class="flex  bg-blue  rounded-full flex items-center justify-around p-4 text-white ">@include('svg.icon',['path'=>'M7 5H5v14h14V5h-2v10a1 1 0 0 1-1.45.9L12 14.11l-3.55 1.77A1 1 0 0 1 7 15V5zM5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm4 2v8.38l2.55-1.27a1 1 0 0 1 .9 0L15 13.38V5H9z','class'=>'fill-current text-white inline-block h-8 w-8 '])</span>  
                            </div>
                            <div class="px-4 py-4  -m-2 text-sm tracking-wide leading-normal">
                                <h4>Manage</h4>Invoicing & Payments
                                Send your clients beautiful invoices and collect payments online using Stripe or PayPal.  Read more</div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <div class="border-grey border border-t-0 rounded shadow-lg bg-grey-lighter h-48">

                            <div class=" bg-white  border-grey border-t rounded-t  h-24  rounded-t p-4 flex items-center justify-around"> 
                                <span class="flex  bg-blue  rounded-full flex items-center justify-around p-4 text-white ">@include('svg.icon',['path'=>'M7 5H5v14h14V5h-2v10a1 1 0 0 1-1.45.9L12 14.11l-3.55 1.77A1 1 0 0 1 7 15V5zM5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm4 2v8.38l2.55-1.27a1 1 0 0 1 .9 0L15 13.38V5H9z','class'=>'fill-current text-white inline-block h-8 w-8 '])</span>  
                            </div>
                            <div class="px-4 py-4  -m-2 text-sm tracking-wide leading-normal">
                                <h4>Payment</h4>
                                Invoicing & Payments
                                Send your clients beautiful invoices and collect payments online using Stripe or PayPal.  Read more</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="bg-white  py-4">
            <div class="container container-lg mx-auto">
                <div class="flex flex-wrap -mx-2 mb-8">
                    <div class="w-1/2 px-2">
                       <h3 class="tracking-wide leading-normal text-grey-darkest font-semibold mb-4 text-2xl">More control and better privacy</h3>
                        <p class="tracking-wide leading-normal text-grey-darker text-sm pr-8">
                            Duet is hosted on your own server, on your own domain, which means you're in complete control. 
                            No one has access to any of your data unless you explicitly give it to them. You can control 
                            the way it looks and even the url it's accessed from.
                        </p>
                    </div>
                    <div class="w-1/2 px-2 pl-8">
                        <img src="/images/create-service.png" alt="" class="shadow">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2 my-8">
                    <div class="w-1/2 px-2 pr-8">
                        <img src="/images/create-service.png" alt="" class="shadow">
                    </div>
                    <div class="w-1/2 px-2 pl-8">
                       <h3 class="tracking-wide leading-normal text-grey-darkest font-semibold mb-4 text-2xl">More control and better privacy</h3>
                        <p class="tracking-wide leading-normal text-grey-darker text-sm">
                            Duet is hosted on your own server, on your own domain, which means you're in complete control. 
                            No one has access to any of your data unless you explicitly give it to them. You can control 
                            the way it looks and even the url it's accessed from.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-grey-darkest h-64 py-4">
            <div class="container container-lg mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        Footer..
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
