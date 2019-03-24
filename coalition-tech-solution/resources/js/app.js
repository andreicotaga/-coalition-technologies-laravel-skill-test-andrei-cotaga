
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css'

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).one("click", ".add-product", function () {

    $('form').submit(function(event)
    {
        event.preventDefault();

        let name = $('#product-name').val(),
            qty = $('#product-quantity').val(),
            price = $('#product-price').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $.ajax({
            url: '/product/addProduct',
            type: 'POST',
            data: {
                "name" : name,
                "quantity" : qty,
                "price" : price,
            },
            success: function(data) {
                $('#product-json').html(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

});

const app = new Vue({
    el: '#app'
});
