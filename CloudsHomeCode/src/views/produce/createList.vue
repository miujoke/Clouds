<template>
    <div>
        <el-table
            stripe
            id="table-column"
            :data="tableData"
            v-if="newTable"
            style="width: 98%;margin: 30px 0">
        <el-table-column
                type="index"
                label=" ">
        </el-table-column>
        <el-table-column label="填写物料清单" header-align="center" >
            <template slot-scope="scope" >
                <el-table
                        v-if="scope"
                        :data="[scope.row]"
                        style="width: 98%">
                    <el-table-column
                            v-for="(item,index) in tableHead1"
                            :key="item.prpo"
                            :label="item.label"
                            :prop="item.prop">
                    </el-table-column>
                </el-table>
                <el-table
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
        <el-table-column width="70">
            <template slot-scope="scope">
                <el-button type="text" class="el-icon-edit" @click="$refs.listDrawer.updateDrawer(scope.row,scope.$index)"></el-button>
                <el-button type="text" style="color: red"   @click="tableData.splice(scope.$index,1)" class="el-icon-delete"></el-button>
            </template>

        </el-table-column>
    </el-table>
        <listDrawer ref="listDrawer"  @add="addTableDate" @update="updateTableData" />
        <el-button type="primary" style="float: right;margin: 0 5% 50px 0" icon="el-icon-plus" @click="$refs.listDrawer.openDrawer()" circle></el-button>
    </div>
</template>
<script>
    import listDrawer from "./listDrawer"
  export default {
    name: "createList",
    props:['mon','list'],
    data(){
      return{
        newTable:true,//刷新表格
        change:false,
        tableData:[],
        tableHead1:[
          { label:'物料分类编码', prop:'materialClassificationCode' },
          { label:'物料分类名称', prop:'materialClassificationName' },
          { label:'物料编码', prop:'materialCode' },
          { label:'物料名称', prop:'materialName' },
          { label:'型号', prop:'model' },
          { label:'规格', prop:'specifications' },
          { label:'单位', prop:'company' },
          { label:'需求数量', prop:'demandQuantity' },],
        tableHead2:[
          { label:'需求月份', prop:'demandMonth' },
          { label:'需求日期', prop:'demandDate' },
          { label:'货源是否稳定', prop:'source' },
          { label:'期望供应商', prop:'expectedSupplier' },
          { label:'固定供应商', prop:'fixedSupplier' },
          //{ label:'物料追踪码 ', prop:'materialTrackingCode' },
          { label:'需求库存组织', prop:'demandOrganization' },
          { label:'备注', prop:'remarks' },
          { label:'', prop:'' },]
      }
    },
    methods:{
      submitForm() {  //创建按钮
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            console.log(this.createForm)
            this.createMaterialPlan()
          } else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
            return false;
          }
        })
      },
      tips(){//点击保存
        return this.change
      },
      preservation(){//保存
        this.change=false
        sessionStorage.setItem('createList',JSON.stringify(this.tableData))
      },
      createList(planId){
        console.log(planId)
        for(let item in this.tableData){
          let cnt=this.tableData[item]
          cnt.planId=planId
          cnt.materialTrackingCode=planId+cnt.cascader[0]+cnt.cascader[1]
          cnt.cascader=this.tableData[item].cascader.toString()
          cnt.demandMonth=planId
          console.log(cnt)
          this.$api.createMetarialList(cnt,(res)=>{
          })
        }
      },
      addTableDate(val){//添加一行
        let v=JSON.parse(JSON.stringify(val))
        v.demandMonth=this.mon
        this.tableData.push(v)//防止指针混乱
      },
      updateTableData(val,id){

        console.log(val,id)
        this.tableData.splice(id,1)
        this.tableData.splice(id,0,JSON.parse(JSON.stringify(val)))
        console.log(this.tableData)
        this.newTable=false
        this.newTable=true
      }
    },
    mounted(){
      let createList=sessionStorage.getItem('createList')
      if(this.list!==''&&this.list!=null){
        this.change=false
        this.tableData=this.list
        console.log(this.list+"list")
      }
      else if(createList!==''&&createList!==null){
        this.change=false
        this.tableData=JSON.parse(createList)
      }
    },
    components:{
      listDrawer
    },
    watch:{
      tableData(val){
        if(this.val==[]){
          console.log(val)
          this.change=false
        }
      }
    }
  };
</script>

<style scope lang="scss">
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