<template>
    <div>

        <Menu />

        <div class="page">

            <Header />

            <div class="cards-dashboard">

                <div class="cards-cours">
                    <CardCours />
                </div>

                <div class="card-menu">
                 

                    <div class="add-container">
                            <form class="card-add">
                                <input type="text" name="coursname" class="field-add" placeholder="Ajouter un cours">
                                <button class="icon-plus">
                                    <svg fill="currentColor" width="30" height="30" viewBox="0 0 448 448"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>


                        <div class="section-total">

                            <div class="total-container">
                                <svg width="22" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-collection-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                                </svg>
                                <span> 5 </span>
                            </div>
                        </div>

                        <div class="content-separation"></div>

                        <div class="add-container display-non">
                            <form class="card-add edit-cours">

                                <input type="text" name="coursname" class="field-add" value="Cours de math">
                                <button class="icon-plus">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                </div>

            </div>     

        </div>

    </div>

</template>


<script>
   // import axios from 'axios';
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';
    import CardCours from '../components/CardCours.vue';

    export default {
        name: 'Cours',
        components: {
            Menu,
            Header,
            CardCours,
        },
        data() {
            return {
                user: null,
                // courses: [],
                // notes: [],
            }
        },

        methods: {
            // getAllCourses() {
            //     axios.get('http://127.0.0.1:8000/api/courses').then((data) => {
            //         this.courses = data.data;
            //     }).catch(e => {
            //         console.log(e);
            //     })
            // }, 
            // getAllNotes() {
            //     axios.get('http://127.0.0.1:8000/api/notes').then((data) => {
            //         this.notes = data.data;
            //         this.countNotesByCourses()
            //     }).catch(e => {
            //         console.log(e);
            //     })
            // },
            // countNotesByCourses() { ////Marche pas
            //     this.courses.forEach((course) => {
            //         const notesByCourseId = this.notes.filter((note) => {
            //             return note.course_id === course.id;
            //         })
            //         course = {...course, notesLenght: notesByCourseId.lenght}
            //     })
            // }
        },
        // created() {
        //     this.getAllCourses();
        //     this.getAllNotes();
        // }
    }
</script>

<style lang="scss">

.cards-cours  {
    width: 62%;
}
   

</style>