<template>
    <div class="app-body">
        <div class="container">
            <div class="app-header-container">
                <app-header />
            </div>
            <div class="app-banner-container">
                <app-banner />
            </div>

            <div class="app-video-row">
                <div class="col col-list-filter">
                    <list-filter />
                </div>
                <div class="col ">
                    <div class="video-list-container">
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                        <div class="video-item--wrapper">
                            <app-video />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
import AppHeader    from "@/components/AppHeader.vue"
import AppBanner    from "@/components/AppBanner.vue"
import ListFilter   from '@/components/ListFilter.vue'
import AppVideo     from '@/components/AppVideo.vue'
import VideoService from "@/services/VideoService.js"

export default {
    name: 'App',

    components: {
        ListFilter,
        AppHeader,
        AppBanner,
        AppVideo
    },

    data: function(){
        return {
            videos : []
        }
    },

    methods: {
        findAll: function(){
            this.videos = VideoService.getAllVideos()
        }
    }

}
</script>

<style scoped>
    .app-video-row{
        display: flex;
    }
    .app-banner-container {
        padding-bottom: 4rem;
    }
    .col-list-filter {
        min-width: 12rem;
    }
    .video-list-container {
        margin-left: 2rem;
    }
    .video-item--wrapper {
        margin-bottom: 2rem;
    }

    @media (max-width:991px) {
        .list-filter--wrapper{
            display: flex;
            justify-content: space-between;
            padding: 1rem 1rem 0 1rem;
        }
        .app-video-row{
            flex-direction: column;
        } 
        .video-list-container{
            margin-top: 2rem;
            margin-left: unset;
        }
    }
</style>