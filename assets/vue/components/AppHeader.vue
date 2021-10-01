<template>
    <div class="app-header">
        <div class="header--title">
            <h2>A propos de We Movies</h2>
        </div>
        <div class="header-search--container">
            <div class="search-input-container">
                <span class="fa fa-search"></span> 
                <input type="text" v-model="searchparam" @input="autocomplete">
            </div>
            <div class="search-input-autocomplete" v-if="suggestions.length > 0" v-click-outside="closeSuggestion">
                <div class="suggestion-item" v-for="item, index in suggestions" :key="'autocomplete-item'+index">
                    <div class="item-link" @click="selectSuggestion(item)">{{ item.title }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MovieService from "@/services/MovieService.js"

export default {
    name: 'AppHeader',

    data: function(){
        return {
            searchparam: '',
            suggestions: []
        }
    },

    methods: {
        selectSuggestion: function(item){
            this.searchparam = item
            this.suggestions = []
        },
        autocomplete: function(){
            let q = this.searchparam
            /** auto complete serach result  */

            MovieService.getList({
                search: q
            }).then((response) => {
                 if(response.data.results){
                    this.suggestions = response.data.results
                }
            })
        },
        closeSuggestion: function(){
            this.suggestions = []
        },
    }
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
    .header-search--container {
        position: relative;
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

    .search-input-autocomplete {
        position: absolute;
        z-index: 9;
        background: white;
        width: 100%;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        font-size: 15px;
        line-height: 1.8rem;
        color: #6c757d;
        max-height: 18rem;
        overflow: hidden;
    }
    .suggestion-item {
        border-top: solid 1px #dee2e6;
        padding: 5px 10px;
        cursor: pointer;
    }
     .suggestion-item:hover {
        color: #7dacfa;
        font-family: 'NunitoSans-Bold';
    }
</style>