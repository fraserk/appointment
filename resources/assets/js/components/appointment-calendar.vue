<template >
  <div class="">
    <div class="flex flex-wrap -mx-2 mt-4">
      <div class="mx-2 md:mx-0 w-full md:w-1/3 px-2">
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
                <div class=" flex  bg-white border border-l-8  border-grey-lighter p-4 mb-4 mt-4 hover:border-grey-dark cursor-pointer" v-for="staff in staffs">
                  <div class="flex flex-wrap w-full items-center">
                    <div class="w-1/3">
                      <span class="rounded-full h-12 w-12 flex items-center justify-center bg-orange">KF</span>
                    </div>
                    <div class="w-2/3">
                      <span class="text-sm text-grey-darker font-semibold">{{staff.name}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-2/3 px-2">
        <div class="bg-white rounded border">
          <div class="flex rounded-t w-full h-16 items-center p-4 text-sm justify-center border-b bg-blue-dark ">
            <span class="flex font-bold text-white">Schedule An Appointment</span>

          </div>
          <div class=" flex my-4 bg-blue-lightest border-t border-b">
            <div class="flex items-center justify-end  w-1/3">
              <span class=" "><a @click.prevent="subtractWeek" >Prev</a></span>
            </div>
            <div class=" flex w-full  w-1/3">
              <div class="flex-auto  text-center mt-4 mb-4" v-for="(value, index) in 7">

                <a href="#" class ="no-underline"@click.prevent="getTimeslots(weeklyCalendar(index).format('YYYY-MM-DD'))">
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

          <div class="">

              <div class="row">
                <div class="large-1 columns" v-for="time in timeslots">
                  {{timeslot(time.date)}}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
props: ['company','user'],
  data(){
    return{
      timeslots: {},
      today:moment(),
      staffs : this.company.staffs,
      weekstart: moment(),

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
        axios.get(`/api/company/${this.user.company.id}/service/${this.company.service['0'].id}?api_token=${this.user.api_token}&date=${date}`,this.$data).then((response)=>{
        this.$set(this.$data,'timeslots',response.data);


        });
      }
  }
}
</script>

<style lang="css">
</style>
