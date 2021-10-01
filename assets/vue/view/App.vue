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
import AppHeader from "@/components/AppHeader.vue"
import AppBanner from "@/components/AppBanner.vue"
import ListFilter from '@/components/ListFilter.vue'
import AppVideo from '@/components/AppVideo.vue'

export default {
    name: 'App',

    components: {
        ListFilter,
        AppHeader,
        AppBanner,
        AppVideo
    }
}
</script>

<style scoped>
    .app-video-row{
        display: flex;
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
</style>