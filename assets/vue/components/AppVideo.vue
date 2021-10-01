<template>
    <div class="video-wrapper">
        <div class="thumbnails--container">

        </div>
        <div class="video-content--container">
            <div class="video-header">
                <div class="video-header--title">
                    Video title
                </div>
                <div class="video-header--rate">
                    <div class="video-rate--star">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="video-rate--text">
                            (2778 votes)
                    </div>
                </div>
            </div>
            <div class="video-description">
                <div class="description-meta">
                    <span class="meta-date">2006</span>
                    <span class="mata-org">Dysney par</span>
                </div>
                <div class="description-text">
                    Commodo commodo Lorem aute nisi voluptate aliquip cupidatat dolor. Mollit nisi aliqua minim pariatur incididunt adipisicing 
                    Commodo commodo Lorem aute nisi voluptate aliquip cupidatat dolor. Mollit nisi aliqua minim pariatur incididunt adipisicing 
                </div>
            </div>
            <div class="video-controls">
                <button class="show-more--btn">Lire le details</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AppVideo'
}
</script>

<style scoped>
    .video-wrapper {
    display: flex;
}

.thumbnails--container {
    min-width: 5rem;
    display: flex;
    background: #aaa;
}

.video-content--container {
    padding-left: 1.5rem;
}

.video-header {
    display: flex;
    align-items: center;
}

.video-header--rate {
    display: flex;
    align-items: flex-end;
}

.video-controls {
    text-align: right;
    padding-top: 15px;
}

button.show-more--btn {
    background: #317be2;
    color: white;
    border: none;
    padding: 6px 15px;
    border-radius: 15px;
    font-family: 'NunitoSans-SemiBold';
}


.video-header--title {
    color: #666;
    font-family: 'NunitoSans-SemiBold';
    font-size: 1.5rem;
    margin-right: 1rem;
}
.video-rate--star {
    color: #317be2;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding-bottom: 2px;
}
.video-rate--star  span {
    display: block;
    margin: 0 3px;
}
.video-rate--text {
    font-size: 14px;
    margin: 2px 10px;
    font-family: 'NunitoSans-Regular';
    color: #666;
}
.video-description .meta-date {
    font-family: 'NunitoSans-SemiBold';
    color: #666;
}
.video-description .mata-org {
    font-family: 'NunitoSans-Regular';
    font-size: 13px;
    color: #317be2;
}
.description-text {
    color: #666;
    font-family: 'NunitoSans-Regular';
    font-size: 14px;
}
</style>