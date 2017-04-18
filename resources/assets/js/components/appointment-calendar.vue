<template >
  <div class="card">
    <div class="row">
      <div class="large-3 columns booking-sidebar">
          <div class="content">
            <h2>Hair Cut</h2>
            <small>$75.00</small>
          <p>By default, all columns in a flex grid stretch to be equal height.
            This behavior can be changed with another set of alignment classes. That's right, middle alignment in CSS!</p>
          </div>

        </div>
        <div class="column card-section text-center booking-content">
          <h2>Schedule Appointment</h2>
          <div class="row ">
            <div class="column ">
              <small>SELECT A DATE</small>
            </div>
          </div>
            <div class="row collapse weeklyCalendar align-middle">
              <div class="column ">

                <a @click.prevent="subtractWeek" ><i class="fa fa-fw fa-chevron-left " ></i></a>
              </div>
              <div class="column dates" v-for="n in 7">
              <a href="#" class="">
                <div>
                  <div class="dayName">
                    {{weekName(n)}}
                  </div>
                  <div class="dayNumber">
                    <a href="#">{{weeklyCalendar(n)}}</a>
                  </div>
                </div>
              </a>

              </div>
              <div class="column">
                <a href="#"  @click.prevent="addWeek"><i class="fa fa-fw fa-chevron-right"></i></a>

              </div>
            </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
props: ['period'],
  data(){
    return{
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
        return moment(this.dateContext).startOf('week').add(n, 'days').format("MM/DD");
      },
      weekName: function(n){
        return moment(this.dateContext).startOf('week').add(n, 'days').format("ddd");
      },
      timeslot(slot){
        return moment(slot).format('h:mm A');
      }
  }
}
</script>

<style lang="css">
</style>
