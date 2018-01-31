<template>
  <div class="flex  w-full p-4 md:justify-around">
      <form class="md:w-3/5 " method="post" >
          <div class="f md:items-center  p-4">

            <div class="flex  mt-2 items-center" v-for="(schedule,index) in schedules" :key="schedule.key">
              <div class="w-4 mr-1">
                <input type="checkbox" name="" value="" class="">
              </div>
              <div class="w-12 mr-1 text-xs">
                {{schedule.day_of_week}}
              </div>
              <div class="w-16 mr-1">
                <input type="text" v-model="schedule.start" @click="showButton(index)" class="w-16  mx-1 bg-grey-lighter appearance-none border rounded text-grey-darkest px-2 text-center hover:border-grey-darker  text-xs py-1 md:mx-2">
              </div>

              <div class="w-16 ml-1">
                <input type="text"  v-model="schedule.end" @click="showButton(index)" class="w-16 bg-grey-lighter appearance-none border rounded text-grey-darkest px-2 text-center hover:border-grey-darker  text-xs py-1 md:mx-2">
              </div>

              <div class="w-12 ml-2">
                <button class="border bg-blue px-2 py-1 rounded text-white text-sm ml-2" type="button" name="button" @click.prevent="update(schedule)" v-if="index === editing">save</button>
              </div>

            </div>

          </div>

      </form>
  </div>
</template>
<script>
export default {
  props: ['defaultdata'],
  data(){
    return {
      schedules : this.defaultdata,
      editing: null
    }
  },
  mounted() {
    //console.log(this.data);
  },
  methods: {
    time(time) {
      return moment(time, "HH:mm:ss").format("hh:mm A");
    },
    update(schedule){
      //console.log(schedule);
      let url = `/backend/settings/schedule/${schedule.id}/update`;
         axios.patch(url,schedule).then((response)=>{
          //console.log(response.data);
      });
    },
    showButton(index){
      return this.editing = index;

    }
  },
}
</script>
<style lang="scss" scoped>
</style>
