<template>
    <div class="banner-wrapper">
        <div class="banner-video-item" v-if="movie">
            <img class="bg-image" :src="`https://image.tmdb.org/t/p/original/${movie.backdrop_path}`"/>
            <div class="video-control">
                <button @click="playVideo">
                    <span class="fa fa-play"></span>
                </button>
            </div>
            <div class="video-meta">
                <div class="video-meta--thubnail">
                    <img :src="`https://image.tmdb.org/t/p/original/${movie.poster_path}`">
                </div>
                <div class="video-meta--text">
                    <div class="video-meta--title">{{ movie.title }}</div>
                </div>
            </div> 
        </div>
        <app-video-modal v-if="play" @close="closeVideo" :movie="movie" />
    </div>
</template>

<script>

import MovieService from '@/services/MovieService.js'
import AppVideoModal from './AppVideoModal.vue'
export default {
    name: 'BestMovie',
    components: {
        AppVideoModal
    },
    data: function(){
        return {
            movie : false,
            play  : false
        }
    },
    methods: {
        getTheBest: function(){
            MovieService.getTheBest().then(
                (response)=> {
                    if(response.data){
                        this.movie = response.data
                    }
                }
            )
        },
        playVideo: function(){
            this.play = true
        },
        closeVideo: function(){
            this.play = false
        },

    },

    mounted: function(){
        this.getTheBest()
    }
}
</script>

<style scoped>
    .banner-video-item {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #aaa;
        position: relative;
    }
    .bg-image{
        max-height: 50vh;
    }
    .video-control {
        position: absolute;
        z-index: 1;
    }
    .video-meta {
        position: absolute;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: flex-end;
        width: 100%;
        background: rgb(0,0,0);
        background: linear-gradient(0deg, rgba(0,0,0,0.8799894957983193) 0%, rgba(0,0,0,0.5130427170868348) 12%, rgba(130,129,129,0.3393732492997199) 21%, rgba(237,237,237,0.5186449579831933) 35%, rgba(237,237,237,0) 100%);
    }
    .video-control button {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        width: 4rem;
        height: 4rem;
        background: #0000003b;
        border: solid white;
    }

    .video-control span {
        display: block;
        margin-left: 6px;
        color: white;
    }
    .video-meta--title {
        font-family: 'NunitoSans-Bold';
        font-size: 1.3rem;
        color: white;
        margin: 0;
    }
    .video-meta--thubnail img {
        max-width: 10rem;
        max-height: 14rem;
        margin: 10px;
    }
    
    .video-meta--text {
        margin-bottom: 10px;
    }

    .video-meta--desc {
        font-family: 'NunitoSans-Regular';
        color: white;
    }
</style>