<template>
  <div class="">

    <form @submit.prevent="saveStore">
      <div class="row">
        <div class="columns small-12 large-6">
          <div class="card">
            <div class="card-divider">
              <h3>Company Info</h3>
            </div>
            <div class="card-section ">

              <div class="row">
                <div class=" large-4 columns">
                  <label for="">NAME
                    <input type="text" v-model="companyInfo.name">
                  </label>
                </div>
                <div class=" large-4 columns">
                  <label for="">PHONE
                    <input type="text" name="" value="">
                  </label>
                </div>
                <div class=" large-4 columns">
                  <label for="">EMAIL
                    <input type="text">
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="columns">
                  <textarea v-model="companyInfo.bio" rows="8" cols="80" placeholder="Breif Bio"></textarea>

                </div>

              </div>

              <div class="row">
                <div class="columns">
                  <label for="">Street address
                    <input type="text" v-model="companyInfo.street_address">
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <label for="">City
                    <input type="text" v-model="companyInfo.city">
                  </label>
                </div>
                <div class="large-4 columns">
                  <label for="">State
                    <input type="text" v-model="companyInfo.state">
                  </label>
                </div>
                <div class="large-4 columns">
                  <label for="">Zip Code
                    <input type="text" v-model="companyInfo.zip_code">
                  </label>
                </div>
              </div>

            </div>
          </div>
        </div>




      </div>
      <div class="row">
        <div class="column text-right">
          <input type="submit" class="button small"value="Save">
          <a href="# " class="button is-link">cancel</a>
        </div>
      </div>
    </form>
  </div>
</template>

<script>

  export default{

    props: ['user'],
    data(){
      return{
        companyInfo : {
          start: '10:00',
          end: '5:00',

            name:'',
            bio: '',
            street_address:'',
            city:'',
            state:'',
            state:'',
            zip_code:'',
          store_hours : {
            mon: ['11:00-20:30'],
            tue: ['11:00-20:30'],
            wed: ['11:00-20:30'],
            thur: ['11:00-20:30'],
            fri: ['11:00-20:30'],
            sat: ['11:00-20:30'],
            sun: ['11:00-20:30'],

          }
            // IsOpen: tru
        }
    }
  },
      mounted() {
       this.getCompany();
      },
      methods: {
        saveStore(){
          axios.patch('api/user/'+this.user.id+'/company/'+this.user['company'].id+'?api_token='+this.user.api_token,this.$data.companyInfo).then((response)=>{
            console.log(response.data);
          });
          console.log(this.$data);
        },
        getCompany(){
          axios.get('api/user/'+this.user.id+'/company/'+this.user['company'].id+'?api_token='+this.user.api_token).then((response)=>{
            this.$set(this.$data,'companyInfo',response.data);
          });
        },
        formateTime(){
          return this.companyInfo.store_hours.hours.open;
        }

      },
      computed:{
      }
  }
</script>
