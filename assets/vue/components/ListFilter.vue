<template>
  <div class="list-filter--wrapper" v-if="genres">
      <div class="filter-item" v-for="genre, index in genres" :key="'item-genre-'+index">
          <label>
            <input type="checkbox" :value="genre.id" v-model="selectedGenre">
            <span>{{ genre.name }}</span>
          </label>
      </div>
  </div>
</template>

<script>
import MovieService  from "@/services/MovieService.js"
export default {
    name: 'ListFilter',
    data: function(){
      return {
        genres : false,
        selectedGenre: []
      }
    },

    methods: {
      getGenreList: function(){
        MovieService.getGenreList().then(
          (response) => {
            if(response.data.genres){
              this.genres = response.data.genres
            }
          }
        )
      }
    },

    mounted: function(){
      this.getGenreList()
    },
    watch: {
      selectedGenre: {
        deep: true,
        handler: function(val){
          this.$emit('change', val)
        }
      }
    }
}
</script>

<style scoped>
  .list-filter--wrapper {
      padding: 2rem;
      border: solid 1px gray;
      font-family: 'NunitoSans-Regular';
  }
  .filter-item:not(:last-child) {
      margin-bottom: 15px;
      color: #444474;
  }
</style>