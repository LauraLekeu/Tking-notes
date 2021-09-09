import axios from 'axios';

const actions = {
    // Faire la transaction AJAX et Lancer les setters
    setCourses({commit}) {
        // Transaction ajax
        axios.get('http://127.0.0.1:8000/api/courses')
             .then(response => (commit('SET_COURSES', response.data)));
    }   
}

export default actions;