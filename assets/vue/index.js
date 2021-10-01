import Vue from 'vue'
import App      from '@/view/App.vue'
import AppMixin from '@/mixins/AppMixin';


/** import global style */
import "@/assets/css/index.css"


Vue.mixin(AppMixin)

import Loader from "@/components/Loader.vue"

Vue.component('Loader', Loader)


new Vue({
    template: '<App/>',
    components: { App }   
}).$mount('#app')

Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
        el.event = function (event) {
        if (!(el == event.target || el.contains(event.target) )) {
            vnode.context[binding.expression](event);
        }
        };
        document.body.addEventListener('click', el.event)
    },
    unbind: function (el) {
        document.body.removeEventListener('click', el.event)
    },
});