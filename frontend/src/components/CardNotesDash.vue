<template>

    <div class="dashboard-card">

        <div class="card-add-dash">
            <router-link class="bouton-add" to="nouvelle-note">
                <div class="test-new-btn">Créer une nouvelle note</div>
            </router-link>
            <div class="section-total">
                <div class="total-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-text-fill" width="22"
                        height="22" viewBox="0 0 16 16">
                        <path
                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                    </svg>
                    <span> {{ nbNotes }} </span>
                </div>
            </div>
        </div>

        <div class="content-separation" style=" font-size:1em; opacity: 70%;border-bottom: 1px solid #d1d1d1;margin-top: 1.5em;">
            Dernières notes
        </div>

        <div v-for="note in notes" :key="note.id" class=" card-small cards-hover">
            <a href="detail.html" class="card-link">
                <div class="double-titre">
                    <div class="card-titre"> {{ note.title }} </div>
                </div>
                <div class="card-soustitre"> {{   course(note).name }}  </div>
            </a>
            <div class="card-icons">
                <div class=" icons-container">
                    <a href="" class="icon-edit">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg> -->

                    </a>
                </div>

            </div>

        </div>

    </div>

</template>

<script>
    import moment from 'moment'

    export default {
        name: 'CardNotesDash',
        data() {
            return {
                params: {
                    start: 0,
                    end: 2,
                }
            }
        },
        methods: {
            formatDate(value) {
                if (value) {
                    return moment(String(value)).format("DD MMM YYYY ")
                }
            },
        },
        computed: {
            notes() {
                return this.$store.getters.getNbNotes(this.params);
            },
            course() {
                return (note) => {
                    return this.$store.getters.getCoursesByNotesId(note);
                }
            },
            nbNotes() {
                return this.$store.getters.getNotes.length
            }
        },
        created() {
            this.$store.dispatch('setNotes');
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>