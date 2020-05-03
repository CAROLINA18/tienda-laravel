<template>
  <div>
    <section>
        <transition-group
        tag="div"
        :css="false"
        name="fadeIn"
        @before-enter="beforeEnter"
        @enter="enter"
        @leave="leave"

         >
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

        </transition-group>
        <article class = "total card-product">
              <div class="row">
                <div class="col-10">
                    <strong>Total</strong>
                </div>
                <div class="col-2">
                    <strong>{{total}}</strong>
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
           },
            beforeEnter(el){
                el.style.opacity=0;
                el.style.transform="scale(0)";
                el.style.transition="all 0.2s cubic-bezier(0.4,0.0,0.2,1)"
            },
            enter(el){
              const delay = 50 * el.dataset.index;
              setTimeout(()=>{
                el.style.opacity=1;
                el.style.transform="scale(1)";
              },delay)

            },
            leave(el){
                el.style.opacity=0;
                el.style.transform="scale(0)";
            }
       }

    }
</script>
