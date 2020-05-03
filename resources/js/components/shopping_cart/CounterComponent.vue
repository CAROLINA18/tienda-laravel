<template>
<a href="/carrito">Mi carrito {{productsCount}}</a>
</template>
<script>
    export default {
        computed:{
            productsCount(){
                return window.store.state.productsCount;
            }
        }

    }
</script>
