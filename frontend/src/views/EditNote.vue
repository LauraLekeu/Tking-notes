<template>
    <div>
        <Menu />
        <div class="page">

            <Header :title="title"  />

            <div class="cards-dashboard">
                <div class="cards-cours">

                        <div class="section-fields">
                            <input id="field-form-title" class="fields-form" type="text" name="titre-note"
                                v-model="formData.title">
                           <textarea id="field-form-text" class="fields-form" name=" content-note"
                            v-model="formData.content"></textarea>
                        </div>
                   
                </div>

                <div class="card-menu">

                    <select v-model="formData.course_id" name="cours" id="menu-options">
                        <option v-for="course in courses" :key="course.id" :value="formData.course" :selected="formData.course === course.id ? true : false"> {{ course.name }} </option>
                    </select>

                    <div class="content-separation"></div>

                    <button @click="edit()" class="btn-todo active">Modifier</button>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios'
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
                user: null,
                formData: {
                    id: null,
                    title: '',
                    content: '',
                    course: ''
                }
            }
        },
        methods: {
            edit() {
                this.formData.user = this.$store.state.user.id;
                console.log('form data', this.formData)
                axios.post('http://127.0.0.1:8000/api/editNotes', this.formData)
                    .then(response => {
                            // Notification si OK
                            this.$notify({
                            title: 'Thank you !',
                            text: 'The resource has been modified!',
                            type: 'success',
                            speed: 600
                            })  
                            this.$store.dispatch('editNote', response.data.note)
                        })
                        .catch(() => {
                                // Notification si problème durant la transaction
                                this.$notify({
                                        title: 'Oups...',
                                        text: 'There is a problem during modification',
                                        type: 'error',
                                        speed: 600
                                        })
                        }).finally(() => {
                            this.$router.push(`/note-${this.$route.params.id}`);
                        })
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
            this.$store.dispatch('setNotes', {cookie: this.$cookies.get('token'), user_id: this.$store.state.user.id});
            this.$store.dispatch('setCourses', {cookie: this.$cookies.get('token'), user_id: this.$store.state.user.id});
        }, 
        mounted() {
            this.formData = {
                id: this.note.id,
                title: this.note.title,
                content: this.note.content,
                course: this.note.course_id
            }
        }
    }
</script>

<style lang="scss">

</style>