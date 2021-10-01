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
                    <div class="video-rate--star">
                        <span class="fa fa-star"   v-for="(n,index) in fullStars" :key="'star-full-'+index"></span>
                        <span class="fa fa-star-o" v-for="(n,index) in emptyStars" :key="'star-empty-'+index"></span>
                    </div>
                    <div class="video-rate--text">
                       ({{ movie.vote_count }} votes)
                    </div>
                </div>
            </div>
            <div class="video-description">
                <div class="description-meta">
                    <span class="meta-date">{{ movie.release_date }}</span>
                    <span class="mata-org">Dysney par</span>
                </div>
                <div class="description-text">
                    {{ movie.overview}}
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
export default {
    name: 'Movie',
    components: { AppVideoModal },
    props: {
        movie: {
            require: true
        }
    },
    data: function(){
        return {
            showDetails: false
        }
    },
    computed: {
        fullStars: function(){
            if(!this.movie.vote_average){
                return 0
            }
            return parseInt(this.movie.vote_average)
        },
        emptyStars: function(){
            if(!this.movie.vote_average){
                return 10
            }
            return 10 - parseInt(this.movie.vote_average)
        }
    },
    methods:{
        openDetailModal: function(){
            this.showDetails = true
        },
        closeDetailModal: function(){
            this.showDetails = false
        }
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
.video-rate--star {
    color: #317be2;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding-bottom: 2px;
}
.video-rate--star  span {
    display: block;
    margin: 0 3px;
}
.video-rate--text {
    font-size: 14px;
    margin: 2px 10px;
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
.description-text {
    color: #666;
    font-family: 'NunitoSans-Regular';
    font-size: 14px;
}


</style>