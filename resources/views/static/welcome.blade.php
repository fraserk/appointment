<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PicBlock</title>
    <link rel="stylesheet" href="css/main.css">


    </head>
    <body class="font-sans border-t-8 border-orange bg-blue-darker">
        <div class="container container-lg mx-auto ">
            <header>
                <div class="w-full py-4 items-align flex">
                    <span class="ml-4 text-grey-lightest tracking-wide text-2xl"><span class="text-orange font-bold">pic</span>block</span>
                </div>
            </header>
            <div class="flex flex-wrap items-center h-screen -mx-2 px-4">
                <div class="w-full lg:px-2 lg:w-1/2 ">              
                        
                        <p class="text-2xl  tracking-wide text-grey-lighter mb-4">Book More Appointment's. </p>
                        <p>
                            Save time and money while delighting your customer's. With Picblocks, your customers can schedule online booking's and receive reminder's notification's with ease. Accept online payment for appointment and booking. You can use Picblocks to book an appointment for a service or class.
                        </p>
                    
                        <form action="/invite" method="post">
                        <div class="flex ">
                            <a href="/1/booking" class="p-4 bg-blue-darkest shadow h-12 w-28 mr-8 rounded no-underline text-grey-lightest hover:bg-green-light text-xs tracking-wide">VIEW DEMO</a>
                            {{csrf_field()}}
                                <input type="text"  name="email" placeholder="Email Address" class="h-12 p-4  w-1/2  border border-blue border-r-0 shadow bg-grey-lightest text-grey-dark rounded-l text-xs"> <button class="bg-blue py-2 px-2  shadow text-grey-lightest text-xs hover:bg-blue-light rounded-r tracking-wide">GET BETA INVITE</button>
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
    </body>
</html>
