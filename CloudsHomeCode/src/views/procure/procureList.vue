<template>
    <el-table
            id="table-column"
            :data="list"
            style="width: 98%"
            :row-key='getRowKeys'
            :expand-row-keys="expands"
            @expand-change="expandSelect">
        <el-table-column  type="expand">
            <template slot-scope="props">
                <el-form label-width="100px" label-position="left">
                    <el-row>
                        <el-col :span="8" v-for="(item,id) in tableHead2" :key="id">
                            <el-form-item :label="item.label+':'">
                                {{props.row[`${item.prop}`]}}
                            </el-form-item>
                        </el-col>
                    </el-row>
                </el-form>
            </template>
        </el-table-column>
        <el-table-column
            type="index"
            label="id">
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
    props:['list'],
    data(){
      return{
        tableHead1:[
          //{ label:'物料分类编码', prop:'materialClassificationCode' },
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
          { label:'物料追踪码 ', prop:'materialTrackingCode' },
          { label:'所属需求计划', prop:'planId'},

          { label:'供应方式', prop:'supplyType'},
          { label:'供应数量', prop:'supplyNum'},
          { label:'在途库存', prop:'transport'},
          { label:'可用库存', prop:'available'},
          { label:'已占库存', prop:'occupy'},
          { label:'库存总量', prop:'total'},
          ],
        expands:[],//展开行
        getRowKeys(row) {
          return row.id
        },
      }
    },
    methods:{
      expandSelect(row, expandedRows) {//展开行
        let that=this
        that.tableId()
        if (expandedRows.length) {
          that.expands = []
          if (row) {
            that.expands.push(row.id)// 每次push进去的是每行的ID
          }
        } else {
          that.expands = []// 默认不展开
        }
      },
      tableId(){//给每行增加ID
        for(let i in this.list){
          this.list[i].id=i
        }
      },
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
        .el-form-item{
            margin: 0;
            .el-form-item__label{
                color:#a2a0a0
            }
            .el-form-item__content{
                color:#252121
            }
        }
    }
</style>