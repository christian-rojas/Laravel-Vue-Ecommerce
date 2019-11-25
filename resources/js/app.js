require('./bootstrap');
import store from './store.js';

window.Vue = require('vue');

Vue.component('products-list', require('./components/ProductList.vue').default);
Vue.component('cart-dropdown', require('./components/Cart.vue').default);
/*const app = new Vue({
    el: '#app'
});*/
new Vue({
    el: '#mostrar',
    store: new Vuex.Store(store)
});
new Vue({
    el: '#app',
    store: new Vuex.Store(store)
});

