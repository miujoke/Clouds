<template>
    <div id="create">

        <el-button round type="warning" @click="confirm" v-if="update==='updates'" class="el-icon-edit"> 修 改</el-button>
        <el-button round type="primary" @click="createTable" v-else class="el-icon-plus" :disabled="createT"> 创 建</el-button>
        <el-button round type="success" @click="preservation" class="el-icon-mobile"> 保 存 </el-button><br><br>
        <title-text  text="新建物资需求计划" weight="600" color="#636569" style="margin-bottom: 20px" v-if="update!=='updates'" />
        <title-text  text="修改物资需求计划" weight="600" color="#636569" style="margin-bottom: 20px" v-else />
        <createPlan :plan="plan" ref="createPlan" @createPlan="useCreateList" @mon="getMon" />
        <createList :list="list" ref="createList" :mon="mon" />
        <mydialog ref="mydialog" @dialog="updateTable" message="确认修改物资计划"></mydialog>
    </div>
</template>

<script>
    import createPlan from "./createPlan"
    import createList from "./createList"
  export default {
    name: "createMaterial",
    props:['update','list','plan'],
    components:{
      createPlan,createList
    },
    methods:{
      createTable(){
        this.createT=!this.createT
        this.$message({type:'info',message:'二秒后可继续创建'})
        setTimeout(()=>{
          this.createT=!this.createT
        },2000)

        this.$refs.createPlan.submitForm()
      },
      updateTable(state){//确认是否修改
        if(state===true) this.$refs.createPlan.updateTable()
      },
      confirm(){//修改之前的确认
        this.$refs.mydialog.openDia()
      },
      preservation(){//保存已经填写的信息
        this.$refs.createPlan.preservation()
        this.$refs.createList.preservation()
      },
      useCreateList(planId){//使用list页面createList
        this.$refs.createList.createList(planId)
      },
      getMon(val){
        this.mon=val
      }
    },
    data(){
      return {
        mon:0,
        createT:false
      }
    },
    mounted(){
      if(this.plan&&this.plan!==''){
        let cnt={
          planId:this.plan.planId
        }
        this.$api.getMetarialList(cnt,(res)=>{
          this.list=res.data
        })
      }
    },

    beforeRouteLeave(to, form, next) {  //离开当前页面
      let createList=this.$refs.createList.tips()
      let createPlan =this.$refs.createPlan.tips()
      if(createList||createPlan){
        this.$message({type:"warning",message:"请保存"})
        sessionStorage.setItem('navDefaultActive','1')
        this.$store.state.navDefaultActive = '1'
      }
      else{
        next()
      }
    }
  };
</script>

<style scoped lang="scss">
    #create{
        width: 100%;
        .el-button{
            width: 100px;
            float: right;
            margin-right: 5%
        }
    }
</style>