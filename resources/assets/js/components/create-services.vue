<template>
<div class="">
  


  <div class="flex fixed z-1  w-full h-full rounded modal pin-l pin-t items-center justify-center" v-bind:class="{visible: createForm, 'invisible':hideForm}">
    <div class="bg-white md:shadow-lg  opacity-100 mx-2 ">
      <div class="flex ">
        <div class=" p-4 w-full boder-b bg-grey-light font-semibold">
          <span v-if="revealLabel === 'Edit'">Edit Service</span>
          <span v-else>Create New Service</span>
        </div>
      </div>

      <div class="mt-4 p-4">

          <form @submit.prevent="formMethod">
            <div class="flex items-center mb-4">
              <div class="w-1/3 text-right mr-4">
                <label for="" class="block">
                  Service name:
                </label>
              </div>
              <div class="w-2/3">
                  <input type="text" v-model="name" class="appearance-none bg-white shadow border  w-full p-2 " placeholder="Name of this service">
              </div>
              </div>


              <div class="flex items-center mb-4">
                <div class="w-1/3 text-right mr-4">
                <label for="" class="block">
                  Service Price:

                </label>
                </div>
                  <div class="w-2/3">
                      <input type="text" v-model="price" class="appearance-none bg-white shadow border  w-1/4 p-2 " placeholder="Service Price">
                  </div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-1/3 text-right mr-4">
                <label for="" class="block">
                  Service Duration:

                </label>
                </div>
                  <div class="w-2/3">
                      <input type="text" v-model="duration" class="appearance-none bg-white shadow border  w-1/4 p-2 " placeholder="Service Price">
                  </div>
              </div>
              <div class="flex">
                <div class="w-1/3 text-right mr-4">
                <label for="" class="block">
                  Service Desctiption:

                </label>
                </div>
                  <div class="w-2/3">
                      
                       <textarea name="name" rows="8" cols="80" class="appearance-none bg-white shadow border  w-full p-2 "></textarea>
                  </div>
              </div>


            <div class="flex mt-4 ">
              <div class="w-full text-right">

                <button  class="mr-4 py-2 px-4 bg-blue rounded text-xs text-white" :disabled="this.saving">
                    {{createForm? 'CREATE':'EDIT'}}
                  
                 </button>

                <button :disabled="this.deleting"  class="button tiny alert" v-if="revealLabel === 'Edit'" @click.prevent="deleteService(service)"> 
                  Delete
                </button>

                <a href="#" class="button is-link" @click.prevent="hideForm = true" >cancel</a>
              </div>

            </div>



          </form>
  </div>

    </div>
    </div>

</div>
</template>

<script>
    export default {
      props: ['user','company'],
      data() {
        return{
          revealLabel:'',
          name: '',
          price: '',
          duration:'',
          service: '',
          editForm: false,
          createForm: false,
          hideForm: true,
          saving: false,
          deleting: false
        }
      },

        mounted() {
          services.$on('editService',data=>{
            //console.log(data.id);
            this.name = data.name;
            this.service = data.id;
            this.editForm = true;
            this.createForm = false;
            this.revealModel('Edit');
          });
        },
        methods: {
          revealModal(options){
            this.revealLabel = options;
            if (this.revealLabel === 'create'){
              this.name ="";
              this.createForm = true;
              this.editForm = false;
              this.hideForm = false
            }

          },
          saveService(){
            this.saving = true
            axios.post('api/company/'+this.company+ '/service?api_token='+this.user.api_token,this.$data).then((response) =>{

              this.name = ''
              this.saving = false;
              this.hideForm = true;
              services.$emit('updateServiceList');
              swal({
                  title: 'Great..',
                  text: 'Service Created Successfully',
                  timer: 2000,
                  type: 'success'
                });
            });
          },
          editService(){
            this.saving = true
            axios.patch('api/company/'+this.company+ '/service/'+this.service+'?api_token='+this.user.api_token,this.$data).then((response) =>{

              this.name = '';
              this.service='';
              this.saving = false;
              this.hideForm = true
              services.$emit('updateServiceList');
              swal({
                  title: 'Great..',
                  text: 'Service Updated Successfully',
                  timer: 2000,
                  type: 'success'
                });
            });
          },
          deleteService(){
            this.deleting = true
            axios.delete('api/company/'+this.company+ '/service/'+this.service+'?api_token='+this.user.api_token).then((response) =>{

              this.name = '';
              this.service='';
              this.deleting = false;
              $('#serviceModel').foundation('close');
              services.$emit('updateServiceList');
              swal({
                  title: 'Great..',
                  text: 'Service Deleted Successfully',
                  timer: 2000,
                  type: 'success'
                });
            });
          },

          formMethod(){
            if (this.formAction === 'saveService') {
              this.saveService()
            } else{

              this.editService();
            }
          }


        },
        computed: {
          formAction(){
              if (this.createForm) {
                return 'saveService';
              } else{

                return 'editService';
              }
          }
        }
    }
</script>
