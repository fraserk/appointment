<template>

    <div class="row">

      <div class="column">
        <table class="hover table-scroll unstriped">
          <thead>
            <tr>
                <td>Name</td>
                <td>Duration</td>
                <td>Price</td>
                <td>Action</td>
              </tr>
          </thead>
          <tbody>
            <tr v-for="service in services">
              <td>{{service.name}}</td>
              <td>30 Minutes</td>
              <td>$20</td>
              <td><button type="button" name="button" class="button small hollow fa-5x" @click.prevent="editService(service)"><i class="fa fa-gear"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>

<script>
export default{
 props: ['user'],
 data(){
   return{
     services:{

     }
   }
 },

  mounted(){
    services.$on('updateServiceList',data=>{
      this.getservices();
    })
    this.getservices();
  },
  methods: {
    getservices(){
      axios.get('api/user/'+this.user.id+ '/service?api_token='+this.user.api_token,this.$data).then((response)=>{
        this.$set(this.$data,'services',response.data);
        
      });
    },

    editService(service){
      services.$emit('editService',service);
    },

  }
}
</script>
