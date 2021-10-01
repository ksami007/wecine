<template>
    <div class="modal app-video-modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" @click="$emit('close')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="app-video-player">
                    Player
                </div>
                <div class="app-video-meta">
                    <div class="meta-title">
                        Video title
                    </div>
                    <div class="meta-desc">
                        Excepteur minim magna id sunt ad veniam labore ex sunt pariatur. Duis pariatur nostrud sint officia. Ut laboris anim aliqua sint velit. Laborum id id anim aliqua. Tempor cupidatat sit sint irure esse enim. Aute et mollit tempor magna adipisicing magna nostrud.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AppVideoModal'
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
  background-color: rgb(0 0 0 / 67%);
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 70%;
  position: relative;
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
</style>