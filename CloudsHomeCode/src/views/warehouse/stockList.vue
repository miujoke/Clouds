<template>
    <el-table
            id="table-column"
            :data="list"
            style="width: 98%">
        <el-table-column
                type="index"
                label=" ">
        </el-table-column>
        <el-table-column
                v-for="(item,index) in tableHead1"
                :key="item.prpo"
                :label="item.label"
                :prop="item.prop">
        </el-table-column>
    </el-table>
</template>
<script>
  export default {
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
          { label:'在途库存', prop:'transport' },
          { label:'可用库存', prop:'available' },
          { label:'已占库存', prop:'occupy' },
          { label:'库存总量', prop:'total' },
        ],

        list:[{}]
      }

    },
    methods:{
    },
    mounted() {
        this.$api.getStockList({},(res)=>{
            this.list=res.data
          console.log(res.data)
        })
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