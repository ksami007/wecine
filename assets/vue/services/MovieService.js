import axios        from 'axios'
import AuthService  from '@/services/AuthService'
const token = AuthService.getToken()

const MovieService = {

    getGenreList: function(){
        return axios.get('/api/genders/list', {
            headers: {
                'Authorization': `Bearer ${token}` 
            }
        })
    },

    getTheBest: function(){
        return axios.get('/api/movies/best', 
        {
            headers: {
                'Authorization': `Bearer ${token}` 
            }
        })
    },

    getList: function(params){
        return axios.get('/api/movies/list', { 
            params : params,
            headers: {
                'Authorization': `Bearer ${token}` 
            }
         }) 
    },

    getDetail: function(mid){
        return axios.get(`/api/movie/details/${mid}`, 
        {
            headers: {
                'Authorization': `Bearer ${token}` 
            }
        }) 
    },
    
    getVideo: function(mid){
        return axios.get(`/api/movies/videos/${mid}`, 
        {
            headers: {
                'Authorization': `Bearer ${token}` 
            }
        }) 
    }
}

export default MovieService