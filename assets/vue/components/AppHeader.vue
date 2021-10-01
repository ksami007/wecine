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
                    <div class="item-link" @click="selectSuggestion(item)">{{ item }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
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
            this.suggestions = this.getFakeSuggestion(q)
        },
        closeSuggestion: function(){
            this.suggestions = []
        },
        getFakeSuggestion: function(q){
            let text = `
                    Officia dolor nostrud laboris eiusmod elit dolore voluptate cillum cupidatat esse laborum. Cupidatat proident consectetur consequat occaecat in. Qui veniam proident reprehenderit id proident pariatur laboris duis anim consectetur ullamco culpa in consequat. Ex amet cillum eiusmod dolor nisi.
                    Consequat aliqua officia ullamco occaecat velit et ea nostrud laborum. Esse ipsum amet adipisicing qui laborum velit tempor eiusmod. Occaecat esse cupidatat nulla id consectetur duis et. Exercitation eu reprehenderit proident dolor dolore sit nulla mollit tempor.
                    Duis laboris tempor consequat enim proident. Aliqua incididunt officia ullamco veniam velit sit cillum et ullamco sit aliquip excepteur sunt velit. Dolor elit et deserunt culpa ipsum id excepteur cupidatat sit minim do veniam tempor. Eu ea enim magna pariatur exercitation occaecat et sint mollit eu ea.
                    Incididunt consectetur amet eu eiusmod ad. Magna excepteur elit veniam cupidatat nisi dolore. Cupidatat Lorem duis eiusmod magna sunt proident. Aliquip anim do amet sint officia laboris labore fugiat anim ipsum officia. Fugiat anim esse enim dolore ea reprehenderit duis commodo. Adipisicing labore laborum qui id pariatur est.
                    Exercitation ea aliquip exercitation qui labore in dolor laborum eu duis cupidatat esse consectetur. Consequat in exercitation in aliqua mollit ipsum fugiat commodo qui ipsum duis veniam. Occaecat eu officia do sint est qui tempor minim exercitation sunt nisi. Et magna ad qui elit enim ullamco.
                    Culpa ex adipisicing commodo non fugiat. Irure do magna id qui ea eu. Veniam duis Lorem laborum elit pariatur quis. Sint labore anim incididunt veniam in. Anim cupidatat nulla minim mollit proident veniam incididunt labore.
            `
            let db = text.split(' ')
            let sug = []
            
            if(q.length < 1){
                return sug
            }

            for (let index = 0; index < db.length; index++) {
                const element = db[index];
                if(element.toLowerCase().includes(q.toLowerCase())){
                    sug = [...sug, element]
                }
            }
            return sug 
        }
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