<template>
    <el-form :model="createForm" :rules="rules" ref="createForm" label-width="0" style="width: 60%" class="demo-ruleForm">
        <el-table
                id="tabless"
                :data="createTable"
                style="width: 98%;min-width: 98%"
        >
            <el-table-column label="计划名称" min-width="150">
                <template slot-scope="scope">
                    <el-form-item >
                        <el-input placeholder="请输入计划名称" v-model="createForm.procureName"></el-input>
                    </el-form-item>
                </template>
            </el-table-column>


            <el-table-column label="采购时间" min-width="150">
                <template slot-scope="scope">
                    <el-form-item prop="planMonth" >
                        <el-date-picker
                                type="date"
                                v-model="createForm.procureTime"
                                format="yyyy 年 MM 月 dd 日"
                                value-format="yyyyMMdd"
                                placeholder="选择日期">
                        </el-date-picker>
                    </el-form-item>
                </template>
            </el-table-column>
            <el-table-column label="计划类型" min-width="150">
                <template slot-scope="scope">
                    <el-form-item prop="planType" >
                        <el-select v-model="createForm.planType" placeholder="请选择">
                            <el-option
                                    v-for="item in planTypeTable"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </template>
            </el-table-column>
        </el-table>
    </el-form>
</template>

<script>
  export default {
    name: "plan",
    props:['plan'],
    data(){
      return{
        change:false,
        createTable:[{}],
        createForm:{
          procureName:'',
          planType:'',
          procureTime:'',
        },
        rules: {
          procureName: [{ required: true, message: '请输入需求计划名称', trigger: 'blur' }],
          planType: [{ required: true, message: '请选择需求计划类型', trigger: 'blur' }],
          procureTime: [{ required: true, message: '请选择日期', trigger: 'blur' }],
        },
        options:["财务部","组织部","人事部","策划部", "仓库"],
        person:['李一','小王','Tony','sony'],
        planTypeTable: [
          { value: '1', label: '月计划' },
          { value: '2', label: '年计划' },
          { value: '3', label: '紧急计划' }],
      }
    },
    methods:{
      tips(){//是否保存
        return this.change
      },
      submitForm() {  //创建按钮
        console.log(this.createForm)
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            console.log(this.createForm)
            this.createPlan()
          } else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
            return false;
          }
        })
      },
      preservation(){
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$message({type:"success",message:"保存计划成功"})
            sessionStorage.setItem('createProcurePlan',JSON.stringify(this.createForm))
            this.change=false
          }else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
          }
        })
      },
      updateTable(){
        let cnt=this.createForm
        this.$api.updateProcurePlan(cnt,(res)=>{
          if(res){
            let c={
              create:this.$getName,
              procureId :cnt.procureId ,
              createTime:new Date().getTime()
            }
            this.$api.createMaterialPlanState(c,(res)=>{

            })
          }
        })
      },
      createPlan(){
        let cnt=this.createForm
        cnt.create=this.$getName()
        cnt.createTime=Date.now()
        cnt.procureId=Date.now()
        this.$api.createProcurePlan(cnt,(res)=>{
          this.$api.createProcurePlanState(cnt,(res)=>{
          })
          this.$emit('createList',cnt.procureId)
        })
      }
    },
    computed:{
      form(){
        return JSON.parse(JSON.stringify(this.createForm))
      }
    },
    watch:{
      form(){
        this.change=true
      }
    },
    mounted() {
        let createForm=sessionStorage.getItem('createProcurePlan')
        if(this.plan!==''&&this.plan!=null){
          this.change=false
          this.createForm=this.plan
        }
        else if(createForm!==''&&createForm!==null){
          this.change=false
          this.createForm=JSON.parse(createForm)
      }

    }
  };
</script>

<style scoped>

</style>