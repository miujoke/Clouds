import Vue from 'vue'
import store from './store'
//import '@babel/polyfill'  兼容ie
import ElementUI from 'element-ui';
Vue.use(ElementUI);
import 'element-ui/lib/theme-chalk/index.css';

import "@/assets/iconfont.css"//使用在线iconfont第三方图标库
Vue.config.productionTip = false

//公共组件
import publicTitle from '../src/components/index'
Vue.use(publicTitle)

import constData from '@/assets/data/constData' //权限
Vue.prototype.$constData = constData

import getName from '@/assets/getName' //权限
Vue.prototype.$getName = getName

import api from '@/assets/util/api' //api接口层
Vue.prototype.$api = api
import App from './App.vue'
import router from './router'
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
