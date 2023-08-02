<template>
  <div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5> Create categories</h5>
                        <!-- <router-link :to="{name:'category-list'}" class="btn btn-primary">Categories</router-link> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <form @submit.prevent="createCategory" @keydown="categoryForm.onKeydown($event)">
                                  <AlertError :form="categoryForm" />

                                    <div class="form-group">
                                        <label for="">Category name</label>
                                        <input type="text" v-model="categoryForm.name" name="name" class="form-control" placeholder="category name">
                                        <HasError :form="categoryForm" field="name" />
                                <!-- <AlertSuccess :form="form" message="Your changes have been saved!" /> -->

                                        <!-- <has-error :form="categoryForm" field="name"></has-error> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Create Category</button>
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

export default {
     components: {
    Button, HasError, AlertError
  },
    data(){
        return{
            categoryForm: new Form({
            name: '',
        }),
        }
    },
    methods:{
      createCategory(){
            const response = this.categoryForm.post('/api/category').then(({data})=>{
            this.categoryForm.name="";
            this.$toast.success({
            title:'Success',
            message:'Category Created Successfully'
            })
        });

        }
    }

}
</script>

<style>

</style>
