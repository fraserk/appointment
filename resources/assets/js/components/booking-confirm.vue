<template>
    <div class="flex flex-wrap">        
        <div class="w-full">
            <div class="bg-white border rounded p-4">

            Your booking is for  <span class="bg-teal-light ">{{booking.when.format('MM/DD/YYYY')}}</span> @ <span class="  bg-teal-light">{{booking.when.format('hh:mm A')}}</span> 
        <div class="">
            <label for="">Name
                <input type="text" class="input-field" v-model="booking.customer_name">
            </label>
            <label for="">Email
                <input type="text" class="input-field" v-model="booking.email">
            </label>
            <label for="">Phone
                <input type="text" class="input-field" v-model="booking.phone">
            </label>
            <button class="hover:bg-blue-light shadow bg-blue   py-2 px-4 text-white font-semibold  no-underline rounded text-xs" @click.prevent="save">book</button>
        </div>
        </div>
            </div>
    </div>
</template>

<script>
    export default{
        props:['serviceinfo'],
        data(){
            return{
                booking: {
                    when: moment(this.serviceinfo.time['date']),
                    customer_name: null,
                    email: null,
                    phone: null,
                    service_id: this.serviceinfo.service,
                    staff_id: this.serviceinfo.provider

                }

            }
        },
        methods:{
            save(){
                let url = `/service/${this.booking.service_id}/provider/${this.booking.staff_id}`;
                //`api/company/${this.company}/service?api_token=${this.user.api_token}`
                console.log(this.booking);
                axios.post(url, this.booking).then((response)=>{

                });
            }
        }
    };
</script>