<template>
  <div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5> Edit product- {{productForm.title}}</h5>
                        <router-link :to="{name:'product-list'}" class="btn btn-primary">Products</router-link>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <form @submit.prevent="updateProduct" @keydown="productForm.onKeydown($event)">

                                  <AlertError :form="productForm" />

                                    <div class="form-group">
                                        <label for="">Product Title</label>
                                        <input type="text" v-model="productForm.title" name="title" class="form-control" placeholder="product title">
                                        <HasError :form="productForm" field="title" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Product Category</label>
                                        <select name="category_id" class="form-control" v-model="productForm.category_id" :class="{ 'is-invalid': productForm.errors.has('category_id') }">
                                            <option style="display:none;" value="" selected>Select Category</option>
                                            <option :value="category.id" v-for="category in categories" :key="category.id">
                                            {{category.name}}</option>
                                        </select>
                                        <has-error :form="productForm" field="category_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Product Color</label>
                                        <select name="color_id" class="form-control" v-model="productForm.color_id" :class="{ 'is-invalid': productForm.errors.has('color_id') }">
                                            <option style="display:none;" value="" selected>Select Color</option>
                                            <option :value="color.id" v-for="color in colors" :key="color.id"> {{
                                                color.name }}</option>
                                        </select>
                                        <has-error :form="productForm" field="color_id"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label for="">Variant</label>
                                        <input type="checkbox" value="S" v-model="productForm.sizes"> S
                                        <input type="checkbox" value="L" v-model="productForm.sizes"> L
                                        <input type="checkbox" value="XL" v-model="productForm.sizes"> XL
                                        <input type="checkbox" value="XXL" v-model="productForm.sizes"> XXL
                                        <input type="checkbox" value="XXXL" v-model="productForm.sizes"> XXXL
                                        <input type="checkbox" value="46" v-model="productForm.sizes"> 46
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product price</label>
                                        <input type="text" v-model="productForm.price" name="price" class="form-control" placeholder="product price">
                                        <HasError :form="productForm" field="price" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product Description</label>
                                        <textarea type="text" v-model="productForm.description" name="description" class="form-control" placeholder="product description"></textarea>
                                        <HasError :form="productForm" field="description" />
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Product Image</label>
                                                <input type="file" class="form-control-file"  @change="onImageChange" >
                                                <has-error :form="productForm" field="image"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div style="width: 100%; max-height: 150px; overflow:hidden">
                                                <img :src="image" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                   <div id="preview">
                                    <ul>
                                        <div class="row" v-if="productForm.sizes.length>0">
                                            <div class="col-md-3 text-right">
                                                <h4>size:</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>input:</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>quantity:</h4>
                                            </div>
                                        </div>
                                        <li v-for="(size, index) in productForm.sizes" class="mb-2" :key="index">
                                        <div class="row">
                                            <div class="col-md-3 text-right">
                                                {{size}}:
                                            </div>
                                            <div class="col-md-6">
                                        <input type="number" v-model="productForm.quantity[index]" class="w-100" placeholder="Add Quantity">
                                            </div>
                                            <div class="col-md-3">
                                                {{productForm.quantity[index]}}
                                            </div>
                                        </div>


                                        </li>
                                    </ul>
        <!-- <button class="btn btn-primary" @click="addElement">
            New Element
  </button> -->
    </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform';
import { Button, HasError, AlertError, AlertSuccess } from 'vform/src/components/bootstrap5'
import { objectToFormData } from 'object-to-formdata'

export default {
    components: {
    Button, HasError, AlertError
  },
    data(){
        return{
            productForm: new Form({
            title: '',
            price: '',
            image: '',
            description: '',
            sizes:[],
            quantity:[],
            category_id:'',
            color_id:'',
            _method: 'put',
        }),
        image:'',
        categories: [],
        colors:[]
        }
    },
    methods:{
        loadProduct(){
            let id = this.$route.params.id;

            axios.get(`/api/product/${id}/edit`).then(response => {
                let product = response.data;

                // console.log(product);
                this.productForm.title = product.title;
                this.productForm.description = product.description;
                this.productForm.category_id = product.category_id;
                this.productForm.color_id = product.color_id;
                this.productForm.price = product.price;
                this.image = product.image;
                    this.productForm.sizes = [];
                // this.productForm.title = response.data.title;
                // this.productForm.title = response.data.title;

            });
        },
     updateProduct(){
        let id = this.$route.params.id;
            this.productForm.post('/api/product/'+id, {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            }).then(({ data }) => {

                this.image = data.image;
                this.$toast.success({
                title:'Success!',
                message:'Product saved successfully.'
                });
            })
        },



     onImageChange(e) {
            const file = e.target.files[0]
            // Do some client side validation...
            this.productForm.image = file
        },
        loadCategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        loadColors(){
            axios.get('/api/color').then(response => {
                this.colors = response.data;
            });
        }
    },
    mounted(){
        this.loadProduct();
        this.loadCategories();
        this.loadColors();
    }
}
</script>

<style>

</style>
