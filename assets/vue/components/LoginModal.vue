<template>
    <div class="modal app-video-modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" @click="$emit('close')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <div class="form-group">
                        <label>Login *</label>
                        <input type="text" v-model="user.username" id="user-name">
                    </div>
                    <div class="form-group">
                        <label>Mot de passe *</label>
                        <input type="password" v-model="user.password" id="user-password">
                    </div>
                    <div class="form-group text-center">
                        <button class="submit-btn" @click="login">Me connecter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  components: {  },
    name: 'LoginModal',
    data: function(){
        return {
            user: {
                username     : 'wecine',
                password : 'wecine'
            }
        }
    },
    methods: {
        login: function(){
            let isValid = this.checkForm()
            
            if(!isValid){
                return 
            }

            this.$store.dispatch("user/login", this.user).then((response) => {
                if(response.token){
                    console.log('token', response.token)
                }
                //let token = response.data.toketoken
            })

        },

        checkForm: function(){
            document.querySelectorAll('input').forEach(input => {
                input.classList.remove('invalid')
            })

            if(this.user.username.length < 3){
                this.invalidInput('user-name')
                return false
            }

            if(this.user.password.length < 3){
                this.invalidInput('user-password')
                return false
            }
            return true
        },

        invalidInput: function(selector){
            let input = document.getElementById(selector)
            input.classList.add('invalid')
        },

        

    },
    computed: {
        
    },
    mounted: function(){
        
    }
}
</script>

<style scoped>
    /* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgb(76 76 76 / 92%);
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  margin-top: 10%;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  position: relative;
  max-width: 40rem;
}

/* The Close Button */
.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    right: -12px;
    top: -12px;
    width: 20px;
    height: 20px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    padding: 3px;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.login-form {
    max-width: 30rem;
    margin: auto;
    font-family: 'NunitoSans-Regular';
    margin-top: 2rem;
    margin-bottom: 2rem;
}
.form-group {
    margin-top: 15px;
}
.form-group input,
.form-group input:focus-visible,
.form-group input:focus
{
    width: 100%;
    margin-bottom: 10px;
    margin-top: 10px;
    padding: 1rem;
    border: solid 1px #6666;
    border-radius: 4px;
    outline: unset;
}

.form-group input.invalid{
    border-color: rgb(207, 68, 68);
}

.form-group button{
    padding: 1rem 2rem;
    color: #317be2;
    font-family: 'NunitoSans-SemiBold';
    font-size: 1rem;
    border: solid 1px #317be2;
}

</style>