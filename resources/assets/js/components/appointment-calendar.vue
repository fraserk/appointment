<template >
  <div class="calendar">
    <div class="row">
      <div class="column">
        <div class="calendar-header">
          <i class="fa fa-fw fa-chevron-left" @click="subtractMonth"></i>
          <h4> </h4>
          <i class="fa fa-fw fa-chevron-right" @click="addMonth"></i>



        </div>
      </div>
    </div>
    <div class="row">
      <div class="columns" v-for="n in 7">
          {{fuck(n)}}

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
    console.log(this.dateContext.add(1, 'days').format("MMMM Do,dddd"));

  },
  computed:{
    year: function(){
      var t =this;
      return t.dateContext.format('Y');
    },
    month: function(){
      var t = this;
      return t.dateContext.format('MMMM');
    },
    daysInMonth (){
      var t = this;
      return t.dateContext.daysInMonth();
    },
    currentDate (){
      var t= this;
      return t.dateContext.get('date');
    },
    weekStart(){
      var t =this;
      return t.dateContext.startOf('week');
    },
    weekEnd(){
      var t =this;
      return t.dateContext.endOf('week');
    },
    currentWeek (){
      var t = this;
      return t.dateContext.get('week');
    },
    daysInWeek(){
      var t = this;
      return t.dateContext.weekday();
    },
    weekDayNumber(){
      var t = this;
      for (i = 0; i <=6; i++){
        return  moment(weekStart).add(i, 'days').format("MMMM Do,dddd");
      }

    },
    firstDayOfMonth (){
      var t = this;
      var firstDay = moment(t.dateContext).subtract((t.currentDate - 1), 'days');
      return firstDay.weekday();
    },
    initialDate: function () {
     var t = this;
     return t.today.get('date');
 },
   initialMonth: function () {
       var t = this;
       return t.today.format('MMMM');
   },
   initialYear: function () {
       var t = this;
       return t.today.format('Y');
   }
 },
 methods: {
    addMonth: function () {
        var t = this;
        t.dateContext = moment(t.dateContext).add(1, 'month');
      },
      subtractMonth: function () {
          var t = this;
          t.dateContext = moment(t.dateContext).subtract(1, 'month');
      },
      fuck: function(n){
        return moment().startOf('week').add(n, 'days').format("MMMM Do,dddd");
      }
  }
}
</script>

<style lang="css">
</style>
