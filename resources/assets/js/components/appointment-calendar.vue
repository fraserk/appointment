<template >
    <div class="flex flex-wrap ">
      <div class="w-full">
        
          <div class=" flex bg-grey-lightest  rounded shadow" v-if="!timeSelect">
            <div class="flex items-center   w-12 bg-grey-lighter border-r px-2 hover:bg-grey cursor-pointer rounded-l" @click.prevent="subtractWeek">
              <span class="text-xs font-semibold uppercase ">Prev Week</span>
            </div>
            <div class=" flex w-full md:flex-1 justify-center">
              <div class="" v-for="(value, index) in 7" :key="index">
               
                <div :class="{'border-grey-darkest shadow-md bg-white':selectedDate == index}" class="relative flex justify-center h-12 w-32 hover:border-grey-light hover:bg-white cursor-pointer mx-2 mt-4 mb-4 border  rounded  "  @click.prevent="getTimeslots(weeklyCalendar(index).format('YYYY-MM-DD'),index)" >
                      <div class="-mt-2 -mr-2 h-4 w-4 rounded-full bg-black absolute pin-t pin-r" v-show="selectedDate == index">
                        <svg  class="h-4 w-4 fill-current stroke-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/></svg>
                      </div>
                      <div class="block flex items-center justify-center text-md text-grey-darkest  uppercase font-normal">{{weeklyCalendar(index).format('ddd')}}</div>
                      <div class="block flex items-center justify-center text-md text-grey-darkest  mx-2 uppercase font-normal">{{weeklyCalendar(index).format('MMM')}}</div>
                      <div class="block flex items-center justify-center text-normal font-semibold"> {{weeklyCalendar(index).format('DD')}}</div>  
                </div>

              </div>

            </div>
            <div class="flex items-center  w-12 bg-grey-lighter border-l  px-2 hover:bg-grey cursor-pointer rounded-r" @click.prevent="addWeek">

              <span class="text-xs font-semibold uppercase ">Next Week</span>
            </div>


          </div>

          <div class="" v-if="!timeSelect">
              <div class="flex flex-wrap -mx-2 mt-4 justify-center" >
                <div class="w-4/5 flex flex-wrap">
                  <div class=" p-2"  v-for="time in timeslots" :key="time.id">
                    <div :class="{ 'bg-red text-white cursor-not-allowed hover:bg-red' : time['Booked']}" class=" border w-24 text-grey-darkest text-center hover:bg-grey-lighter py-2 rounded  bg-white text-sm cursor-pointer">
                    <span @click.prevent="getBookForm(time)" v-if="!time['Booked']"> {{timeslot(time['slot'])}}</span>
                    <span v-else> {{timeslot(time['slot'])}}</span>
                    </div>
                  </div>

                </div>
                
              </div>
          </div>
          <book-confirm :serviceinfo="booking" v-if="timeSelect"></book-confirm>
     </div>
      </div>

</template>

<script>
import bookConfirm from "./booking-confirm.vue";
export default {
  components: {
    bookConfirm
  },
  props: ["provider", "service"],
  data() {
    return {
      timeslots: {},
      today: moment(),
      bookService: this.service,
      user: this.provider.id,
      weekstart: moment(),
      timeSelect: false,
      selectedDate: null,
      booking: {
        service: this.service,
        provider: this.provider.id,
        time: null
      }
    };
  },
  mounted() {},
  computed: {
    newWeek() {
      return this.addWeek;
    }
  },
  methods: {
    addWeek: function() {
      this.weekstart = moment(this.weekstart).add(1, "week");
      return this.weeklyCalendar();
    },
    subtractWeek: function() {
      this.weekstart = moment(this.weekstart).subtract(1, "week");
      return this.weeklyCalendar();
    },
    weeklyCalendar: function(n) {
      return moment(this.weekstart).add(n, "days");
    },

    timeslot(slot) {
      return moment(slot).format("hh:mm A");
    },
    getTimeslots(date,index) {
      //console.log(date);
      this.selectedDate = index;
      axios
        .get(`/service/${this.bookService}/provider/${this.user}?date=${date}`)
        .then(response => {
          this.$set(this.$data, "timeslots", response.data);
        });
    },
    getBookForm(time) {
      this.timeSelect = true;
      this.booking.time = time;
    }
  }
};
</script>

<style lang="css">

</style>
