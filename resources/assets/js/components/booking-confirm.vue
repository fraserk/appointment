<template>
    <div class="flex flex-wrap justify-center">        
        <div class="w-1/2 bg-ocean shadow border-t-8 border-blue  rounded">
       
            <div class=" rounded" v-if="!complete">  
                <div class="w-full h-32 bg-indigo-lightest mb-4 p-4 shadow">
                    <span class="flex justify-around font-bold text-lg font-semibold text-grey-darkest mb-8">Confirm Booking!</span>
                     <div class="flex justify-between">
                     <span class="text-xs text-grey-darker  ">Date : {{booking.book_from.format('MM/DD/YYYY')}}</span> 
                     <span class="text-xs text-grey-darker">Time: {{booking.book_from.format('hh:mm A')}}</span> 

                     </div>
                </div>
                <div class=" flex flex-wrap">
                    <div class="w-full p-4"> 
                        <h4 class="text-normal text-grey-darker mb-2">Contact Information</h4>                       
                            <input type="text" placeholder="Full Name" class="input-field" v-model="booking.customer_name">                        
                            <input type="text" placeholder="Email address" class="input-field" v-model="booking.email">                        
                            <input type="text" placeholder="Phone Number" class="input-field" v-model="booking.phone">
                        
                    </div>

                    </div>
               
            </div>
            <div class="p-4 bg-green-lightest">
                <button class="hover:bg-blue-light shadow bg-blue   py-2 px-4 text-white font-semibold  no-underline rounded text-xs" @click.prevent="save">Confirm Booking</button>

            </div>
        </div>
        <div class="w-full" v-if="complete">
            <p>Thank you.  You appointment have been saved.</p>
        </div>
    </div>
</template>

<script>
export default {
  props: ["serviceinfo"],
  data() {
    return {
      booking: {
        book_from: moment(this.serviceinfo.time["slot"]),
        customer_name: null,
        email: null,
        phone: null,
        service_id: this.serviceinfo.service,
        staff_id: this.serviceinfo.provider,
      },
    complete: false
    };
  },
  methods: {
    save() {
      let url = `/service/${this.booking.service_id}/provider/${
        this.booking.staff_id
      }`;
      //`api/company/${this.company}/service?api_token=${this.user.api_token}`
      //console.log(this.booking);
      axios.post(url, this.booking).then(response => {
          this.complete = true;
      });
    }
  }
};
</script>