<template >
  <div class="calendar">
    <div class="row">
      <div class="column">
        <a @click.prevent="subtractWeek"><i class="fa fa-fw fa-chevron-left" ></i></a>
      </div>
      <div class="columns" v-for="n in 7">
          {{weeklyCalendar(n)}}

      </div>
      <div class="column ">
        <a href="#"  @click.prevent="addWeek"><i class="fa fa-fw fa-chevron-right"></i></a>
      </div>
    </div>
    </div>
</template>

<script>
export default {

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
        return moment(this.dateContext).startOf('week').add(n, 'days').format("ddd M/DD/Y");
      }
  }
}
</script>

<style lang="css">
</style>
