<template>
    <div style="width: 90%;margin-left: 5%">
        <el-row :gutter="20">
            <el-col :span="3">
                <el-input v-model="selectForm.planName" placeholder="输入计划名称"></el-input>
            </el-col>
            <el-col :span="3">
                <el-input v-model="selectForm.planId" placeholder="输入计划编号"></el-input>
            </el-col>
            <el-col :span="3">
                <el-select v-model="selectForm.planType" placeholder="请选择计划类型">
                    <el-option v-for="item in planTypeTable" :key="item.value" :label="item.label" :value="item.value"></el-option>
                </el-select>
            </el-col>
            <el-col :span="3">
                <el-select v-model="selectForm.needDepartment" placeholder="请选择需求部门">
                    <el-option v-for="item in options" :key="item" :value="item"></el-option>
                </el-select>
            </el-col>
            <el-col :span="3">
                <el-date-picker v-model="selectForm.planMonth" @change="month=''" type="year" format="yyyy年" value-format="yyyy" placeholder="选择年"></el-date-picker>
            </el-col>
            <el-col :span="3">
                <el-select v-model="month"  placeholder="请选择月份" :disabled="selectForm.planMonth===''">
                    <el-option v-for="item in 12" :key="item" :value="item"></el-option>
                </el-select>
            </el-col>
        </el-row>
    </div>
</template>

<script>
  export default {
    name:'selectMaterialPlan',
    data(){
      return{
        selectForm:{
          planName:'',
          planId:'',
          planType:'',
          needDepartment:"",
          planMonth:'',
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
      selectMaterialPlan(cnt){
        let arr=JSON.parse(JSON.stringify(this.selectForm))
        cnt.planName=arr.planName===''?'0':arr.planName
        cnt.planId=arr.planId===''?0:parseInt(arr.planId)
        cnt.planType=arr.planType===''?'0':arr.planType
        cnt.needDepartment=arr.needDepartment===''?'0':arr.needDepartment
        console.log(cnt)
        this.$api.selectMaterialPlan(cnt,(res)=>{
          this.$emit('select',res.data)
        })
      },
      getMaterialPlan(cnt){
        this.$api.getMaterialPlan(cnt,(res)=>{
          console.log(res.data)
          this.$emit('select',res.data)
        })
      },
      getPlan(cnt){
        if(this.change){
          console.log('select')
          this.selectMaterialPlan(cnt)
        }else{
          console.log('get')
          this.getMaterialPlan(cnt)
        }
      }
    },
    watch:{
      select(val,old){
        if(val.planName!==''&&
          val.planId!==''&&
          val.planType!==''&&
          val.needDepartment!==''&&
          val.planMonth!==''){
          this.change=true
          let cnt=this.cnt
          cnt.planMonth=this.selectForm.planMonth===''?0:parseInt(this.selectForm.planMonth)
          this.selectMaterialPlan(cnt)
        }else{
          let cnt=this.cnt
          console.log(cnt)
          this.getMaterialPlan(cnt)
        }
        this.$emit('change')
      },
      month(val){
        let cnt=this.cnt
        console.log(val.toString().length)
        if(val.toString().length<2){
          cnt.planMonth=parseInt(this.selectForm.planMonth+'0'+val)
        }else{
          cnt.planMonth=parseInt(this.selectForm.planMonth+''+val)
        }


        this.selectMaterialPlan(this.cnt)
        this.$emit('change')
        console.log(cnt)
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