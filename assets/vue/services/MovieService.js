import axios from 'axios'

const MovieService = {

    getGenreList: function(){
        return axios.get('/api/genders/list')
    },

    getTheBest: function(){
        return axios.get('/api/movies/best')
    },

    getList: function(params){
        return axios.get('/api/movies/list', { params }) 
    },

    getDetail: function(mid){
        return axios.get(`/api/movie/details/${mid}`) 
    },
    
    getVideo: function(mid){
        return axios.get(`/api/movies/videos/${mid}`) 
    }
}

export default MovieService