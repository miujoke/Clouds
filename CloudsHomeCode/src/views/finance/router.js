const financeHome  = ()=>import('./index')

let routes=[
  {
    path:'/financeHome',
    name:'financeHome',
    component:financeHome
  },
]

let ROUTES=routes
ROUTES.forEach((val,index,arr)=>{
  arr[index].meta={
    require_teacher:true
  }
})

export default ROUTES
