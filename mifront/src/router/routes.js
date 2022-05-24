// import Register from "pages/Register";

import Login from "pages/Login";
import Home from "pages/Home";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: Login},
      { path: 'home', component: Home},
    ]
  },
  // {
  //   path: '/register',
  //   component:Register
  // },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
