<template>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-4">

            <!-- small box -->
                    <div class="small-box bg-info">
                       <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <h3>{{invoices}}</h3>

                                <p>Invoices</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <img width="100px" src="/img/invoice.svg" alt="">
                            </div>
                       </div>
                    <router-link to="/invoice" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
                    </div>
          
            </div>
            <div class="col-md-4">

            <!-- small box -->
                    <div class="small-box bg-success">
                     <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <h3>{{customers}}</h3>

                                <p>Customers</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <img width="90px" src="/img/customer.svg" alt="">
                            </div>
                       </div>
                    <router-link to="/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
                    </div>
          
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                customers:null,
                invoices: null
            }
        },
        mounted() {
            axios.get('api/customer')
                 .then(({data}) => {
                     this.customers = data.length
                 })
                 .catch( err => console.log(err))
            console.log('Component mounted.')
            axios.get('api/invoice')
                 .then(({data}) => {
                     this.invoices = data.length
                 })
                 .catch( err => console.log(err))
            console.log('Component mounted.')
        }
    }
</script>