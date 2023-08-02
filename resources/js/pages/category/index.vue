<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>  categories</h5>
                        <!-- <router-link :to="{name:'create-category'}" class="btn btn-primary">Create Category</router-link> -->
                    </div>


                    <div class="card-body">
                       <table class="table">
                        <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td>{{category.id}}</td>
                                <td>{{category.name}}</td>
                                <td>{{category.slug}}</td>
                                <!-- <td>
                                    <router-link :to="{name: 'edit-category', params: {id: category.id}}" class="btn btn-primary btn-sm">Edit</router-link>
                                    <a @click="deleteCategory(category)" class="btn btn-danger btn-sm">Delete</a>
                                </td> -->
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
                categories:[]
            }
        },
           methods:{
                loadCategories(){
                axios.get('/api/category').then(response => {
                    this.categories = response.data;
                });

            },
            

        },
        mounted() {
        this.loadCategories();
        }
    }
</script>
<style scoped>
.container{
    margin-top:10rem;
}
</style>
