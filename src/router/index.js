import Vue from 'vue'
import Router from 'vue-router'
import activities from '@/components/activities'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'activities',
      component: activities
    }
  ]
})
