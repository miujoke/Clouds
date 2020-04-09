/*左侧导航栏菜单生成的内容*/

const home="el-icon-s-home"
const wuzi="物资需求计划"

const createPlan="icon-ail-chuangjiangongdan"
const approval="icon-ail-shenhe"
const procure="icon-ail-caigou"
const need="icon-ail-tubiao_xuqiu"
const huizong="icon-ail-navicon-qghztj"

//生产计划员
const  produceMenu =[
    {
        path:'/produceHome',
        title:wuzi,
        icon:need,
        child:[]
    },
    {
        path:'/createMaterial',
        title:'新建需求计划',
        icon:createPlan,
        child:[]
    },
    // {
    //     path:'/reportForm',
    //     title:'物资需求汇总表',
    //     icon:huizong,
    //     child:[]
    // },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },

]

//生产主管
const  produceHeadMenu =[
    {
        path:'/produceHome',
        title:wuzi,
        icon:need,
        child:[]
    },
    {
        path:'/approvalPlan',
        title:'审核物资计划',
        icon:approval,
        child:[]
    },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },
]

//需求计划员
const  demandMenu =[
    {
        path:'/produceHome',
        title:wuzi,
        icon:need,
        child:[]
    },
    {
        path:'/reportForm',
        title:'物资需求汇总表',
        icon:huizong,
        child:[]
    },
    {
        path:'/approvalPlan',
        title:'审核物资计划',
        icon:approval,
        child:[]
    },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },

]

//部门需求计划员
const  departmentMenu =[
    {
        path:'/produceHome',
        title:wuzi,
        icon:need,
        child:[]
    },
    {
        path:'/createMaterial',
        title:'新建需求计划',
        icon:createPlan,
        child:[]
    },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },
]

//部门主管
const  departmentHeadMenu =[
    {
        path:'/produceHome',
        title:wuzi,
        icon:need,
        child:[]
    },
    {
        path:'/approvalPlan',
        title:'审核物资计划',
        icon:approval,
        child:[]
    },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },
]


//采购计划员
const  procureMenu =[
    // {
    //     path:'/produceHome',
    //     title:wuzi,
    //     icon:need,
    //     child:[]
    // },
    {
        path:'/procurePlan',
        title:'采购计划',
        icon:procure,
        child:[]
    },
    {
        path:'/createProcurePlan',
        title:'创建采购计划',
        icon:createPlan,
        child:[]
    },

]
//采购主管
const  procureHeadMenu =[
    // {
    //     path:'/produceHome',
    //     title:wuzi,
    //     icon:need,
    //     child:[]
    // },
    {
        path:'/procurePlan',
        title:'采购计划',
        icon:procure,
        child:[]
    },
    {
        path:'/procureApp',
        title:'审核采购计划',
        icon:home,
        child:[]
    },
]
//财务
const  financeMenu =[
    // {
    //     path:'/produceHome',
    //     title:wuzi,
    //     icon:need,
    //     child:[]
    // },
    {
        path:'/procurePlan',
        title:'采购计划',
        icon:procure,
        child:[]
    },
    {
        path:'/procureApp',
        title:'审核采购计划',
        icon:approval,
        child:[]
    },
]
//仓库 warehouse
const  warehouseMenu =[
    // {
    //     path:'/produceHome',
    //     title:wuzi,
    //     icon:need,
    //     child:[]
    // },
    // {
    //     path:'/procurePlan',
    //     title:'采购计划',
    //     icon:procure,
    //     child:[]
    // },
    {
        path:'/stockList',
        title:'物资清单',
        icon:huizong,
        child:[]
    },
    {
        path:'/createStockList',
        title:'创建物品',
        icon:createPlan,
        child:[]
    },

]

export default {
    produceMenu,
    produceHeadMenu,
    demandMenu,
    departmentMenu,
    departmentHeadMenu,
    procureMenu,
    procureHeadMenu,
    financeMenu,
    warehouseMenu
}
