const materialList  = ()=>import('./materlist/materialList')

let routes=[
  {
    path:'/materialList',
    name:'物资计划清单详情',
    component:materialList
  },
]

export default routes
