<template>
    <div class="banner-wrapper">
        <div class="banner-video-item">
            <img class="bg-image" src="https://www.themoviedb.org/t/p/w533_and_h300_bestv2/nlor5UKEkOuARd6YcltbeVyOgUz.jpg"/>
            <div class="video-control">
                <button>
                    <span class="fa fa-play"></span>
                </button>
            </div>
            <div class="video-meta">
                <div class="video-meta--thubnail">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/ztyJqTdS7RApGgl6ZXmFdGZX3g0.jpg">
                </div>
                <div class="video-meta--text">
                    <div class="video-meta--title">Lorem upsome video</div>
                    <div class="video-meta--desc">Tesst pulga maitre ianao chefo be nay</div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {

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
        min-width: 100%;
    }
    .video-control {
        position: absolute;
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