import Faker from './Faker'

const VideoService = {
    getSuggestion: function(q){
        return Faker.getFakeSuggestion(q)
    },

    findByGenres: function(genres){
        return Faker.getVideoByGenres(genres)
    },
    
    getAllVideos: function(){
        return Faker.getAllVideos()
    }
}

export default VideoService