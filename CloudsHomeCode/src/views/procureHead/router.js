const procureApp  = ()=>import('./approvalPlan')

let routes=[
  {
    path:'/procureApp',
    name:'procureApp',
    component:procureApp
  },
]

let ROUTES=routes


export default ROUTES
