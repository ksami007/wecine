<template>
    <div class="app-body">
        <div class="container">
            <div class="app-header-container">
                <app-header @selected="selectedMovie"/>
            </div>
            <template v-if="auth">
                <div class="app-banner-container">
                    <best-movie />
                </div>

                <div class="movie-row" id="movie-row">
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
                            <div class="paginator-wrapper" v-if="needPaginator">
                                <button @click="prev">Precedent</button>
                                <button @click="next">Suivant</button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <login-modal />
            </template>
            
        </div>
    </div>
</template>

<script>
import AppHeader      from "@/components/AppHeader.vue"
import BestMovie      from "@/components/BestMovie.vue"
import ListFilter     from '@/components/ListFilter.vue'
import Movie          from '@/components/Movie.vue'
import MovieService   from "@/services/MovieService.js"
import LoginModal     from '@/components/LoginModal.vue'

export default {
    name: 'App',

    components: {
        ListFilter,
        AppHeader,
        BestMovie,
        Movie,
        LoginModal
    },

    data: function(){
        return {
            movies : false,
            params : {},
            fetching : true,
            page      : 1
        }
    },
    computed: {
        needPaginator: function(){
            return this.movies.length == 20
        },
        auth: function(){
            return this.currentUser.loggedIn
        }
    },
    methods: {
        getMovies: function(){
            this.fetching = true
            MovieService.getList(this.params).then(
                (response)=>{
                    if(response.data.results){
                        this.movies = response.data.results
                    }
                    this.fetching = false
                    this.goToList()
                }
            )
        },
        filterChange: function(genres){
            this.params = {
                with_genres : genres.toString()
            }
            
        },
        selectedMovie: function(item){
            this.movies = [item]
        },

        next: function(){
            if(this.movies.length < 20){
                return 
            }
            this.page ++
        },
        prev: function(){
            if(this.page == 1){
                return 
            }
            this.page --
        },
        goToList: function(){
            window.scrollTo(0,0)
        }
    },

    watch: {
        params: {
            deep: true,
            handler: function(){
                this.getMovies()
            }
        },
        page : {
            handler: function(val){
                this.params.page = val 
                this.getMovies()
            }
        }
    },

    mounted: function(){
        if(this.auth){
            this.getMovies()
        }
    }

}
</script>

<style scoped>
    .movie-row{
        display: flex;
        position: relative;
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
        .movie-row{
            flex-direction: column;
        } 
        .video-list-container{
            margin-top: 2rem;
            margin-left: unset;
        }
    }
    .paginator-wrapper {
        padding: 2rem 0;
        text-align: right;
    }

    .paginator-wrapper button {
        color: #317be2;
        background: white;
        border: solid 1px #317be2;
        padding: 5px 15px;
        margin-left: 5px;
    }
</style>