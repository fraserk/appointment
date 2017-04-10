<template>
<div class="">

  <a class="button tiny primary" @click.prevent="revealModel('Create')">Create New Service</a>
  <div class="reveal" id="serviceModel" data-reveal>
    <div class="card">
      <div class="card-divider primary">
        <span v-if="revealLabel === 'Edit'">Edit Service</span>
        <span v-else>Create new service</span>
      </div>
      <div class="card-section">

        <form @submit.prevent="formMethod">

          <div class="row">
            <div class="large-4 column">
              <label for="">
                Service name
                <input type="text" v-model="name">

              </label>
            </div>
            <div class="large-4 column">
              <label for="">
                Service Price
                <input type="text" name="" value="">

              </label>
            </div>
            <div class="large-4 column">
              <label for="">
                <label for="">
                  SERVICE DURATION
                  <input type="text" name="" value="">
                </label>
              </label>
            </div>


          </div>
          <div class="row">
            <div class="column">
              <label for="">
                Service Discription
                <textarea name="name" rows="8" cols="80"></textarea>
              </label>

            </div>

          </div>

          <div class="row">
            <div class="column text-right">

              <input type="submit" :value="createForm? 'CREATE':'EDIT'" class="button tiny primary" :disabled="this.saving">

              <input type="submit" :disabled="this.deleting" value="DELETE" class="button tiny alert" v-if="revealLabel === 'Edit'" @click.prevent="deleteService(service)">

              <a href="#" class="button is-link" data-close >cancel</a>
            </div>

          </div>



        </form>
      </div>
    </div>
    <!-- <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button> -->
  </div>
</div>
</template>

<script>
    export default {
      props: ['user'],
      data() {
        return{
          revealLabel:'',
          name: '',
          service: '',
          editForm: false,
          createForm: false,
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
          revealModel(options){
            this.revealLabel = options;
            if (this.revealLabel === 'Create'){
              this.name ="";
              this.createForm = true;
              this.editForm = false;
            }

            $('#serviceModel').foundation('open');
          },
          saveService(){
            this.saving = true
            axios.post('api/user/'+this.user.id+ '/service?api_token='+this.user.api_token,this.$data).then((response) =>{

              this.name = ''
              this.saving = false
              $('#serviceModel').foundation('close');
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
            axios.patch('api/user/'+this.user.id+ '/service/'+this.service+'?api_token='+this.user.api_token,this.$data).then((response) =>{

              this.name = '';
              this.service='';
              this.saving = false;
              $('#serviceModel').foundation('close');
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
            axios.delete('api/user/'+this.user.id+ '/service/'+this.service+'?api_token='+this.user.api_token).then((response) =>{

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
