/** click outside directive */
import ClickOutside from 'vue-click-outside'

const AppMixin = {
    directives: {
        ClickOutside
    },
    computed: {
        currentUser : function(){ return this.$store.state.user },
    },
}

export default AppMixin