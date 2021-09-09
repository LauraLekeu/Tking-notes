// Chercher les datas dans le state
const getters = {
    // Return les cours
    getCourses(state) {
        return state.courses
    },
    // Return un nombre de cours
    getNbCourses(state) {
        return function({start, end}) {
            let courses = {...state.courses.slice(start, end)}
            return courses
        }
    }
}

export default getters