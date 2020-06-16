<template>
    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Customer's info</h3>
                        <div class="card-tools">
                            <button @click="createModel" class="btn btn-success"><i class="fas fa-user-plus fa-fw"></i> Add Customer</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>contact</th>
                                     <th>Address</th>
                                     <!-- <th>Registered at</th> -->
                                     <th>Modify</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="resC in customers" :key="resC.id">
                                     <td>{{resC.name}}</td>
                                     <td>{{resC.email}}</td>
                                     <td>{{resC.phone}}</td>
                                     <td>{{resC.adderss}}</td>
                                     <!-- <td>{{resC.created_at|momentTime}}</td> -->
                                     <td><a @click="editModel(resC)" href="#"><i class="fas fa-edit fa-fw fontbig blue"></i>
                                    </a><a @click="deleteCustomer(resC.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
                                 </tr>
                             </tbody>
                             <!-- <div class="card-footer"></div> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Add customer's info</h5>
                    <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Edit customer's info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form @submit.prevent="editMode ? editCustomer() : createCustomer()">
                <div class="modal-body">
                    <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                            <input v-model="form.email" type="email" name="email" placeholder="Enter email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                     </div>
                     <div class="form-group">
                            <input v-model="form.phone" type="number" name="phone" placeholder="Enter contact"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                            <has-error :form="form" field="phone"></has-error>
                    </div>
                     <div class="form-group">
                            <input v-model="form.adderss" type="text" name="adderss" placeholder="Enter address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('adderss') }">
                            <has-error :form="form" field="adderss"></has-error>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editMode" type="submit" class="btn btn-success">Create Customer</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Update Customer</button>
                </div>
            </form>
                </div>
                
            </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                editMode: false,
                customers: [],
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    phone: '',
                    adderss: ''
                })
            }
        },
        methods: {
            editCustomer(){
                 this.form.put('api/customer/'+this.form.id)
                     .then(() => {
                        
                                    swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                                    Bus.$emit('rootbus')
                                    $('#myModal').modal('hide')
                     })
                     .catch((err) => {
                         console.log(err)
                    //     swal.fire({
                    //                 type: 'error',
                    //                 title: 'Oops...',
                    //                 text: 'Something went wrong!',
                    //                 footer: '<a href>Why do I have this issue?</a>'
                    //                 })
                     })

            },
            editModel(resC){
                this.editMode = true;
                this.form.reset()
                 $('#myModal').modal('show')
                 this.form.fill(resC)
            },
            deleteCustomer(id){
                this.form.delete('api/customer/'+id)
                  .then(() => {
                     swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Bus.$emit('rootbus')
                  })
                  .catch(() => {
                      swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                  })
            },
            loadCustomer(){
                axios.get('api/customer')
                     .then(({data}) => {
                         this.customers = data
                     })
                     .catch((err) => {
                         console.log(err)
                   
                     })
            }
            ,
            createModel(){
                this.editMode = false;
                this.form.reset()
                 $('#myModal').modal('show')
            },
            createCustomer(){
                console.log('customer created')
                this.form.post('api/customer')
                    .then(() => {
                       swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#myModal').modal('hide')
                            Bus.$emit('rootbus')
                    })
                    .catch((err) => {
                        console.log(err)
                        //  swal.fire({
                        //             type: 'error',
                        //             title: 'Oops...',
                        //             text: 'Something went wrong!',
                        //             footer: '<a href>Why do I have this issue?</a>'
                        //             })
                    })
            }
        }
        ,
        mounted() {
            this.loadCustomer()
            Bus.$on('rootbus', () => { this.loadCustomer()})
            console.log('Component mounted.')
        }
    }
</script>