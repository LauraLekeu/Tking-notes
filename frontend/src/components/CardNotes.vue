<template>

    <div class="list-cards">
        <!-- star card -->
        <div class="card-style-1  cards-hover">
            <a href="detail.html" class="card-link">
                <div class="double-titre">
                    <div class="card-titre">Titre de la note </div>
                    <div class="text-separation">|</div>
                    <div class="card-date">03/05/2021</div>
                </div>
                <div class="card-soustitre">Technique de l'image</div>
                <div class="card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                    nulla eum, deleniti quas inventore nam molestiae, nesciunt laborum, deserunt laboriosam
                    culpa aut cum sapiente voluptatem nihil dolores quibusdam repudiandae autem! Explicabo
                    officiis ex id esse, temporibus laboriosam nisi harum eligendi beatae</div>
            </a>
            <div class="card-icons">
                <div class="icons-container">
                    <a href="detail.html" class="icon-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                            class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- end card -->


    </div>

</template>

<script>
    export default {
        name: 'CardDevoirs',
        props: {

        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>