import axios from 'axios';
// import {App} from 'vue'

// Faire la transaction AJAX et Lancer les setters
const actions = {
    setUser({commit}, data) {
        commit('SET_USER', data)
    },
    setCourses({commit}, data) {
        // Transaction ajax
        axios.get('http://127.0.0.1:8000/api/courses', {
            data: {
                user_id: data.user_id
            },
            headers: {
                Authorization: data.cookie
            }
        })
             .then(response => (commit('SET_COURSES', response.data)));
    },
    setNotes({commit}, data) {
        axios.get('http://127.0.0.1:8000/api/notes', {
            data: {
                user_id: data.user_id
            },
            headers: {
                Authorization: data.cookie
            }
        })
             .then(response => (commit('SET_NOTES', response.data)));
    },
    setTodos({commit}, data) {
        axios.get('http://127.0.0.1:8000/api/todos', {
            data: {
                user_id: data.user_id
            },
            headers: {
                Authorization: data.cookie
            }
        })
             .then(response => (commit('SET_TODOS', response.data)));
    },
    // setTags({commit}, data) {
    //     axios.get('http://127.0.0.1:8000/api/tags', {
    //         headers: {
    //             Authorization: data.cookie
    //         }
    //     })
    //          .then(response => (commit('SET_TAGS', response.data)));
    // },
    addCourse({commit}, payload) {
        commit('ADD_COURSE', payload)
    },
    addNote({commit}, payload) {
        commit('ADD_NOTE', payload)
    },
    addTodo({commit}, payload) {
        commit('ADD_TODO', payload)
    },
    deleteTodo({commit}, data) {
        commit('DELETE_TODO', data)
    },
    deleteCourse({commit}, data) {
        commit('DELETE_COURSE', data)
    },
    deleteNote({commit}, data) {
        commit('DELETE_NOTE', data)
    },
    editNote({commit}, data) {
        commit('EDIT_NOTE', data)
    }
}

export default actions;