import materialPlan from './materialPlan.vue';//物资计划
import nextPage from './nextPage.vue';//分页
import titleText from './titleText.vue';//标题
import dialog from './dialog.vue';//确认弹框
const publicTitle={
    install:function(Vue) {
      Vue.component('materialPlan', materialPlan),
      Vue.component('nextPage', nextPage),
        Vue.component('titleText', titleText),
        Vue.component('mydialog', dialog)
    }
  }

export default publicTitle;