<template>
    <div>
        <div class="tile">
            <h3 class="tile-title">Attributes</h3>
            <hr>
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent">Select an Attribute <span class="m-l-5 text-danger"> *</span></label>
                            <select id=parent class="form-control custom-select mt-15" v-model="attribute" @change="selectAttribute(attribute)">
                                <option :value="attribute" v-for="attribute in attributes"> {{ attribute.name }} </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Product Attributes</h3>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th>Value</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pa in productAttributes">
                            <td style="width: 25%" class="text-center">{{ pa.value}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.quantity}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.price}}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-danger" @click="deleteProductAttribute(pa)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'product-attributes',
    props : ['productid'],
    data(){
        return {
            productAttributes: [],
            attributes: [],
            attribute: {},
            attributeSelected: false,
            attributeValues: [],
            value: {},
            valueSelected: false,
            currentAttributeId: '',
            currentValue: '',
            currentQty: '',
            currentPrice: '',
        }
    },
    created: function(){
        this.loadProductAttributes(this.productid);
        this.loadAttributes();
    },
    methods: {
        loadProductAttributes(id){
            let _this = this;
            axios.post('/admin/products/attributes',{
                id: id
            }).then(res =>{
                _this.productAttributes = res.data;
            }).catch(err =>{
                console.log(err);
            })
        },
        loadAttributes(){
            let _this = this;
            axios.get('/admin/products/attributes/load').then(res=>{
                _this.attributes = res.data;
            }).catch(err=>{
                console.log(err);
            })
        },
        selectAttribute(attribute){
            let _this = this;
            this.currentAttributeId = attribute.id;
            axios.post('/admin/products/attributes/values',{
                id: attribute.id
            }).then(res=>{
                _this.attributeValues = res.data;
            }).catch(err=>{
                console.log(err)
            })
            this.attributeSelected = true;
        },
        selectedValues(value){
            this.valueSelected = true;
            this.currentValue = value.value;
            this.currentQty = value.quantity;
            this.currentPrice = value.price;
        }, 
        addProductAttribute(){
            if(this.currentQty === null || this.currentPrice === null)
            {
                this.$swal('Error, some values are missing',{
                    icon :'error'
                })
            }else{
                let _this = this;
                let data = {
                    attribute_id : this.currentAttributeId,
                    value : this.currentValue,
                    quantity : this.currentQty,
                    price : this.currentPrice,
                    product_id : this.productid
                }
                axios.post('/admin/products/attributes/add',{
                    data: data
                }).then(res=>{
                    _this.$swal('Success!',{
                        icon : "success"
                    })
                    _this.currentValue = '';
                    _this.currentPrice = '';
                    _this.currentPrice = '';
                    _this.valueSelected = false;
                }).catch(err=>{
                    console.log(err)
                })
                this.loadProductAttributes(this.productid);
            }
        },
        deleteProductAttribute(pa){
            let _this = this;  
            this.$swal({
                title : "Are you sure?",
                text : "Once deleted,  you will not be able to recover this data!",
                icon : "warning",
                buttons : true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    console.log(pa.id);
                    axios.post('/admin/products/attributes/delete',{
                        id: pa.id
                    }).then(res=>{
                        if(res.data.status === 'success'){
                            _this.$swal("Success! Product attribute has  been deleted!",{
                                icon : "success"
                            })
                            this.loadProductAttributes(this.productid)
                        }else{
                            _this.$swal("Your Product attribute not deleted!");
                        }
                    }).catch(err=>{
                        console.log(err)
                    })
                }else{
                    this.$swal("Action cancelled");
                }
            })
        }
    }
}
</script>