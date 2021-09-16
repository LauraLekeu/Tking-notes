// Chercher les datas dans le state
const getters = {
    // Return les cours
    getCourses(state) {
        return state.courses
    },
    getCourseById(state) {
        return function (data) {
            return state.courses.find(course => course.id == data);
          } 
    },
    // Return le cours en fonction de l'id de la note
    // !!!!!!!!!!!!!! card todos
    getCoursesByTodosId(state) {
        return function(data) {
            return state.courses.find(course => course.id === data.course_id)
        }
    },
    // !!!!!!!!!!!!!! card notes
    getCoursesByNotesId(state) {
        return function(data) {
            return state.courses.find(course => course.id === data.course_id)
        }
    },
    // Return un nombre de cours
    getNbCourses(state) {
        return function({start, end}) {
            let courses = [...state.courses.slice(start, end)]
            return courses
        }
    },
    // Return les notes 
    getNotes(state) {
        return state.notes
    },
    getNotesByCourseId(state) {
        return function(data) {
            return state.notes.filter(note => note.course_id == data)
        }
    },
    getNoteById(state) {
        return function (data) {
            console.log('data', data)
            return state.notes.find(note => note.id == data);
          } 
    },
    // Return un nombre de notes
    getNbNotes(state) {
        return function({start, end}) {
            let notes = [...state.notes.slice(start, end)]
            return notes
        }
    },
    // Return les notes d'un cours en fonction de son id 
    getNotesByCoursesId(state) {
        return function(data) {
            return state.notes.filter(note => note.course_id === data.id)
        }
    },
    // Return les tâches
    getTodos(state) {
        return state.todos
    },
    getTodosCompleted(state) {
        return state.todos.filter(todo => todo.completed === 0)
    },
    // Return X nombre de todos
    getNbTodos(state) {
        return function({start, end}) {
            let todos = [...state.todos.slice(start, end)]
            return todos
        }
    },
    getTags(state) {
        return state.tags
    },
    getTagsByNoteId(state) {
        return function(data) {
            return state.tags.filter(tag => tag.id === data.course_id)
        }
    }

}

export default getters