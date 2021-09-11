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
    },
    DELETE_TODO(state, data) {
        const index = state.todos.findIndex(todo => todo.id === data.todo.id);
        state.todos.splice(index, 1);
    },
    DELETE_COURSE(state, data) {
        const index = state.courses.findIndex(course => course.id === data.course.id);
        state.courses.splice(index, 1);
    }
}

export default mutations