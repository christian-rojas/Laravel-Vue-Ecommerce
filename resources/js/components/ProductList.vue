<template>
    <div class="container">
        <div class="row">
    <div class="col-lg-3 col-sm-6 py-3" v-for="item in productos" :key="item.id">

                            <!-- card -->
                            <div class="card card-outline-info h-100">
                                <div class="card-img-top">
                                    <img src="https://placeimg.com/500/300/nature" class="grayscale img-fluid mx-auto d-block" alt="card image 3">
                                </div>
                                <div class="card-block d-flex flex-column">
                                    <p class="text-justify" v-text="item.nombreP"></p>
                                    <p class="text-justify" v-text="item.precio"></p>
                                    <a href="#" @click="addToCart(item)" class="btn btn-outline-info btn-lg btn-block text-truncate mt-auto">Agregar</a>
                                </div>
                            </div>
                            <!-- card -->

                        </div>
                    </div>
                </div>
    <!--
    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </thead>

        <tbody>
            <tr v-for="item in items" :key="item.id">
                <td v-text="item.title"></td>

                <td>${{ item.price.toFixed(2) }}</td>

                <td>
    <button class="button is-success"
        @click="addToCart(item)">Add to Cart</button>
</td>
            </tr>
        </tbody>
    </table>-->
</template>
<script>
    
export default {
    
    /*data() {
        return {
            items: [
                {
                    id: 1,
                    title: 'Children of Bodom - Hatebreeder',
                    price: 9.99
                },
                {
                    id: 2,
                    title: 'Emperor - Anthems to the Welkin at Dusk',
                    price: 6.66
                },
                {
                    id: 3,
                    title: 'Epica - The Quantum Enigma',
                    price: 15.99
                },
                {
                    id: 4,
                    title: 'Chthonic - Takasago Army',
                    price: 14.00
                },
                {
                    id: 5,
                    title: 'Silencer - Death - Pierce Me',
                    price: 1.20
                },
                {
                    id: 6,
                    title: 'My Dying Bride - 34.788%... Complete',
                    price: 10.00
                },
                {
                    id: 7,
                    title: 'Shape of Despair - Shades of',
                    price: 7.80
                },
                {
                    id: 8,
                    title: 'Ne Obliviscaris - Portal of I',
                    price: 11.30
                },
                {
                    id: 9,
                    title: 'Protest the Hero - Fortress',
                    price: 5.55
                },
                {
                    id: 10,
                    title: 'Dark Lunacy - Devoid',
                    price: 6.00
                },
            ]
        };
    },*/data() {
    return {
        productos: [],
        result: [],
        buscar: [],
        tallas: [],
        
        
      
      //modoEditar: false,
      //nota: {nombre_producto: '', descripcion: '', categoria: '', precio: ''}
    }
    },
  created(){
    var currentUrl = window.location.pathname;
    console.log('currentUrl: '+currentUrl);
    this.result = currentUrl.split("/");
    console.log('b: '+this.result[2]);
    this.buscar = this.result[2];
    
    axios.get('../products').then(res=>{ this.productos = res.data; });
    
    //this.productos = arreglo.filter(obj => obj.categoria==='daniel-arzola');
    //console.log('productos: '+this.productos);
    //console.log('arreglo: '+this.arreglo);
    //axios.get('/product').then(res=>{ this.productos = res.data; }),
    //passedPram = 'daniel-arzola',
    //productos.push(data.filter(obj => obj.categoria === passedPram))
    },
    methods: {
    addToCart(item) {
        this.$store.commit('addToCart', item);
    }
    }

}
</script>