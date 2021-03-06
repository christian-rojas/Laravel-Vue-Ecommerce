let cart = window.localStorage.getItem('cart');
    let cartCount = window.localStorage.getItem('cartCount');

let store = {
    
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
    },

    mutations: {
        addToCart(state, item) {
    let found = state.cart.find(product => product.id == item.id);

    if (found) {
        found.quantity ++;
        found.totalPrice = found.quantity * found.precio;
    } else {
        state.cart.push(item);

        Vue.set(item, 'quantity', 1);
        Vue.set(item, 'totalPrice', item.precio);
    }

    state.cartCount++;
    this.commit('saveCart');
},//addtocart
removeFromCart(state, item) {
    let index = state.cart.indexOf(item);

    if (index > -1) {
        let product = state.cart[index];
        state.cartCount -= product.quantity;

        state.cart.splice(index, 1);
    }
    this.commit('saveCart');
},
saveCart(state) {
    window.localStorage.setItem('cart', JSON.stringify(state.cart));
    window.localStorage.setItem('cartCount', state.cartCount);
},
showCart(state){
let data = {cart: JSON.stringify(this.state.cart)};
console.log(data);
//this.commit('showCart');
}

    }//mutations

};//let store


export default store;
