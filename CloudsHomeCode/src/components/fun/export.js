const { export_json_to_excel } =  require('@/assets/excel/Export2Excel'); //这里必须使用绝对路径，使用@/+存放export2Excel的路径

export default function export2Excel(plans,lists,excelName) {
  plans[0].planType=(plans[0].planType==='1'?'月计划':(plans[0].planType==='2'?'年计划':'紧急计划'))
  plans[0].planState=(plans[0].planState==='1'?'已计划':(plans[0].planState==='2'?'已提交汇总':(plans[0].planState==='3'?'已删除':'自由')))
  plans[0].approvalState=(plans[0].approvalState==='1'?'未提交':(plans[0].approvalState==='2'?'审批通过':(plans[0].approvalState==='3'?'审批退回':'审批中')))
  plans[0].needType=(plans[0].needType==='1'?'订单型':(plans[0].needType==='2'?'非订单型':'紧急型'))
  console.log(plans)
  require.ensure([], () => {
    const planHeader = ['计划名称','编码','计划类型','需求计划年/月','需求部门','需求人','计划状态','审批状态','需求类型']; // 导出的表头名信息
    const planVal = ['planName','planId','planType','planMonth','needDepartment','needPeoName','planState','approvalState','needType']; // 导出的表头字段名，需要导出表格字段名
    const planData = formatJson(planVal, plans);

    const listHeader = ['物料分类编码','物料分类名称','物料编码','物料名称','规格','型号','单位','需求数量','需求月份','需求日期','货源是否稳定','期望供应商','固定供应商','备注','物料追踪码','需求库存组织']; // 导出的表头名信息
    const listVal = ['materialClassificationCode','materialClassificationName','materialCode','materialName','specifications','model','company','demandQuantity','demandMonth','demandDate','source','expectedSupplier','fixedSupplier','remarks','materialTrackingCode','demandOrganization']; // 导出的表头字段名，需要导出表格字段名
    const listData = formatJson(listVal, lists);

    planData.push([])
    planData.push(listHeader)
    planData.push(...listData)
    console.log(planData)
    export_json_to_excel(planHeader, planData, excelName);// 导出的表格名称，根据需要自己命名
  })
}
//格式转换，直接复制即可
function formatJson(filterVal, jsonData) {
  return jsonData.map(v => filterVal.map(j => v[j]))
}
