import Vue from 'vue'
import App from '@/view/App.vue'


/** import global style */
import "@/assets/css/index.css"


new Vue({
    template: '<App/>',
    components: { App },
}).$mount('#app')