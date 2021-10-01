<template>
    <div class="app-header">
        <div class="header--title">
            <h2>A propos de We Movies</h2>
        </div>
        <div class="header-search--container">
            <div class="search-input-container">
                <span class="fa fa-search"></span>
                <input type="text" >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AppHeader'
}
</script>

<style scoped>

    .app-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .header--title h2{
        font-family: 'NunitoSans-SemiBold';
        color: #444474;
        border-bottom: solid;
    }

    .search-input-container {
        position: relative;
    }

    .search-input-container .fa-search {
        display: block;
        position: absolute;
        right: 10px;
        top: .8rem;
        color: #aaa;
    }

    .search-input-container input,
    .search-input-container input:focus-visible
    .search-input-container input:focus
    {
        padding: .8rem 1.5rem;
        border: solid 1px #aaa;
        border-radius: 5px;
        outline: 0;
    }
</style>