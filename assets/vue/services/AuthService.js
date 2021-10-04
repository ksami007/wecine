import axios from 'axios'

const AuthService = {

  login: function(data) {
    return axios.post('/api/login_check', data).then(response => {
        if (response.data.token) {
          localStorage.setItem('wecine-user-token', response.data.token);
        }
        return response;
      }).catch(error => {
        
      })
  },

  logout: function() {
    return axios.get(Api.common.logout).then(response => {
        localStorage.removeItem('wecine-user-token');
        document.location.href = "/"
    })
  },
  
  getToken: function(){
      return  localStorage.getItem('wecine-user-token')
  }

}

export default AuthService