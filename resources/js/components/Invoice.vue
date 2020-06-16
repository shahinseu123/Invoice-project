<template>
    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">
                <h2>Invoice</h2>
                <div class="card-tools">
                    <router-link to="/addinvoice"  class="btn btn-primary">CREATE INVOICE</router-link>
                    
                </div>
            </div>
            <div class="card-body">
               
           
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer</th>
                      <th>Authorise by</th>
                      <th>Shift To</th>
                      <!-- <th>Payment</th> -->
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="invo in getInvoices" :key="invo.id">
                      <td>{{invo.quotationNumber}}</td>
                      <td>{{invo.customer}}</td>
                      <td>{{invo.authorisedBy}}</td>
                      <td>{{invo.shipTo}}</td>
                      <!-- <td>{{invo.payment}}</td> -->
                      <td>{{invo.created_at|momentTime}}</td>
                      <td>
                           <router-link :to="`/showinvoice/${invo.id}`" class="btn btn-info"><i class="fas fa-eye" style="color:white" ></i></router-link>
                           <!-- <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a> -->
                           <a @click="deleteInvoice(invo.id)" href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
            
            <!-- /.card -->
              </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
      return {
         invoices: []
      }
    },
    computed: {
       getInvoices(){
         return this.invoices
       }
    },
    methods: {
      loadInvoices(){
        axios.get('api/invoice')
             .then(({data}) => {
                 this.invoices = data
             })
             .catch(err => console.log(err))
      },
      deleteInvoice(id){
        axios.delete(`api/invoice/${id}`)
             .then(() => {
                 swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Bus.$emit('rootbus')
             })
             .catch( err => console.log(err))
      },
      // sendInvoiceId(id){
      //   console.log(id)
      // }
    },
    created(){
       this.loadInvoices()
       Bus.$on('rootbus', () => { this.loadInvoices() })
    }
}
</script>