const fakeDb = [
    {
        id: 1,
        poster_path: 'https://www.themoviedb.org/t/p/w533_and_h300_bestv2/nlor5UKEkOuARd6YcltbeVyOgUz.jpg',
        production_companies : {
            name: 'Dysney'
        },
        title: 'Lorem upsom video',
        vote_average : 5,
        video: 'XQ5bhrr8kRg',
        genres: [
            {id: 1 , name: 'commedie'}
        ]
    },
    {
        id: 2,
        poster_path: 'https://www.themoviedb.org/t/p/w533_and_h300_bestv2/nlor5UKEkOuARd6YcltbeVyOgUz.jpg',
        production_companies : {
            name: 'Dysney'
        },
        title: 'Dolores captcha video',
        vote_average : 5,
        video: 'XQ5bhrr8kRg',
        genres: [
            {id: 1 , name: 'commedie'}
        ]
    },
    {
        id: 3,
        poster_path: 'https://www.themoviedb.org/t/p/w533_and_h300_bestv2/nlor5UKEkOuARd6YcltbeVyOgUz.jpg',
        production_companies : {
            name: 'Dysney'
        },
        title: 'Martinique lapon ',
        vote_average : 3,
        video: 'XQ5bhrr8kRg',
        genres: [
            {id: 2 , name: 'Aventure'}
        ]
    },
    {
        id: 4,
        poster_path: 'https://www.themoviedb.org/t/p/w533_and_h300_bestv2/nlor5UKEkOuARd6YcltbeVyOgUz.jpg',
        production_companies : {
            name: 'Dysney'
        },
        title: 'Cyclo platinium fliga ',
        vote_average : 3,
        video: 'XQ5bhrr8kRg',
        genres: [
            {id: 2 , name: 'Aventure'}
        ]
    },
]



const Faker = {

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
    },



    getVideoByGenres: function(genres){
       let nbr = Math.floor(Math.random() * fakeDb.length);
       let result = []
        for (let index = 0; index < nbr; index++) {
            let key = Math.floor(Math.random() * fakeDb.length);
            result = [...result, fakeDb[fakeDb] ]
        }
        return result
    },
    getAllVideos: function(){
        return fakeDb
    }
}
export default Faker