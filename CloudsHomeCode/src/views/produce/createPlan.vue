<template>
        <el-form :model="createForm" :rules="rules" ref="createForm" label-width="0" style="width: 100%" class="demo-ruleForm">
            <el-table
                    id="tabless"
                    :data="createTable"
                    style="width: 98%;min-width: 98%"
                    >
                <el-table-column label="计划名称" min-width="150">
                    <template slot-scope="scope">
                        <el-form-item >
                            <el-input placeholder="请输入计划名称" v-model="createForm.planName"></el-input>
                        </el-form-item>
                    </template>
                </el-table-column>

                <el-table-column label="需求部门" min-width="150">
                    <template slot-scope="scope">
                        <el-form-item >
                            <el-select v-model="createForm.needDepartment" placeholder="请选择">
                                <el-option
                                        v-for="item in options"
                                        :key="item"
                                        :value="item"
                                >
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </template>
                </el-table-column>

                <el-table-column label="需求人" min-width="150">
                    <template slot-scope="scope">
                        <el-form-item prop="needPeoName" >
                            <el-select :disabled="createForm.needDepartment===''" v-model="createForm.needPeoName" placeholder="请选择">
                                <el-option
                                        v-for="item in person"
                                        :key="item"
                                        :value="item">
                                </el-option>
                            </el-select>
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


                <el-table-column label="需求计划月份/年" min-width="150">
                    <template slot-scope="scope">
                        <el-form-item prop="planMonth" >
                            <el-date-picker
                                    :disabled="createForm.planType===''"
                                    v-model="createForm.planMonth"
                                    :type="createForm.planType==='2'?'year':'month'"
                                    value-format="timestamp"
                                    @change="getTime(createForm.planMonth,createForm.planType)"
                                    placeholder="选择日期">
                            </el-date-picker>
                        </el-form-item>
                    </template>
                </el-table-column>
                <el-table-column label="需求类型" min-width="150">
                    <template slot-scope="scope">
                        <el-form-item prop="needType" >
                            <el-select :disabled="createForm.planType===''" v-model="createForm.needType" placeholder="请选择">
                                <el-option
                                        v-for="item in needTypeTable"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value"
                                        :disabled="item.disabled"
                                >
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
    name: "createPlan",
    props:['plan'],
    data(){
      return{
        change:false,//是否需要保存
        createTable:[{}],
        createForm:{
          planName:'',
          planType:'',
          needDepartment:'',
          needPeoName:'',
          planMonth:'',
          needType:'',
          planId:'',
          clickTime:0//转换后的时间
        },
        rules: {
          planName: [{ required: true, message: '请输入需求计划名称', trigger: 'blur' }],
          planType: [{ required: true, message: '请选择需求计划类型', trigger: 'blur' }],
          needDepartment: [{ required: true, message: '请选择需求部门', trigger: 'blur' }],
          needPeoName: [{ required: true, message: '请选择需求人', trigger: 'blur' }],
          planMonth: [{ required: true, message: '请选择日期', trigger: 'blur' }],
          needType: [{ required: true, message: '请选择需求类型', trigger: 'blur' }],
        },
        options:["财务部","组织部","人事部","策划部", "仓库"],
        person:['李一','小王','Tony','sony'],
        planTypeTable: [
          { value: '1', label: '月计划' },
          { value: '2', label: '年计划' },
          { value: '3', label: '紧急计划' }],
        needTypeTable: [
          { value: '1', label: '订单型', disabled: localStorage.getItem('grade') !== this.$constData.grade.produce},
          { value: '2', label: '非订单型', disabled: localStorage.getItem('grade') !== this.$constData.grade.options },
          { value: '3', label: '紧急型' }],
      }
    },
    methods: {
      submitForm() {  //创建按钮
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            //console.log(this.createForm)
            this.createMaterialPlan()
          } else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
            return false;
          }
        })
      },
      createMaterialPlan(){
        this.createForm.planId=new Date().getTime()
        let cnt=JSON.parse(JSON.stringify(this.createForm))
        cnt.planMonth=this.createForm.clickTime
        this.$api.createMaterialPlan(cnt,(res)=>{//创建计划
          if(res){
            //console.log(res)
            this.$message({type:'success',message:"创建成功"})
            let planId=cnt.planId
            this.$emit('createPlan',planId)
            this.$api.createMaterialPlanChangeState({planId},(changeState)=>{//创建修改状态表
            })
            let c={}
            c.planId=planId
            c.createTime=planId
            c.create=this.$getName()
            this.$api.createMaterialPlanState(c,(planState)=>{//创建审核状态表
            })
          }
        })
      },
      tips(){//是否保存
        return this.change
      },
      preservation(){
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$message({type:"success",message:"保存计划成功"})
            sessionStorage.setItem('createForm',JSON.stringify(this.createForm))
            this.change=false
          }else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
          }
        })
      },
      getTime(d,type){
        let date =new Date(d)
        let Y =date.getFullYear()
        let M =date.getMonth()+1
        if(type==='2'){

          this.createForm.clickTime= Y
        }
        else{
          if(M.toString().length===1){
            this.createForm.clickTime= parseInt(Y+'0'+M)
          }
          else{
            this.createForm.clickTime= parseInt(Y+''+M)
          }

        }
        console.log(this.clickTime)
        this.$emit('mon',this.clickTime)//传给创建listDraw页面
      },
      updateTable(){
        let cnt=this.createForm
        this.$api.updateMaterialPlan(cnt,(res)=>{
            if(res){
              let c={
                create:this.$getName(),
                planId:cnt.planId,
                createTime:new Date().getTime()
              }
              this.$api.createMaterialPlanState(c,(res)=>{

              })
            }
        })
      }

    },
    mounted(){
      let createForm=sessionStorage.getItem('createForm')
      if(this.plan!==''&&this.plan!=null){
        this.change=false
        this.createForm=this.plan
      }
      else if(createForm!==''&&createForm!==null){
        this.change=false
        this.createForm=JSON.parse(createForm)
      }
    },
    watch:{
      createForm(val){
          this.change=false
      }
    }
  }
</script>

<style scoped lang="scss">
    #tabless{
        .el-input{
            width: 80% ;
        }
        .el-select{
            width: 80%;
        }
    }
</style>