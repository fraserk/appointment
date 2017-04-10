<template >
  <div class="">

      <div class="row">
        <div class="small-12 large-6 columns">
          <div class="card">
            <div class="card-divider">
              <h3>BUSINESS </h3>
            </div>
            <div class="card-section">

              <div class="row is-underline align-middle " v-for="(hour, index) in timeslot" >
                <div class="columns small-3">
                  <fieldset>
                    <label class="text-left" for="">
                      <input type="checkbox" v-model="hour.is_open" >
                      {{hour.day_of_week}}
                    </label>

                  </fieldset>

                </div>
                <!-- Date columns -->
                <div class=" small-3 columns">
                  <label for="">


                    <input type="text" v-model="hour.open_time" :disabled="!hour.is_open">
                  </label>
                </div>
                <div class="small-3 columns">
                  <label for="">
                    <input type="text" v-model="hour.close_time"  :disabled="!hour.is_open">
                  </label>
                </div>
                <div class="columns small-3">
                  <label class="text-left" for="">
                    <button @click.prevent="update(hour)" class="button tiny hollow Secondary" :disabled="hour.updating" >
                      <i class="fa fa-spinner fa-spin" v-show="hour.updating"></i>
                      <span v-if="hour.updating">SAVING</span>
                      <span v-else='!hour.updating'>UPDATE</span>
                    </button>


                  </label>

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
  props: ['user'],

  data(){
    return{

      timeslot : []
    }
  },

  mounted(){
    this.getCompany();
  },
  methods: {
    update(storeHour) {
      var self = this;
      storeHour.updating = true;
      axios.patch(`api/company/${storeHour.company_id}/hour/${storeHour.id}?api_token=${this.user.api_token}`,storeHour).then((response)=>{
        storeHour.updating = false;
      });
    },
    getCompany(){
      axios.get(`api/test?api_token=${this.user.api_token}`).then((response)=>{
      this.$set(this.$data,'timeslot',response.data);
      });
    }
  },
  filters: {
    formatTime: function(value){
      return moment(String(value),"HH:mm").format('LT');
    }
  }
}
</script>

<style lang="css">
</style>
