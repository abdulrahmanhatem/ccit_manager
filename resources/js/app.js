/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('chat-messages', require('./components/ChatMessages.vue').default);

Vue.component('chat-form', require('./components/ChatForm.vue').default);

const app = new Vue({
    el: '#chat_modal',

    data: {
        base_url: base_url
    },

    created() {
        // this.fetchMessages();
    },

    methods: {
        // fetchMessages() {
        //     axios.get('/messages').then(response => {
        //         this.messages = response.data;
        //     });
        // },

        // addMessage(message) {
        //     this.messages.push(message);

        //     axios.post('/messages', message).then(response => {
        //       console.log(response.data);
        //     });
        // }
    }
});

