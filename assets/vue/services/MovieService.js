import Faker from './Faker'
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

    getVideo: function(mid){
        return axios.get(`/api/movies/videos/${mid}`) 
    },

    getSuggestion: function(q){
        return Faker.getFakeSuggestion(q)
    },

    findByGenres: function(genres){
        return Faker.getVideoByGenres(genres)
    },
    
    getAllVideos: function(){
        return Faker.getAllVideos()
    },


}

export default MovieService