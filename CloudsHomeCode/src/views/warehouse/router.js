const stockList  = ()=>import('./stockList')
const createStockList  = ()=>import('./createStockList')

let routes=[
  {
    path:'/stockList',
    name:'库存清单',
    component:stockList
  },
  {
    path:'/createStockList',
    name:'创建清单',
    component:createStockList
  },
]

let ROUTES=routes

export default ROUTES
