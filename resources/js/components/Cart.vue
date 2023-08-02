<template>
    <span>
       <li class="nav-item">
            <a class="btn btn-warning" data-scroll-nav="0" href="/checkout">Cart {{itemCount}}</a>
             <!-- <router-link class="nav-link" :to="{name:'cart'}">cart {{itemCount}}</router-link> -->
       </li>
       

    </span>
</template>

<script>
    export default {
        data(){
            return {
                itemCount:""

            }
        },
        // props:['productId', 'userId'],
        methods:{
            async getCartItemsOnPageLoad(){
                let response = await axios.post('/cart');
                this.itemCount = response.data.items
            }
        },
        mounted() {
            this.$root.$on('changeInCart',(item)=>{
                this.itemCount= item

            })
        },
        created(){
           this.getCartItemsOnPageLoad();
        }
    }
</script>
