<template>

    <div class="list-cards">

        <div v-for="course in courses" :key="course.id" class="card-style-1  cards-hover">
            <router-link to="/notes" class="card-link">
                <div class="double-titre">
                    <div class="card-titre">{{ course.name }}</div>
                    <div class="text-separation">|</div>
                    <div class="card-date">
                        {{ nbNotesByCourses(course).length ? `${nbNotesByCourses(course).length} note` : "Pas de note" }}
                    </div>
                </div>
            </router-link>

            <div class="card-icons">
                <div class="icons-container">
                    <router-link :to="`/edit/cours-${course.id}`" class="icon-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </router-link>
                </div>
                <div class="card-icons icons-container">
                    <div v-if="nbNotesByCourses(course).length < 1"  class="card-icons">
                        <svg @click="supprimer(course.id)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-trash-fill  delete-course" viewBox="0 0 16 16">
                            <path
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </div>
                    <div v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
 import axios from 'axios';

    export default {
        name: 'CardCours',
        methods: {
            supprimer(id) {
                console.log(id)
                axios.post('http://127.0.0.1:8000/api/deleteCourses', {id})
                .then(response => {
                    console.log(response.data)
                      // Notification si OK
                      this.$store.dispatch('deleteCourse', {course: response.data});
                      console.log('note supprimée', response);
                      this.$notify({
                          title: 'Thank you !',
                          text: 'The resource has been deleted!',
                          type: 'success',
                          speed: 600
                      })
                  })
                  .catch((e) => {
                      console.log(e)
                      // Notification si problème durant la transaction
                      this.$notify({
                          title: 'Oups...',
                          text: 'Impossible de supprimer tant que ce cours à une tâche',
                          type: 'warn',
                          speed: 600
                      })
                  })
                 this.$router.push("/cours") 
            }
        },
        computed: {
            courses() {
                return this.$store.getters.getCourses;
            },
            nbNotesByCourses() {
                return (course) => {
                    return this.$store.getters.getNotesByCoursesId(course);
                }
            }
        },
        created() {
            this.$store.dispatch('setCourses', {cookie: this.$cookies.get('token'), user_id: this.$store.state.user.id});
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
    .card-style-1 {
        padding: 20px 30px;
        margin: 0 0 1em 0;
        background: $color-white;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        box-shadow: 1px 1px 20px $color-shadow;

        #edit-cours {
            width: 100%;
        }

        .card-link {
            text-decoration: none;

            .double-titre {
                display: flex;

                &.home {
                    flex-wrap: wrap;
                    align-self: center;
                }

                .card-titre {
                    margin: 0;
                    padding: 0;
                }

                .card-date {
                    align-self: center;
                    margin: 0;
                    padding: 0;
                }
            }
        }

        #formulaire-edit-cours {
            display: flex;
            width: 100%;
        }
    }

    .delete-course {
        color: $color-dark;
        cursor: pointer;

        &:hover {
            color: $color-contrast;
        }
    }
</style>