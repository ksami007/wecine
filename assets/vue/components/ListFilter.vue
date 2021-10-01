<template>
  <div class="list-filter--wrapper">
      <div class="filter-item">
          <label>
            <input type="checkbox">
            <span>Commedie</span>
          </label>
      </div>
      <div class="filter-item">
          <label>
            <input type="checkbox">
            <span>Aventure</span>
          </label>
      </div>
      <div class="filter-item">
          <label>
            <input type="checkbox">
            <span>Fantastique</span>
          </label>
      </div>
      <div class="filter-item">
          <label>
            <input type="checkbox">
            <span>Annimation</span>
          </label>
      </div>
      <div class="filter-item">
          <label>
            <input type="checkbox">
            <span>Action</span>
          </label>
      </div>
  </div>
</template>

<script>
export default {
    name: 'ListFilter'
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