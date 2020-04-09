<template>
            <el-table
                    id="table-column"
                    :data="list"
                    style="width: 98%">
                <el-table-column width="70">
                    <template  slot="header" slot-scope="scope">
                        <el-checkbox
                                :indeterminate="isIndeterminate"
                                @change="checkall"
                                v-model="checkAll">全选
                        </el-checkbox>
                    </template>
                    <template  slot-scope="scope">
                        <el-checkbox
                                @change="handleCheckedChange(oneCheck)"
                                v-model="oneCheck[scope.$index]">
                        </el-checkbox>
                    </template>
                </el-table-column>
                <el-table-column type="expand">
                    <template slot-scope="props">
                        <el-table
                                :data="[props.row]">
                            <el-table-column
                                    v-for="(item,index) in tableHead2"
                                    :key="item.prpo"
                                    :label="item.label"
                                    :prop="item.prop">
                            </el-table-column>
                        </el-table>
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
          { label:'需求库存组织', prop:'demandOrganization' }],
        checkAll:false,
        isIndeterminate:false,
        oneCheck:[]
      }
    },
    methods:{
      handleCheckedChange(value) {

        this.checkAll = value.every((val)=>{ //遍历全选情况，判断是否已经全选
          return val===true
        })

        //如果至少选择一个不全选，出现一横情况
        let checkNum=value.filter((val)=>{
          return val===true
        })
        this.isIndeterminate =  checkNum.length>0&&checkNum.length<value.length
      },
      checkall(value){
        if(value===true) this.isIndeterminate=false
        //点击全选
        let arr=[]
        this.oneCheck.forEach((val,id)=>{
          arr[id]=value
        })
        this.oneCheck=arr
        console.log(this.oneCheck)
      },
      add(){
        let arr=[]
        let callArr=[]
        this.oneCheck.forEach((val,id)=>{
          if(val===true) arr.push(id)
        })
        arr.forEach((val)=>{
          callArr.push(this.list[val])
        })
        return callArr  //返回选中的行
      }
    },
    mounted() {

    },
    computed:{
        lis(){
          return JSON.parse(JSON.stringify(this.list))
      }
    },
    watch:{
      lis(){
        for(let i=0;i<this.list.length;i++){
          this.oneCheck[i]=false
        }
      }
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