<template>

    <div class="dashboard-card">
        <div class="card-add-dash">
            <router-link to="/nouveau-cours" class="bouton-add">
                <div class="test-new-btn">Ajouter un nouveau cours</div>
            </router-link>
            <div class="section-total">
                <div class="total-container">
                    <svg width="22" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-collection-fill"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                    </svg>
                    <span> {{ nbCourses }} </span>
                </div>
            </div>
        </div>

        <div class="content-separation" style=" font-size:1em; opacity: 70%;border-bottom: 1px solid #d1d1d1;margin-top: 1.5em;">
            Derniers cours
        </div>

        <div v-for="course in courses" :key="course.id" class=" card-small cards-hover">
            <a href="detail.html" class="card-link">
                <div class="double-titre">
                    <div class="card-titre"> {{ course.name }} </div>
                </div>
                <div class="card-soustitre">
                    {{ nbNotesByCourses(course).length ? `${nbNotesByCourses(course).length} note` : "Pas de note" }}
                </div>
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
    // import axios from 'axios';
    export default {
        name: 'CardCoursesDash',
        data() {
            return {
                params: {
                    start: 0,
                    end: 2,
                }
            }
        },
        computed: {
            courses() {
                return this.$store.getters.getNbCourses(this.params);
            },
            nbCourses() {
                return this.$store.getters.getCourses.length;
            },
            nbNotesByCourses() {
                return (course) => {
                    return this.$store.getters.getNotesByCoursesId(course);
                }
            }
        },
        methods: {

        },
        created() {
            this.$store.dispatch('setCourses');
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>