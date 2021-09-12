<template>

    <div class="list-cards">
        <!-- star card -->
        <div v-for="note in notes" :key="note.id" class="card-style-1  cards-hover">
            <router-link :to="`/note-${note.id}`" class="card-link">
                <div class="double-titre">
                    <div class="card-titre"> {{ note.title }} </div>
                    <div class="text-separation">|</div>
                    <div class="card-date"> {{   course(note).name }} </div>
                </div>
                <div class="card-soustitre"> {{ formatDate(note.created_at) }} </div>
                <div class="card-content"> {{ note.content }} </div>
            </router-link>
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
    import moment from 'moment'

    export default {
        name: 'CardDevoirs',
        data() {
            return {}
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
                return this.$store.getters.getNotes;
            },
            course() {
                return (note) => {
                    return this.$store.getters.getCoursesByNotesId(note);
                }
            }
        },
        created() {
            this.$store.dispatch('setNotes', {cookie: this.$cookies.get('token'), user_id: this.$store.state.user.id});
            this.$store.dispatch('setCourses', {cookie: this.$cookies.get('token'), user_id: this.$store.state.user.id});
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>