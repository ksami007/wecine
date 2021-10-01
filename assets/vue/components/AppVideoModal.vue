<template>
    <div class="modal app-video-modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" @click="$emit('close')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="app-video-player">
                    <iframe 
                      width="100%" 
                      id="video-player-iframe" 
                      :src="`https://www.youtube.com/embed/${firstVideo.key}`"
                      frameborder="0" 
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                      allowfullscreen 
                      />
                </div>
                <div class="app-video-meta">
                    <div class="meta-title">
                        {{ movie.title }} {{ movie.id }}
                    </div>
                    <div class="meta-desc">
                        {{ movie.overview }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MovieService from '@/services/MovieService.js'
export default {
    name: 'AppVideoModal',
    props: {
        movie: {
            require: true
        }
    },
    data: function(){
        return {
            video: false
        }
    },
    methods: {
        getVideo: function(){
            MovieService.getVideo(this.movie.id).then(
                (response)=>{
                    this.video = response.data
                }
            )
        }
    },
    computed: {
        firstVideo: function(){
            if(this.video.length){
                return this.video[0]
            }
        }
    },
    mounted: function(){
        this.getVideo()
    }
}
</script>

<style scoped>
    /* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgb(76 76 76 / 92%);
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  margin-top: 10%;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  position: relative;
  max-width: 40rem;
}

/* The Close Button */
.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    right: -12px;
    top: -12px;
    width: 20px;
    height: 20px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    padding: 3px;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

iframe{
  height:50vh;
}
</style>