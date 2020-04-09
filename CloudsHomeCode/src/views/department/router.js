const departmentHome  = ()=>import('./index')

let routes=[
  {
    path:'/departmentHome',
    name:'departmentHome',
    component:departmentHome
  },
]

let ROUTES=routes
ROUTES.forEach((val,index,arr)=>{
  arr[index].meta={
    require_teacher:true
  }
})

export default ROUTES
