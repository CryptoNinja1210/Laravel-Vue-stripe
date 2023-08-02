<template>
    <div>
         <hr>
        <button class="btn btn-warning text-center"
            @click.prevent="addProductToCart()">
            Add To Cart
        </button>
    </div>
</template>

<script>
    export default {
        data(){
            return {

            }
        },
        props:['productId', 'userId'],
        methods:{
            async addProductToCart(){

                // Checking if user logged in.

                if(this.userId == 0){
                    this.$toastr.e('You Need to login, To add this product in Cart');
                    return;
                }

                // If user logged in then add item to cart.

                let response = await axios.post('/cart', {
                    'product_id': this.productId
                });

                console.log(response.data)

                this.$root.$emit('changeInCart', response.data.items)

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
