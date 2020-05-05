<template>
  <div>
    <section>

            <article class="" :key="product.id" class="card-product" :data-index="index" v-for="(product,index) in products">
              <div class="row">
                <div class="col-10">
                    <strong>{{product.title}}</strong>
                </div>
                <div class="col-2">
                    <strong>{{product.humanPrice}}</strong>

                </div>
              </div>
            </article>

        <article class = "total card-product">
              <div class="row">
                <div class="col-10">

                </div>
                <div class="col-2">

                </div>
              </div>
        </article>
    </section>
  </div>
</template>
<script>
    export default {
       data(){
           return{
               endpoint:'/carrito/productos',
               products:[]
           }
       },
       created(){
         this.fetchProducts();
       },
       computed:{
            total(){

               let cents = this.products.reduce((acumulator,currentObj)=>{

                  return acumulator + currentObj.numberPrice
               },0);
             return `$${cents/100} `;
           }
       },
       methods:{
           fetchProducts(){
               axios.get(this.endpoint).then(response=>{
                   console.log(response);
                   this.products = response.data.data;
               })
           }
       }

    }
</script>
