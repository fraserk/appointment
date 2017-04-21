<template >
  <div class="card">
    <div class="row collapse">
      <div class="small-12 large-2 columns booking-sidebar">
          <div class="content">
            <h2>Hair Cut</h2>
            <small>$75.00</small>
          <p>By default, all columns in a flex grid stretch to be equal height.
            This behavior can be changed with another set of alignment classes. That's right, middle alignment in CSS!</p>
          </div>

        </div>
        <div class="small-12 large-10 columns   card-section text-center booking-content">
          <h2>Schedule An Appointment</h2>
          <div class="row ">
            <div class=" small-12 columns ">
              <span class="has-small-text">SELECT A DATE</span>
            </div>
          </div>
            <div class="row small-12 collapse weeklyCalendar align-middle">
              <div class="column ">

                <a @click.prevent="subtractWeek" ><i class="fa fa-fw fa-chevron-left " ></i></a>
              </div>
              <div class="column dates" v-for="n in 7">
              <a href="#" @click.prevent="getTimeslots(formattedDate(n))">
                <div>
                  <div class="dayNumber">
                    {{weeklyCalendar(n)}}
                  </div>
                  <div class="dayName">
                    {{weekName(n)}}
                  </div>
                </div>
              </a>

              </div>
              <div class="column">
                <a href="#"  @click.prevent="addWeek"><i class="fa fa-fw fa-chevron-right"></i></a>

              </div>
            </div>

            <div class="row align-center">
              <div class=" small-12 large-10 columns">
                <div class="row has-top-margin timeslots">
                  <div class="columns small-12 large-2 " v-for="time in timeslots">
                    <div class="callout " >
                      {{time.period}}
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <!-- <div class="row">
              <div class="large-1 columns" v-for="time in timeslots">
                {{time.period}}
              </div>
            </div> -->
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
      dateContext: moment(),
      days: ['S','M','T','W','T','F','S']
    }
  },
  mounted() {


  },
  computed:{

 },
 methods: {
    addWeek: function () {

        this.dateContext = moment(this.dateContext).add(1, 'week');
        return this.weeklyCalendar();
      },
      subtractWeek: function () {
        this.dateContext = moment(this.dateContext).subtract(1, 'week');
        return this.weeklyCalendar();
      },
      weeklyCalendar: function(n){
        return moment(this.dateContext).startOf('week').add(n, 'days').format("DD");
      },
      weekName: function(n){
        return moment(this.dateContext).startOf('week').add(n, 'days').format("ddd");
      },
      formattedDate: function(n){
        return moment(this.dateContext).startOf('week').add(n, 'days').format("Y-MM-DD");
      },
      timeslot(slot){
        return moment(slot).format('h:mm A');
      },
      getTimeslots(date){
        axios.get(`/api/company/${this.user.company.id}/service/${this.company.service['0'].id}?api_token=${this.user.api_token}&date=${date}`,this.$data).then((response)=>{
        this.$set(this.$data,'timeslots',response.data);


        });
      }
  }
}
</script>

<style lang="css">
</style>
