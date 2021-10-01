<template>
    <div class="video-rate--star">
        <span class="fa fa-star"   v-for="(n,index) in fullStars" :key="'star-full-'+index"></span>
        <span class="fa fa-star-o" v-for="(n,index) in emptyStars" :key="'star-empty-'+index"></span>
    </div>
</template>

<script>
export default {
    name: 'MovieRate',

    props: {
        movie: {
            require: true
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

}
</script>

<style scoped>
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
</style>