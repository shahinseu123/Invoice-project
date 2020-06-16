<template>
    <div class="container-fluid my-4">
      <form @submit.prevent="submitInvoice">
          <div class="card">
        
             <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <label for="customer">Customer</label>
                        <div class="form-group">
                        <select @change="populateCustomer" name="customer" id="customer" class="form-control" v-model="form.customer" :class="{ 'is-invalid': form.errors.has('customer') }">
                            <option value="" selected> --Select Customer-- </option>
                            <option v-for="cus in customers" :key="cus.id" :value="cus.name"> {{cus.name}} </option>
                        </select>
                        <has-error :form="form" field="Customer"></has-error>

                         <label for="customerEmail" style="margin-top:1px">Customer Email</label>
                            <div class="form-group"> 
                                    <input v-model="form.customerEmail" type="email" name="customerEmail" 
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('customerEmail') }">
                                    <has-error :form="form" field="customerEmail"></has-error>
                            </div>
                         <label for="customerPhone">Customer Phone</label>
                            <div class="form-group"> 
                                    <input v-model="form.customerPhone" type="text" name="customerPhone" 
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('customerPhone') }">
                                    <has-error :form="form" field="customerPhone"></has-error>
                            </div>
                    </div>
                   </div>

                   <div class="col-md-6">
                       <label for="shipTo">Ship To</label> 
                        <div class="form-group">
                        <textarea name="shipTo" id="shipTo" cols="30" rows="3" class="form-control" v-model="form.shipTo" :class="{ 'is-invalid': form.errors.has('shipTo') }"></textarea>    
                        <!-- <input type="text" v-model="form.shipTo" class="form-control" value="" name="shipTo" id="shipTo" :class="{ 'is-invalid': form.errors.has('shipTo') }"> -->
                        <has-error :form="form" field="shipTo"></has-error>

                         <label for="paymentMethod" style="margin-top:20px">Payment Methods</label>
                      <div class="form-group" > 
                            <input v-model="form.paymentMethod" type="paymentMethod" name="paymentMethod" placeholder="Enter Payment Method"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('paymentMethod') }">
                            <has-error :form="form" field="paymentMethod"></has-error>
                    </div>
                    </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                       <!-- <label for="quotationDate">Quotation Date</label>
                       <div class="form-group"> 
                            <input v-model="form.quotationDate" type="date" name="quotationDate" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('quotationDate') }">
                            <has-error :form="form" field="quotationDate"></has-error>
                    </div> -->
                     <label for="shippingCost">Quotation Date</label>
                        <div class="form-group"> 
                            <input v-model="form.quotationDate" type="date" name="quotationDate" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('quotationDate') }">
                            <has-error :form="form" field="quotationDate"></has-error>
                    </div>
                   </div>                  
                   <div class="col-md-6">
                        <label for="delivaryDate">Delivary Date</label>
                       <div class="form-group"> 
                            <input v-model="form.delivaryDate" type="date" name="delivaryDate" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('delivaryDate') }">
                            <has-error :form="form" field="delivaryDate"></has-error>
                    </div>
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6">
                      <label for="shippingCost">Currency</label>
                       <div class="form-group"> 
                            <select name="currency" id="currency" v-model="form.currency" class="form-control" :class="{ 'is-invalid': form.errors.has('currency') }">
                                <option value="" selected> --Select Currency-- </option>
                                <option value="BDT" > BDT </option>
                                <option value="USD" > USD </option>
                                <option value="EURO" > EURO </option>
                                <option value="POUND" > POUND </option>
                                <option value="UAD" > UAD </option>
                            </select>
                            <has-error :form="form" field="currency"></has-error>
                    </div>
                   </div>

                   <div class="col-md-6">
                        <label for="shippingCost">Shipping Cost</label>
                       <div class="form-group"> 
                            <input v-model="form.shippingCost" type="text" name="shippingCost" id="shippingCost"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('shippingCost') }">
                            <has-error :form="form" field="shippingCost"></has-error>
                    </div>
                     
                   </div>
                   <div class="col-md-6">
                          <!-- <label for="shippingCost">Shipping Cost</label>
                       <div class="form-group"> 
                            <input v-model="form.shippingCost" type="text" name="shippingCost" id="shippingCost"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('shippingCost') }">
                            <has-error :form="form" field="shippingCost"></has-error>
                    </div> -->

                   </div>
                   <div class="col-md-6">
                        <!-- <label for="paymentMethod">Payment Methods</label>
                      <div class="form-group"> 
                            <input v-model="form.paymentMethod" type="paymentMethod" name="paymentMethod" placeholder="Enter Payment Method"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('paymentMethod') }">
                            <has-error :form="form" field="paymentMethod"></has-error>
                    </div> -->
                   </div>
               </div>


            <label for="items" class="control-label">Items</label>
            <div class="table-responsive">
                <table class="table table-bordered" id="items">
                    <thead>
                        <tr style="background-color: #f9f9f9;">
                            <th class="text-center" width="5%">Actions</th>
                            <th class="text-left" width="10%">No.</th>
                            <th class="text-left" width="15%">Name</th>
                            <th class="text-left" width="30%">Details</th>
                            <th class="text-center" width="10%">Req. Unit</th>
                            <th class="text-right" width="10%">Unit Price</th>
                            <!-- <th class="text-right" width="15%">Shipping Cost</th> -->
                            <th class="text-right" width="15%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr id="item-row-0" v-for="(item, index) in rowData" :key="item.index">
                            <td class="text-center" style="vertical-align: middle;">
                                <!-- <div class="form-check"> -->
                                    <input @change="disableProductCheck(index)" type="checkbox" class="form-check-input check-input-add" id="exampleCheck1">
                                    <!-- <label class="form-check-label" for="exampleCheck1">Avoid</label> -->
                                <!-- </div> -->
                                <button @click="removeElement(index)" type="button"  data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                           
                            <td>
                                <input class="form-control typeahead" v-model="item.number"  placeholder="No." type="text" id="item-number-0">
                            </td>
                            <td>
                                <input class="form-control typeahead" v-model="item.productName"  placeholder=" Name" type="text" id="item-name-0">
                            </td>
                            <td>
                                <textarea class="form-control" v-model="item.details" name="details" id="details" cols="30" rows="1" ></textarea>
                                <!-- <input  class="form-control text-center" v-model="item.details" name="details" placeholder="Details" type="text" id="item-quantity-0"> -->
                            </td>
                            <td>
                                <input v-show="item.disableProduct" class="form-control text-center" :value="item.storeDisabledProduct" name="reqUnit" type="text" id="item-quantity-0">
                                <input v-show="!item.disableProduct" class="form-control text-center" v-model="item.quantity" name="reqUnit" type="text" id="item-quantity-0">
                            </td>
                            <td>
                                <input  class="form-control text-right" v-model="item.price" name="unitPrice" type="text" id="item-price-0">
                          
                            </td>
                            <!-- hidden  -->
                               
                                <input v-model="$data[latestInvoice.id ? item.invoice_id = latestInvoice.id : '0']" class="form-control text-right"  name="price" type="hidden" id="item-price-0">
                          
                            

                            <!-- <td>
                                <select id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="item.tax" name="tax" tabindex="-1" aria-hidden="true">
                                    <option selected value="">- Select Tax -</option>
                                    <option value="0">Tax Exempt</option>
                                    <option value="5">Normal Tax</option>
                                    <option value="10">Sales Tax</option>
                              </select>
                                <has-error :form="form" field="tax"></has-error> -->
                                    <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 144px;">
                                    <span class="selection"><span class="select2-selection__rendered" id="select2-item-tax-0-container"></span><span class="select2-selection__arrow" 
                                         role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span>
                            </td> --> 
                            <td class="text-right" style="vertical-align: middle;">
                        <span id="item-total-0">{{item.linetotal}}</span>
                            </td>
                             
                        </tr>
                         <tr id="addItem">
                            <td class="text-center"><button @click="addItem" type="button"  data-toggle="tooltip" title="Add" class="btn btn-xs btn-primary" data-original-title="Add"><i class="fa fa-plus"></i></button></td>
                            <td class="text-right" colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="6"><strong>Subtotal</strong></td>
                            <td class="text-right"><span id="sub-total">{{form.subtotal}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="6"><strong>Shipping Cost</strong></td>
                            <td class="text-right"><span id="tax-total">{{form.shippingCost}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="6"><strong>Total</strong></td>
                            <td class="text-right"><span id="grand-total">{{form.total}}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                        <label for="priceInWord">Price In Word</label>
                        <div class="form-group"> 
                                <input v-model="form.priceInWord" type="text" name="priceInWord"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('priceInWord') }">
                                <has-error :form="form" field="priceInWord"></has-error>
                        </div>
                    <label for="notes" class="control-label">Notes</label>
                    <textarea class="form-control" v-model="form.details" placeholder="Enter Notes" rows="3" name="notes" cols="50" id="notes"  :class="{ 'is-invalid': form.errors.has('details') }"></textarea> 
                    <has-error :form="form" field="details"></has-error>
                </div>

            </div>
              <div class="row ">
                  <!-- <h1>Single customer::{{singleCustomer.address}}</h1> -->
                  <!-- <div class="col-md-12 my-4"> -->
                    <!-- <label for="attachment" class="control-label">Attachment</label> -->
                    <!-- <div class="fancy-file"><div class="fake-file"> -->
                    <!-- <button type="button" class="btn btn-default" style="height: 33.3333px;"> -->
                    <!-- <i class="icon-file glyphicon glyphicon-file"></i> Select File</button> -->
                    <!-- </div><input class="form-control" name="attachment" type="file" id="attachment" style="width: 325.333px;"> -->
                    <!-- </div> -->
                     <button type="submit" class="btn btn-success m-4">Save</button>
                  <!-- </div> -->
                </div>
           </div>
          </div>
       </form>
       <!-- <button class="btn btn-danger" @click="calculateTotal()">click</button> -->
    </div>
</template>
<script>
const numWords = require('num-words')
export default {
    data() {
            return {
                //  storeDisabledProduct: '',
                 singleCustomer: [],
                 customers: [],
                 latestInvoice: {},
                 rowData: [],
                //  disableProduct: false, 
                 form: new Form({
                    id: '',
                    customer: '',
                    customerPhone: '',
                    customerEmail: '',
                    shipTo: '',
                    quotationDate: '',
                    // quotationNumber: '',
                    paymentMethod: '',
                    shippingCost: '',
                    subtotal: '',
                    total: '',
                    priceInWord: '',
                    // authorisedBy: '', 
                    delivaryDate: '', 
                    currency: ''
                })
            }
        },
    
    methods: {
            calculateTotal(){
                var total, subtotal, preTotal
               
                    //  ................................................................................................
                subtotal = this.rowData.reduce(function(sum, product){
                    // var linetotal = parseFloat(product.quantity*product.price + ((product.price*product.quantity)/100))
                    var linetotal = parseFloat(product.quantity*product.price)
                    // var linetotal = Math.ceil(product.quantity*product.price)
                       if(!isNaN(linetotal)){
                          product.linetotal = linetotal.toFixed(2)
                        //   return Math.ceil(sum + linetotal)
                          return sum + linetotal
                       }
                    //    return Math.ceil(linetotal)
                       return linetotal
                }, 0)
                if(this.form.shippingCost){
                  let preTotal =  parseFloat(subtotal+this.catculateShipping())
                    total = preTotal.toFixed(2)

                }else{
                    total =  subtotal.toFixed(2)
                }
                    this.form.total = total
                    setTimeout(() => {
                        this.numToWord()
                        // console.log("Number in Word")
                    }, 1000)
                // ---------------------------------------------------------------------------------------------------------------
            },
            calculateSubtotal(){
                var sub_total
                sub_total = this.rowData.reduce(function(sum, product){
                    // var linetotal = Math.ceil(parseFloat(product.quantity*product.price))
                    // if(this.disableProduct == false){}
                    var linetotal = parseFloat(product.quantity*product.price)
                        // console.log(linetotal)
                    // var linetotal = Math.ceil((product.quantity*product.price))
                       if(!isNaN(linetotal)){
                          return sum + linetotal
                       }
                       return  linetotal 
                }, 0)
                this.form.subtotal = sub_total.toFixed(2)
            },
            catculateShipping(){
                // var shipCost = parseFloat(this.form.shippingCost)
                var shipCost = parseFloat(this.form.shippingCost)
                return shipCost;
            },
            addItem(){
                this.rowData.push({
                    number: '',
                    invoice_id: '' ,
                    details: '' ,
                    productName : '',
                    quantity :'',
                    price : '',
                    linetotal : '',
                    storeDisabledProduct: '',
                    disableProduct: false,
                })},
            removeElement: function (index) {
            this.rowData.splice(index, 1);
        },
        submitInvoice(){

            this.form.post('api/invoice')
                 .then(() => {
                       swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                      setTimeout(() => {  this.$router.push("/invoice") }, 2000 )
                 })
                 .catch((error) => {
                     console.log(error)
                 })
            setTimeout(() =>  {this.getLatestInvoice()}, 1000)
            setTimeout(() => {
                 this.rowData.forEach((item) => { 
                 axios.post('api/invoice-product', item)
                    .then(() => {
                      
                    })
                    .catch((error) => { console.log(error)}) 
                })
            }, 2000); 
        },
        getLatestInvoice(){
            axios.get('api/invoice-product')
                 .then(({data}) => {
                      this.latestInvoice = data
                 })
        }
        ,
            loadCustomer(){
                axios.get('api/customer')
                     .then(({data}) => {
                         this.customers = data
                     })
                     .catch((err) => {
                         console.log(err)
                   
                     })
            },
            populateCustomer(){         
                axios.get(`api/single-customer/${this.form.customer}`)
                     .then(({data}) => {
                         this.singleCustomer = data
                         this.fillCustomer()
                     })
                     .catch( err => console.log(err))
            },
            fillCustomer(){
                setTimeout(() => {
                     this.form.shipTo = this.singleCustomer.adderss
                     this.form.customerPhone = this.singleCustomer.phone
                     this.form.customerEmail = this.singleCustomer.email
                     let date = new Date()
                     this.form.quotationDate = date.getFullYear()+"-"+"0"+date.getMonth()+"-"+"0"+date.getDay()
                     this.form.delivaryDate = date.getFullYear()+"-"+"0"+date.getMonth()+"-"+"0"+date.getDay()
                }, 1000)
            },
            numToWord(){
                this.form.priceInWord = numWords(parseInt(this.form.total))          
            },
            disableProductCheck(index){
               this.rowData[index].disableProduct = !this.rowData[index].disableProduct     
               if(this.rowData[index].disableProduct === true){
                   setTimeout(() => {
                       this.rowData[index].storeDisabledProduct = this.rowData[index].quantity
                       this.rowData[index].quantity = 0
                   },500)
               }
               
            },
    },
    filter:{
        capitalize(value){
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }
    ,
    mounted(){
        this.loadCustomer()
    },
    updated(){
        this.calculateTotal()
        this.calculateSubtotal()
    },
}
</script>
<style scoped>
    #basic-addon1{
        max-height: 38px
    }
    .check-input-add{
        margin-left: -5px;
        margin-top: -5px;
        -webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
    }
</style>