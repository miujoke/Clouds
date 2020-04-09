import {util} from "./util"

let api={}
/**
 * 物资需求计划 materialPlan
 * */
api.getMaterialPlan=function(cnt,callback){
  util("materialPlan/getMaterialPlan",cnt,callback)
}
api.createMaterialPlan=function(cnt,callback){
  util("materialPlan/createMaterialPlan",cnt,callback)
}
api.updateMaterialPlan=function(cnt,callback){
  util("materialPlan/updateMaterialPlan",cnt,callback)
}
api.selectMaterialPlan=function(cnt,callback){
  util("materialPlan/selectMaterialPlan",cnt,callback)
}
api.selectMaterialPlanState=function(cnt,callback){
  util("materialPlan/selectMaterialPlanState",cnt,callback)
}
api.getApprovalPlan=function(cnt,callback){
  util("materialPlan/getApprovalPlan",cnt,callback)
}
api.updateApprovalPlanHead=function(cnt,callback){
  util("materialPlan/updateApprovalPlanHead",cnt,callback)
}
api.updateApprovalPlanNeed=function(cnt,callback){
  util("materialPlan/updateApprovalPlanNeed",cnt,callback)
}
/**
 * 物资需求计划状态 materialPlanState
 * */
api.getMaterialPlanState=function(cnt,callback){
  util("materialPlanState/getMaterialPlanState",cnt,callback)
}
api.createMaterialPlanState=function(cnt,callback){
  util("materialPlanState/createMaterialPlanState",cnt,callback)
}
api.changeState=function(cnt,callback){
  util("materialPlanState/changeState",cnt,callback)
}
/**
 *  物资需求计划修改状态 materialPlanChangeState
 ***/
api.getMaterialPlanChangeState=function(cnt,callback){
  util("materialPlanChangeState/getMaterialPlanChangeState",cnt,callback)
}
api.createMaterialPlanChangeState=function(cnt,callback){
  util("materialPlanChangeState/createMaterialPlanChangeState",cnt,callback)
}

/**
 * 物品清单 metarialList
 * */
api.getMetarialList=function(cnt,callback){
  util("metarialList/getMetarialList",cnt,callback)
}
api.createMetarialList=function(cnt,callback){
  util("metarialList/createMetarialList",cnt,callback)
}
api.selectMetarialList=function(cnt,callback){
  util("metarialList/selectMetarialList",cnt,callback)
}


/**
 * 2 procurePlan 采购计划
 **/
api.getProcurePlan=function(cnt,callback){
  util("procurePlan/getProcurePlan",cnt,callback)
}
api.createProcurePlan=function(cnt,callback){
  util("procurePlan/createProcurePlan",cnt,callback)
}
api.updateProcurePlan=function(cnt,callback){
  util("procurePlan/updateProcurePlan",cnt,callback)
}
api.procureChangeState=function(cnt,callback){
  util("procurePlan/procureChangeState",cnt,callback)
}
api.getApprovalProcure=function(cnt,callback){
  util("procurePlan/getApprovalProcure",cnt,callback)
}
api.updateApprovalProcureHead=function(cnt,callback){
  util("procurePlan/updateApprovalProcureHead",cnt,callback)
}
api.updateApprovalProcureNeed=function(cnt,callback){
  util("procurePlan/updateApprovalProcureNeed",cnt,callback)
}
api.selectProcurePlan=function(cnt,callback){
  util("procurePlan/selectProcurePlan",cnt,callback)
}
/**
 * procureList 物品清单
 * */
api.getProcureList=function(cnt,callback){
  util("procureList/getProcureList",cnt,callback)
}

api.createProcureList=function(cnt,callback){
  util("procureList/createProcureList",cnt,callback)
}


/**
 *3 stockList 物资清单  仓库
 * */
api.getStockList=function(cnt,callback){
  util("stockList/getStockList",cnt,callback)
}
api.createStockList=function(cnt,callback){
  util("stockList/createStockList",cnt,callback)
}

/**
 * 采购计划审核状态 procurePlanState
 * */
api.getProcurePlanState=function(cnt,callback){
  util("procurePlanState/getProcurePlanState",cnt,callback)
}
api.createProcurePlanState=function(cnt,callback){
  util("procurePlanState/createProcurePlanState",cnt,callback)
}

/**
 * 物资需求计划修改状态 materialPlanChangeState
 * */
api.getProcurePlanChangeState=function(cnt,callback){
  util("materialPlanChangeState/getProcurePlanChangeState",cnt,callback)
}
api.createProcurePlanChangeState=function(cnt,callback){
  util("materialPlanChangeState/createProcurePlanChangeState",cnt,callback)
}
export default api