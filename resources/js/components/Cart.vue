<template>
    <div class="dropdown d-inline-flex" v-if="$store.state.cart.length > 0">
        <a class="nav-link" href="">
            Carro ({{ $store.state.cartCount }})
        </a>
  <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Items
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a v-for="item in $store.state.cart"
                :key="item.id"
                class="dropdown-item"
                href="">
            <span class="removeBtn"
        title="Remove from cart"
        @click.prevent="removeFromCart(item)">X</span>
        <!--<span class="showBtn"
        title="show cart"
        @click.prevent="showCart()">Z</span>-->
                {{ item.nombreP }} x{{ item.quantity }} - ${{ item.totalPrice }}
            </a>

            <a class="dropdown-item" href="">
                Total: ${{ totalPrice }}
            </a>

            <hr class="navbar-divider">

            <a class="dropdown-item" href="">
                Checkout
            </a>
  </div>
  
    </div>
    <div v-else class="nav-link">
            
                Carro(0)
            
        </div>
        
</template>
<style>
.removeBtn {
    margin-right: 1rem;
    color: red;
}
.showBtn {
    margin-right: 2rem;
    color: blue;
}
</style>
<script>
export default {
computed: {
    totalPrice() {
        let total = 0;

        for (let item of this.$store.state.cart) {
            total += item.totalPrice;
        }

        return total.toFixed(2);
    }
},
methods: {
    removeFromCart(item) {
        this.$store.commit('removeFromCart', item);
    },
    showCart(){
        this.$store.commit('showCart');
    }
}

}
</script>
