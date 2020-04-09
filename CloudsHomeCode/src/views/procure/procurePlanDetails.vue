<template>
    <div>
        <el-button @click="dialogVisible = true" type="warning" class="icon-ail-biaoge-xiazai" style="float: right;margin-right: 5%" round> 导 出</el-button><br><br>
        <procePlan   :operation="false" :table-data="plan"></procePlan>
        <div style="text-align: center;margin: 20px auto 10px;color:#909399;font-weight: 600;font-size: 14px">物品清单</div>
        <list style="width: 98%;margin-left: 1%" :list="list"></list>


        <el-dialog
                title="导出采购计划"
                :visible.sync="dialogVisible"
                width="30%">
            <el-input v-model="excelName" placeholder="请输入文件名"></el-input>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">取 消</el-button>
                <el-button type="primary" :disabled="excelName===''" @click="down">下 载</el-button>
          </span>
        </el-dialog>
    </div>
</template>

<script>
  import download from "./export"

  import procePlan from "./plan"
  import list from "./procureList"
  export default {
    name: "materialList",
    components:{
      procePlan,list
    },
    data(){
      return{
        list:[{total:123,procureName:'456',supplyType:'采购',model:'大'},{}],
        plan:[JSON.parse(sessionStorage.getItem('producePlan'))],
        dialogVisible:false,
        excelName:'',
      }
    },
    methods:{
      down(){
        download(this.plan,this.list,this.excelName)
        this.dialogVisible = false
      }
    },
    mounted() {
      let cnt={
        procureId:this.plan[0].procureId
      }
      this.$api.getProcureList(cnt,(res)=>{
        this.list=res.data
      })
    }
  };
</script>

<style scoped>

</style>