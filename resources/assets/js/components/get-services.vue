<template>

    <div>
      <div class="flex flex-wrap md:-mx-2 mt-4">
        <div class="w-full md:w-1/4 md:px-2 mx-2  md:mx-0" v-for="service in services" :key="service.id">
          <div class="border sm:rounded bg-white mb-4 ">
            <div class=" text-md p-4 text-grey-darkest bg-pink-lightest">
              {{service.name}}
            </div>
            <div class=" p-4 text-sm text-grey-dark">
              <p class="tracking-normal leading-normal">Contrary to popular belief, Lorem Ipsum is not simply random text. 
                It has roots in a piece of classical Latin literature from 45 BC, 
                making it over 2000 years old.</p>
            </div>
            <div class="flex border-t">
              <div class="p-2 w-1/2 text-center border-r">
                $30.00
              </div>
              <div class="p-2 w-1/2 text-center">
                30 Mins 
              </div>
            </div>

          </div>
        </div>
      </div>
      
    </div>
</template>

<script>
export default{
 props: ['user','company'],
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
      axios.get(`api/company/${this.company}/service?api_token=${this.user.api_token}`,this.$data).then((response)=>{
        this.$set(this.$data,'services',response.data);

      });
    },

    editService(service){
      services.$emit('editService',service);
    },

  }
}
</script>
