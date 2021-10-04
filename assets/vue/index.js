import Vue            from 'vue'
import App            from '@/view/App.vue'
import AppMixin       from '@/mixins/AppMixin';
import Loader         from "@/components/Loader.vue"
import VueTruncate    from 'vue-truncate-filter'
import store          from "@/store"

/** import global style */
import "@/assets/css/index.css"


Vue.mixin(AppMixin)

Vue.component('Loader', Loader)

Vue.use(VueTruncate)


new Vue({
    template   : '<App/>',
    components : { App },
    store
}).$mount('#app')

/*
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
*/