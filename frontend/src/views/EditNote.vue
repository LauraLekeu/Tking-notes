<template>
    <div>
        <Menu />
        <div class="page">

            <Header :title="title"  />

            <div class="cards-dashboard">
                <div class="cards-cours">

                        <div class="section-fields">
                            <input id="field-form-title" class="fields-form" type="text" name="titre-note"
                                v-model="note.title">
                           <textarea id="field-form-text" class="fields-form" name=" content-note"
                            v-model="note.content"></textarea>
                        </div>
                   
                </div>

                <div class="card-menu">

                    <select v-model="note.course_id" name="cours" id="menu-options">
                        <option v-for="course in courses" :key="course.id" :value="course.id" :selected="note.course_id === course.id ? true : false"> {{ course.name }} </option>
                    </select>
                
                    <div class="content-separation"></div>
                    <!-- <div>
                        <form action="">
                            <input class="" name="newtag" type="text" id="newtag" placeholder="Ajouter un nouveau tag">
                        </form>
                        <label for="cours" id="fleche-menu-options">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </label>
                    </div> -->
                    <!-- <div class="tags">
                        <div class="tag-note hover">HTML</div>
                        <div class="tag-note selected">Illustrator</div>
                        <div class="tag-note hover">XD</div>
                        <div class="tag-note hover">Photoshop</div>
                        <div class="tag-note hover">tag</div>
                        <div class="tag-note hover">CSS</div>
                    </div> -->
                    <button class="btn-todo active">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
    // @ is an alias to /src
    import Menu from '@/components/Menu.vue';
    import Header from '@/components/Header.vue';


    export default {
        name: 'Cours',
        components: {
            Menu,
            Header,
        },
        data() {
            return {
                title: 'Modifier la note',
                user: null
            }
        },
        computed: {
            note() {
                return this.$store.getters.getNoteById(this.$route.params.id)
            },
            course() {
                return (note) => {
                    return this.$store.getters.getCoursesByNotesId(note);
                }
            },
            courses() {
                return this.$store.getters.getCourses;
            },
            tags() {
                return (note) => {
                    return this.$store.getters.getTagsById(note);
                }
            }

        },
        created() {
            this.$store.dispatch('setNotes');
            this.$store.dispatch('setCourses');
        }
    }
</script>

<style lang="scss">

</style>