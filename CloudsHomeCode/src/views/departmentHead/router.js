const departmentHeadHome  = ()=>import('./index')

let routes=[
  {
    path:'/departmentHeadHome',
    name:'departmentHeadHome',
    component:departmentHeadHome
  },
]

let ROUTES=routes
ROUTES.forEach((val,index,arr)=>{
  arr[index].meta={
    require_teacher:true
  }
})

export default ROUTES
