const procureHome  = ()=>import('./index')
const procurePlan  = ()=>import('./procurePlan')
const procurePlanDetails  = ()=>import('./procurePlanDetails')
const createProcurePlan  = ()=>import('./createPlan/createProcurePlan')
const updateProcure  = ()=>import('./update/updateProcure')
let routes=[
  {
    path:'/procureHome',
    name:'procureHome',
    component:procureHome
  },
  {
    path:'/procurePlan',
    name:'procurePlan',
    component:procurePlan
  },
  {
    path:'/procurePlanDetails',
    name:'procurePlanDetails',
    component:procurePlanDetails
  },
  {
    path:'/createProcurePlan',
    name:'createProcurePlan',
    component:createProcurePlan
  },
  {
    path:'/updateProcure',
    name:'updateProcure',
    component:updateProcure
  },
]

let ROUTES=routes


export default ROUTES
