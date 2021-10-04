<template>
    <div class="video-wrapper">
        <div class="thumbnails--container">
            <img :src="`https://image.tmdb.org/t/p/original/${movie.poster_path}`" />
        </div>
        <div class="video-content--container">
            <div class="video-header">
                <div class="video-header--title">
                    {{ movie.title }}
                </div>
                <div class="video-header--rate">
                    <movie-rate :movie="movie"/>
                    <div class="video-rate--text">
                       ({{ movie.vote_count }} votes)
                    </div>
                </div>
            </div>
            <div class="video-description">
                <div class="description-meta">
                    <span class="meta-date">{{ movie.release_date }}</span>
                    <span class="mata-org" v-if="productor">- {{ productor.name }}</span>
                    <span class="mata-org-blur" v-else>- productor name </span>
                </div>
                <div class="description-text">
                    {{ movie.overview | truncate(200)}}
                </div>
            </div>
            <div class="video-controls">
                <button class="show-more--btn" @click="openDetailModal">Lire le details</button>
            </div>
        </div>
        <app-video-modal v-if="showDetails" @close="closeDetailModal" :movie="movie" />
    </div>
</template>

<script>
import AppVideoModal from './AppVideoModal.vue'
import MovieRate     from './MovieRate.vue'
import MovieService  from "@/services/MovieService.js"
export default {
    name: 'Movie',
    components: { AppVideoModal, MovieRate },
    props: {
        movie: {
            require: true
        }
    },
    data: function(){
        return {
            showDetails: false,
            details    : false,
            modalOpenning: false

        }
    },
    computed: {
        productor: function(){
            if(this.details && this.details.production_companies){
                return this.details.production_companies[0]
            }
            return false
        }
    },
    methods:{
        openDetailModal: function(){
            this.showDetails = true
            
        },
        closeDetailModal: function(){
            this.showDetails    = false
        },
        getDetail: function(){
            return false
            MovieService.getDetail(this.movie.id).then(
                (response) => {
                    if(response.data){
                        this.details = response.data
                    }
                }
            )
        }
    },
    watch: {
       
    },
    mounted: function(){
        this.getDetail()
    }
}
</script>

<style scoped>
    .video-wrapper {
    display: flex;
}

.thumbnails--container {
    display: flex;
    background: #aaa;
}
.thumbnails--container img {
    max-height: 10rem;
}

.video-content--container {
    padding-left: 1.5rem;
    width: 100%
}

.video-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.video-header--rate {
    display: flex;
    align-items: flex-end;
}

.video-controls {
    text-align: right;
    padding-top: 15px;
}

button.show-more--btn {
    background: #317be2;
    color: white;
    border: none;
    padding: 6px 15px;
    border-radius: 15px;
    font-family: 'NunitoSans-SemiBold';
}


.video-header--title {
    color: #666;
    font-family: 'NunitoSans-SemiBold';
    font-size: 1.5rem;
    margin-right: 1rem;
}
.video-rate--text {
    font-size: 14px;
    margin: -1px 10px;
    font-family: 'NunitoSans-Regular';
    color: #666;
}
.video-description .meta-date {
    font-family: 'NunitoSans-SemiBold';
    color: #666;
}
.video-description .mata-org {
    font-family: 'NunitoSans-Regular';
    font-size: 13px;
    color: #317be2;
}
.video-description .mata-org-blur {
    font-family: 'NunitoSans-Regular';
    font-size: 13px;
    color: #666;
    filter: blur(2px);
}

.description-text {
    color: #666;
    font-family: 'NunitoSans-Regular';
    font-size: 14px;
}

@media (max-width:1200px) {
   .video-header--title {
     font-size: 1.2rem;  
   } 

   .video-description .meta-date{
       font-size: 14px;
    }
    
}

</style>