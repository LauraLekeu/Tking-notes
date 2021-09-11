import { createRouter, createWebHistory } from "vue-router";

import Home from "../views/Home.vue";

import Dashboard from '../views/Dashboard.vue'

import Todos from '../views/Todos.vue'
import AddTodo from '../views/AddTodo.vue'

import Cours from '../views/Cours.vue'
import AddCourse from '../views/AddCourse.vue'

import Notes from '../views/Notes.vue'
import AddNote from '../views/AddNote.vue'
import EditNote from '../views/EditNote.vue'
import DetailNote from '../views/DetailNote.vue'
import EditCourse from '../views/EditCourse.vue'

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/taches',
    name: 'Todos',
    component: Todos,
  },
  {
    path: '/nouvelle-tache',
    name: 'AddTodo',
    component: AddTodo,
  },

  {
    path: '/cours',
    name: 'Cours',
    component: Cours,
  },
  {
    path: '/nouveau-cours',
    name: 'AddCourse',
    component: AddCourse,
  },
  {
    path: '/edit/cours-:id',
    name: 'EditCourse',
    component: EditCourse,
  },
  {
    path: '/notes',
    name: 'Notes',
    component: Notes,
  },
  {
    path: '/nouvelle-note',
    name: 'AddNote',
    component: AddNote,
  },
  {
    path: '/edit/note-:id',
    name: 'EditNote',
    component: EditNote,
  },
  {
    path: '/note-:id',
    name: 'DetailNote',
    component: DetailNote,
  },
  // {
  //   path: "/about",
  //   name: "About",
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () =>
  //     import(/* webpackChunkName: "about" */ "../views/About.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
