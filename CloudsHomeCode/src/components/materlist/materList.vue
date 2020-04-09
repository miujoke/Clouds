<template>
    <el-table
            id="table-column"
            :data="list"
            style="width: 98%">
        <el-table-column
            type="index"
            label=" ">
        </el-table-column>
        <el-table-column label="物料清单" header-align="center" style="text-align: center" min-width="1000">
                <template slot-scope="scope" >
                    <el-table
                            v-if="scope"
                            :data="[scope.row]"
                            align="center"
                            style="width: 98%">
                        <el-table-column
                                v-for="(item,index) in tableHead1"
                                :key="item.prpo"
                                :label="item.label"
                                :prop="item.prop">
                        </el-table-column>
                    </el-table>
                    <el-table
                            align="center"
                            :data="[scope.row]"
                            style="width: 98%">
                        <el-table-column
                                v-for="(item,index) in tableHead2"
                                :key="item.prpo"
                                :label="item.label"
                                :prop="item.prop">
                        </el-table-column>
                    </el-table>
                </template>
        </el-table-column>
    </el-table>
</template>
<script>
  export default {
    name: "meterList",
    props:['list'],
    data(){
      return{
        tableHead1:[
          { label:'物料分类编码', prop:'materialClassificationCode' },
          { label:'物料分类名称', prop:'materialClassificationName' },
          { label:'物料编码', prop:'materialCode' },
          { label:'物料名称', prop:'materialName' },
          { label:'规格', prop:'specifications' },
          { label:'型号', prop:'model' },
          { label:'单位', prop:'company' },
          { label:'需求数量', prop:'demandQuantity' },],
        tableHead2:[
          { label:'需求月份', prop:'demandMonth' },
          { label:'需求日期', prop:'demandDate' },
          { label:'货源是否稳定', prop:'source' },
          { label:'期望供应商', prop:'expectedSupplier' },
          { label:'固定供应商', prop:'fixedSupplier' },
          { label:'备注', prop:'remarks' },
          { label:'物料追踪码 ', prop:'materialTrackingCode' },
          { label:'需求库存组织', prop:'demandOrganization' }]
      }
    },
    methods:{
    },
    mounted() {

    },
    create(){


    }

  };
</script>

<style scope  lang="scss">
    #table-column{
        .el-table td{
            padding: 2px 0 !important;
    }
     .el-table th{
        padding: 2px 0 !important;
    }
        .el-table::before{
            height: 0 !important;
            width: 0  !important;
            background-color:#ffffff !important;
        }
        .el-table--border::after, .el-table--group::after, .el-table::before{
            height:0 !important;
            background-color:#ffffff !important;
            width: 0  !important;
        }
        .el-table--border td,
        .el-table--border tr
        .el-table--border th {
            border: 0;
        }
        .el-table td, .el-table th.is-leaf{
            border:0
        }
    }
</style>