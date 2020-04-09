const produceHeadHome  = ()=>import('./index')
const approvalPlan  = ()=>import('./approvalPlan')

let routes=[
  {
    path:'/produceHeadHome',
    name:'produceHeadHome',
    component:produceHeadHome
  },
  {
    path:'/approvalPlan',
    name:'approvalPlan',
    component:approvalPlan
  },
]

let ROUTES=routes

export default ROUTES
