<template>
    <div class="modal app-video-modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" @click="$emit('close')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="app-video-player" v-if="video">
                    <iframe  
                      width="100%" 
                      id="video-player-iframe" 
                      :src="`https://www.youtube.com/embed/${video.key}?autoplay=${autoplay}`"
                      frameborder="0" 
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                      allowfullscreen 
                      />
                </div>
                <div class="app-video-meta">
                    <div class="meta-title" v-if="video">
                        {{ video.name }} 
                    </div>
                    <div class="meta-desc">
                        <div class="meta-desc--header">
                            <div class="desc-text">
                                <span class="label">Film : </span>
                                <span>{{ movie.title }}</span>
                            </div>
                            <div class="desc-rate">
                                <movie-rate :movie="movie" />
                                <div class="video-rate--text">
                                    pour {{ movie.vote_count }} utilisateurs
                                </div>
                            </div>
                        </div>
                        <div class="desc-overview">
                           {{ movie.overview }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MovieService from '@/services/MovieService.js'
import MovieRate from './MovieRate.vue'
export default {
  components: { MovieRate },
    name: 'AppVideoModal',
    props: {
        movie: {
            require: true
        },
        autoplay: {
            default: 0
        }
    },
    data: function(){
        return {
            videos: false
        }
    },
    methods: {
        getVideo: function(){
            MovieService.getVideo(this.movie.id).then(
                (response)=>{
                    this.videos = response.data
                }
            )
        }
    },
    computed: {
        video: function(){
            if(!this.videos){
                return false
            }
            
            if(this.videos.length){
               for (let index = 0; index < this.videos.length; index++) {
                   const element = this.videos[index]
                   if(element.key){
                       return element
                   }
               }
            }
            return false
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

.meta-title {
    font-family: 'NunitoSans-Bold';
    font-size: 1.2rem;
}
.meta-desc--header {
    display: flex;
    align-items: center;
    font-family: 'NunitoSans-Regular';
    margin-top: 14px;
}
.desc-text {
    font-size: 14px;
}
.desc-text .label{
    color: #666;
}

.desc-rate {
    display: flex;
    align-items: center;
    margin-left: 15px;
}

.video-rate--text {
    margin-left: 5px;
    font-size: 14px;
}
.desc-overview {
    margin-top: 8px;
    font-size: 14px;
    font-family: 'NunitoSans-Regular';
}
</style>