<template >
  <div class="">
    <div class="flex flex-wrap -mx-2 ">
      <div class="w-full px-2">
        <div class="bg-white rounded border" >
          <div class="flex rounded-t w-full h-16 items-center p-4 text-sm justify-center border-b bg-blue-dark ">
            <span class="flex font-bold text-white">Schedule An Appointment</span>

          </div>
          <div class=" flex my-4 bg-blue-lightest border-t border-b" v-if="!timeSelect">
            <div class="flex items-center justify-end  w-1/3">
              <span class=" "><a @click.prevent="subtractWeek" >Prev</a></span>
            </div>
            <div class=" flex w-full  w-1/3">
              <div class="flex-auto  text-center mt-4 mb-4" v-for="(value, index) in 7" :key="value.id">

                <a href="#" class="no-underline" @click.prevent="getTimeslots(weeklyCalendar(index).format('YYYY-MM-DD'))">
                  <div class="">
                    <span class="block text-lg text-grey-darkest font-bold mb-2">{{weeklyCalendar(index).format('ddd')}}</span>
                    <span class="block text-xs">{{weeklyCalendar(index).format('MM/DD/YY')}}</span>
                  </div>

                </a>

              </div>

            </div>
            <div class="w-1/3 flex items-center">

              <a href="#"  @click.prevent="addWeek">Next</a>
            </div>


          </div>
          <hr>

          <div class="" v-if="!timeSelect">
            <div class="flex">
              <div class="w-full text-center font-semibold text-md uppercase">
               Available Time

              </div>
            </div>
                
              <div class="flex flex-wrap" >
                <div class="border p-2 w-24 m-2 text-grey-darkest text-center hover:bg-grey-lighter"  v-for="time in timeslots" :key="time.id">
                  <span @click.prevent="getBookForm(time)"> {{timeslot(time.date)}}</span>
                </div>
              </div>
          </div>
          <book-confirm :serviceinfo="booking" v-if="timeSelect"></book-confirm>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import bookConfirm from "./booking-confirm.vue";
export default {
components:{
  bookConfirm
},
props: ['provider','service'],
  data(){
    return{
      timeslots: {},
      today:moment(),
      bookService: this.service,
      user: this.provider.id,
      weekstart: moment(),
      timeSelect: false,
      booking:{
        service: this.service,
        provider: this.provider.id,
        time: null
      }

    }
  },
  mounted() {
  },
  computed:{
     newWeek(){
       return this.addWeek;
     }
 },
 methods: {
    addWeek: function () {

        this.weekstart = moment(this.weekstart).add(1, 'week');
        return this.weeklyCalendar();
      },
      subtractWeek: function () {
        this.weekstart = moment(this.weekstart).subtract(1, 'week');
        return this.weeklyCalendar();
      },
      weeklyCalendar: function(n){
        return moment(this.weekstart).add(n,'days');
      },

      timeslot(slot){
        return moment(slot).format('hh:mm A');
      },
      getTimeslots(date){
        //console.log(date);
        axios.get(`/service/${this.bookService}/provider/${this.user}?date=${date}`).then((response)=>{
        this.$set(this.$data,'timeslots',response.data);


        });
      },
      getBookForm(time){
          this.timeSelect=true;
          this.booking.time = time;
      }
  }
}
</script>

<style lang="css">
</style>
