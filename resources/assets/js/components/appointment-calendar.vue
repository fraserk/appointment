<template >
    <div class="flex flex-wrap ">
      <div class="w-full">

          <div class=" flex bg-red-lightest  rounded shadow" v-if="!timeSelect">
            <div class="flex items-center   w-12 bg-grey-lighter border-r px-2 hover:bg-grey cursor-pointer rounded-l" @click.prevent="subtractWeek">
              <span class="text-xs font-semibold uppercase ">Prev</span>
            </div>
            <div class=" flex w-full md:flex-1">
              <div class="flex-auto  text-center mt-4 mb-4" v-for="(value, index) in 7" :key="value.id">
                <a href="#" class="no-underline" @click.prevent="getTimeslots(weeklyCalendar(index).format('YYYY-MM-DD'))">                  
                    <span class="block text-md text-grey-darkest mb-2">{{weeklyCalendar(index).format('ddd')}}</span>
                    <span class="block text-xs font-semibold">{{weeklyCalendar(index).format('MMM-DD')}}</span>  
                </a>
              </div>

            </div>
            <div class="flex items-center  w-12 bg-grey-lighter border-l  px-2 hover:bg-grey cursor-pointer rounded-r" @click.prevent="addWeek">

              <span class="text-xs font-semibold uppercase ">Next</span>
            </div>


          </div>

          <div class="" v-if="!timeSelect">
              <div class="flex flex-wrap -mx-2" >
                <div class=" p-2"  v-for="time in timeslots" :key="time.id">
                  <div class="border w-24 text-grey-darkest text-center hover:bg-grey-lighter py-2 rounded  bg-white text-sm">
                  <span @click.prevent="getBookForm(time)"> {{timeslot(time.date)}}</span>
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
    getTimeslots(date) {
      //console.log(date);
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
