const produceHome  = ()=>import('./index')
const createMaterial  = ()=>import('./createMaterial')
const updateMaterial  = ()=>import('./updateMaterPlan')
const reportForm  = ()=>import('./reportForm')
let routes=[
  {
    path:'/produceHome',
    name:'produceHome',
    component:produceHome
  },
  {
    path:'/createMaterial',
    name:'新建需求计划',
    component:createMaterial
  },
  {
    path:'/updateMaterial',
    name:'修改需求计划',
    component:updateMaterial
  },
  {
    path:'/reportForm',
    name:'报表',
    component:reportForm
  },
]

let ROUTES=routes

export default ROUTES
