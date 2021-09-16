// Modifier 
const mutations = {
    SET_USER(state, data) {
        state.user = data
    },
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
    },
    ADD_COURSE(state, payload) {
        state.courses.push(payload)
    },
    ADD_NOTE(state, payload) {
        state.notes.push(payload)
    },
    ADD_TODO(state, payload) {
        state.todos.push(payload)
    },
    DELETE_TODO(state, data) {
        const index = state.todos.findIndex(todo => todo.id === data.todo.id);
        state.todos.splice(index, 1);
    },
    DELETE_COURSE(state, data) {
        const index = state.courses.findIndex(course => course.id === data.course.id);
        state.courses.splice(index, 1);
    },
    DELETE_NOTE(state, data) {
        const index = state.notes.findIndex(note => note.id === data.note.id);
        state.notes.splice(index, 1);
    },
    EDIT_NOTE(state, data) {
        const index = state.notes.findIndex(note => note.id === data.note.id);
        state.notes.splice(index, 1);
        state.notes.splice(index, 0, data.note);
    },
    EDIT_COURSE(state, data) {
        const index = state.courses.findIndex(course => course.id === data.course.id);
        state.courses.splice(index, 1);
        state.courses.splice(index, 0, data.course);
    },
    EDIT_TODO(state, data) {
        console.log(data.todo.id)
        const index = state.todos.findIndex(todo => todo.id === data.todo.id);
        state.todos.splice(index, 1);
        state.todos.splice(index, 0, data.todo);
    },
    LOGOUT_USER(state) {
        state.user = null;
    }
}

export default mutations