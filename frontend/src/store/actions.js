import axios from 'axios';

// Faire la transaction AJAX et Lancer les setters
const actions = {

    setCourses({commit}) {
        // Transaction ajax
        axios.get('http://127.0.0.1:8000/api/courses')
             .then(response => (commit('SET_COURSES', response.data)));
    },
    setNotes({commit}) {
        axios.get('http://127.0.0.1:8000/api/notes')
             .then(response => (commit('SET_NOTES', response.data)));
    },
    setTodos({commit}) {
        axios.get('http://127.0.0.1:8000/api/todos')
             .then(response => (commit('SET_TODOS', response.data)));
    },
    setTags({commit}) {
        axios.get('http://127.0.0.1:8000/api/tags')
             .then(response => (commit('SET_TAGS', response.data)));
    },
    deleteTodo({commit}, data) {
        commit('DELETE_TODO', data)
    },
    deleteCourse({commit}, data) {
        commit('DELETE_COURSE', data)
    }
}

export default actions;