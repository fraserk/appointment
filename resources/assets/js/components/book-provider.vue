<template>

    <div class="flex flex-wrap -mx-2 ">
      <div class=" md:mx-0 w-full md:w-1/3 px-2">
        <div class="rounded border">
          <div class=" flex  items-center bg-white p-4 text-white w-full rounded-t  h-16 justify-between">
            <span class="text-grey-darkest font-semibold text-md">Select a Provider</span>
            <span class="text-grey-darker font-bold">$45.00</span>
          </div>

          <div class="p-4 bg-white">
            <p class="leading-normal tracking-normal antialiased text-grey-dark text-sm">
              Slect a provder from the list below to view the available appointments.
            </p>

            <div class="flex flex-wrap">
              <div class="w-full">
                <div class=" flex  bg-white border border-l-8  border-grey-lighter p-4 mb-4 mt-4 hover:border-grey-dark cursor-pointer" v-for="provider in providers" :key="provider.key">
                  <div class="flex flex-wrap w-full items-center"  @click.prevent="ShowAvailability(provider)">
                    <div class="w-1/3">
                      <span class="rounded-full h-12 w-12 flex items-center justify-center bg-orange">KF</span>
                    </div>
                    <div class="w-2/3">
                      <span class="text-sm text-grey-darker font-semibold">{{provider.name}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="md:w-2/3 px-2 mt-4 md:mt-0">
        <appointment-calendar :provider="selectedProvider" :service="service" v-if="showCalendar">  </appointment-calendar>
      </div>
    </div> 
</template>

<script>
import appointmentCalendar from './appointment-calendar.vue';
export default{
  components: {
    appointmentCalendar
    },
    props:['company'],
     data(){
       return{
             providers: this.company.staffs,
             selectedProvider: null,
             showCalendar:null,
             service: this.company.service['0'].id
         }
     },
     methods:{
         ShowAvailability(provider){
             this.selectedProvider= provider;
             this.service = this.service;
             this.showCalendar= true;
         }
     }
};

</script>