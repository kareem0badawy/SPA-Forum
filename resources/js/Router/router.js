import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


// import Parallex from '../components/Parallex'
import Login from '../components/login/Login'
import Signup from '../components/login/signup'
import Forum from '../components/forum/forum'
import Read from '../components/forum/read'
import Create from '../components/forum/create'
import Logout from '../components/login/Logout'
// import CreateCategory from '../components/category/CreateCategory'




const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name:'forum' },
    { path: '/question/:slug', component: Read,name: 'read' },
    { path: '/ask',component: Create },
  ]


  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  }) 

export default router