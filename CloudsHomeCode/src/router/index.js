import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import login from '../views/login.vue'
import produce from '../views/produce/router'
import produceHead from '../views/produceHead/router'
import demand from '../views/demand/router'
import department from '../views/department/router'
import departmentHead from '../views/departmentHead/router'
import procure from '../views/procure/router'
import procureHead from '../views/procureHead/router'
import finance from '../views/finance/router'
import warehouse from '../views/warehouse/router'
import components from '../components/router'
Vue.use(VueRouter)

const routes = [
  { path: '/', redirect: '/login' },
  {
    path: '/home',
    name: 'home',
    component: Home,
    children:[
      ...produce,
      ...produceHead,
      ...demand,
      ...department,
      ...departmentHead,
      ...procure,
      ...procureHead,
      ...finance,
      ...warehouse,
      ...components

    ]
  },
  {
    path: '/login',
    name: 'login',
    component: login
  },


]

const router = new VueRouter({
  routes
})
// router.beforeEach((to, from, next) => {
//   //console.error(store.state.userJurisdiction +"    5")
//   let user = sessionStorage.getItem('grade');
//
//   if (!user || user === "") {
//       console.error("/没有权限")
//       next({ path: '/login' })
//   }else {
//     next()
//   }
// })
export default router
