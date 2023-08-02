<template>
    <div class="container" style="margin-top:10rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Products</h5>
                        <!-- <router-link :to="{name:'create-product'}" class="btn btn-primary">Create product</router-link> -->
                    </div>


                    <div class="card-body">
                       <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>color</th>
                                <!-- <th>size</th> -->
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td>  <img :src=" product.image" style="width:120px;height:50px" class="img-fluid" alt=""></td>
                                <td>{{product.title}}</td>
                                <td>{{product.category.name}}</td>
                                <td>{{product.color.name}}</td>
                                <!-- <td>{{product.sizes}}</td> -->
                                <td>{{product.price}}</td>
                                <td>{{product.description}}</td>



                                <td>
                                    <router-link :to="{name: 'edit-product', params: {id: product.id}}" class="btn btn-primary btn-sm">Edit</router-link>
                                    <a @click="deleteProduct(product)" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                products:[]
            }
        },
            methods:{
                loadProducts(){
                axios.get('/api/product').then(response => {
                    this.products = response.data;
                });

            },
            deleteProduct(product) {
            axios.delete(`/api/product/${product.id}`).then(response => {
                this.$toast.success({
                title:'Success',
                message:'Product Deleted Successfully'
            })
            });
            let index = this.products.indexOf(product);
            this.products.splice(index,1);
        }

        },
        mounted() {
        this.loadProducts();
        }
    }
</script>
