// Modifier 
const mutations = {

    SET_COURSES (state, data) {
        state.courses = data;
    },
    SET_NOTES (state, data) {
        state.notes = data;
    },
    SET_TODOS (state, data) {
        state.todos = data;
    },
    SET_TAGS (state, data) {
        state.tags = data;
    }
}

export default mutations