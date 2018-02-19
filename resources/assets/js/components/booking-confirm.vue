<template>
    <div class="flex flex-wrap">
        
        <div class="w-full p-4">
            Your booking is for  <span class="bg-teal-light px-2">{{booking.when.format('MM/DD/YYYY')}}</span> @ <span class=" px-2 bg-teal-light">{{booking.when.format('hh:mm A')}}</span> 
        </div>
        <div class="px-4 py-4">
            <label for="">Name
                <input type="text" class="input-field" >
            </label>
            <label for="">Email
                <input type="text" class="input-field" >
            </label>
            <label for="">Phone
                <input type="text" class="input-field" >
            </label>
            <button class="btn-default hover:bg-blue-lighter">book</button>
        </div>
    </div>
</template>

<script>
    export default{
        props:['serviceinfo'],
        data(){
            return{
                booking: {
                    when: moment(this.serviceinfo.time['date'])
                }

            }
        }
    };
</script>