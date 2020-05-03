<template>
<button @click="addToCart" class="btn btn-primary">{{message}}</button>
</template>
<script>
    export default {
        data(){
            return{ message:'Procesar Pago',
            endpoint:'https://secure.placetopay.com/redirection/api/session/'
        }},


        props:{product:{type:Object}},
        methods:{
            addToCart(){
                let post = {
                       login: '6dd490faf9cb87a9862245da41170ff2',
                       tranKey: '024h1IlD'

                };
                axios.post("https://secure.placetopay.com/redirection/api/session/", post).then((result) => {

                    console.log(result);
                });
            }
        }

    }
</script>
