<template>
    <div style="width: 90%;margin-left: 5%">
        <el-row :gutter="20">
            <el-col :span="3">
                <el-input v-model="selectForm.procureName" placeholder="输入计划名称"></el-input>
            </el-col>
            <el-col :span="3">
                <el-input v-model="selectForm.procureId" placeholder="输入计划编号"></el-input>
            </el-col>
            <el-col :span="3">
                <el-select v-model="selectForm.planType" placeholder="请选择计划类型">
                    <el-option v-for="item in planTypeTable" :key="item.value" :label="item.label" :value="item.value"></el-option>
                </el-select>
            </el-col>
        </el-row>
    </div>
</template>

<script>
  export default {
    name: "selectProcure",
    data(){
      return{
        selectForm:{
          procureName:'',
          procureId:'',
          planType:'',
        },
        month:"",
        planTypeTable: [
          { value: '1', label: '月计划' },
          { value: '2', label: '年计划' },
          { value: '3', label: '紧急计划' }],
        options:["财务部","组织部","人事部","策划部", "仓库"],
        change:false,
        cnt:{
          offset:0,
          count:10
        }
      }
    },
    methods:{
      selectProcurePlan(cnt){
        let arr=JSON.parse(JSON.stringify(this.selectForm))
        cnt.procureName=arr.procureName===''?'0':arr.procureName
        cnt.procureId =arr.procureId===''?0:parseInt(arr.procureId)
        cnt.planType=arr.planType===''?'0':arr.planType
        console.log(cnt)
        this.$api.selectProcurePlan(cnt,(res)=>{
          this.$emit('select',res.data)
        })
      },
      getProcurePlan(cnt){
        this.$api.getProcurePlan(cnt,(res)=>{
          console.log(res.data)
          this.$emit('select',res.data)
        })
      },
      getPlan(cnt){
        if(this.change){
          console.log('select')
          this.selectProcurePlan(cnt)
        }else{
          console.log('get')
          this.getProcurePlan(cnt)
        }
      }
    },
    watch:{
      select(val,old){
        if(val.procureName!==''&&
          val.procureId!==''&&
          val.planType!==''){
          this.change=true
          let cnt=this.cnt
          this.selectProcurePlan(cnt)
        }else{
          let cnt=this.cnt
          console.log(cnt)
          this.getMaterialPlan(cnt)
        }
        this.$emit('change')
      },
      deep:true
    },
    computed: {
      select() {
        return JSON.stringify(this.selectForm)
      }
    },
  };
</script>

<style scoped>

</style>