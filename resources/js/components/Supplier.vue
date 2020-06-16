<template>
    <div class="container">
        <div class="card" style="width:300px">
            <div class="card-body">
                    <autocomplete
                           :source="myArray"
                           input-class="form-control"
                           placeholder="Search Distribution Groups"
                           v-model="selectedItemsId"
                           @selected="selectNameOrId"
                           >
                    </autocomplete>
            </div>
        </div>
    </div>
</template>
<script>
import Autocomplete from 'vuejs-auto-complete'
export default {
    data(){
        return {
            selectedItemsId: 1,
            myArray: [
                { id:1, name:'Shahin' },
                { id:2, name:'Babu' },
                { id:3, name:'Nishat' },
                { id:4, name:'Bonna' },
                { id:7, name:'Konna' },
                { id:11, name:'Lovely' },
            ],
            form: new Form({
                name: ''
            })
        }
    },
    methods: {
        selectNameOrId(){
            setTimeout(() => {
                let name_id =  this.selectedItemsId
                console.log(name_id)
                let val = this.myArray.forEach((item) => {
                     if(name_id == item.id){
                        this.form.name = item.name
                        setTimeout(() => {
                            this.form.name = item.name
                        }, 500)
                        console.log(item.name)
                     }
                })
            },500)
        }
    },
      components: {
        Autocomplete,
      },
      updated(){
        //   this.selectNameOrId()
      }
}
</script>