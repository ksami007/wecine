<template>
    <div class="app-body">
        <div class="container">
            <div class="app-header-container">
                <app-header @selected="selectedMovie"/>
            </div>
            <div class="app-banner-container">
                <best-movie />
            </div>

            <div class="movie-row">
                <div class="col col-list-filter">
                    <list-filter @change="filterChange"/>
                </div>
                <div class="col list-loader" v-if="fetching">
                    <loader />
                </div>
                <div class="col" v-else>
                    <div class="video-list-container" v-if="movies">
                        <div class="video-item--wrapper" v-for="movie, index in movies" :key="'movie-item-'+index">
                            <movie :movie="movie" />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
import AppHeader    from "@/components/AppHeader.vue"
import BestMovie    from "@/components/BestMovie.vue"
import ListFilter   from '@/components/ListFilter.vue'
import Movie        from '@/components/Movie.vue'
import MovieService from "@/services/MovieService.js"

export default {
    name: 'App',

    components: {
        ListFilter,
        AppHeader,
        BestMovie,
        Movie
    },

    data: function(){
        return {
            movies : false,
            params : [],
            fetching : true
        }
    },

    methods: {
        getMovies: function(params = []){
            this.fetching = true
            MovieService.getList(params).then(
                (response)=>{
                    if(response.data.results){
                        this.movies = response.data.results
                    }
                    this.fetching = false
                }
            )
        },
        filterChange: function(genres){
            this.getMovies({
                   with_genres : genres.toString()
                }
            )
        },
        selectedMovie: function(item){
            this.movies = [item]
        }
    },

    mounted: function(){
        this.getMovies()
    }

}
</script>

<style scoped>
    .movie-row{
        display: flex;
    }
    .app-banner-container {
        padding-bottom: 4rem;
    }
    .col-list-filter {
        min-width: 14rem;
    }
    .video-list-container {
        margin-left: 2rem;
    }
    .video-item--wrapper {
        margin-bottom: 2rem;
    }

    .col.list-loader {
        display: flex;
        justify-content: center;
        width: 100%;
    }
    @media (max-width:991px) {
        .list-filter--wrapper{
            display: flex;
            justify-content: space-between;
            padding: 1rem 1rem 0 1rem;
        }
        .movie-row{
            flex-direction: column;
        } 
        .video-list-container{
            margin-top: 2rem;
            margin-left: unset;
        }
    }
</style>