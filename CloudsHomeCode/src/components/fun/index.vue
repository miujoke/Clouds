<template>
    <div style="float: right;margin-right: 5%">
        <el-button @click="message" type="success" class="el-icon-more-outline" round> 提 醒</el-button>
        <el-button @click="copy" type="primary"
                   v-if="showCopy"
                   class="icon-ail-copy" round> 复 制</el-button>
        <el-button @click="dialogVisible = true" type="warning" class="icon-ail-biaoge-xiazai" round> 导 出</el-button>

        <el-dialog
                title="导出物料计划"
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
  export default {
    name: "index",
    props:['plan','list'],
    data(){
      return{
        excelName:"",//表格名称
        dialogVisible: false,//打开弹框
      }
    },
    methods:{
      showCopy(){
      return localStorage.getItem('grade') === this.$constData.grade.produce||localStorage.getItem('grade') === this.$constData.grade.department
      },
      message(){
        this.$message({
          type:'warning',
          message:'系统消息提醒，付款提醒和审批提醒两类，点击按钮进入详情界面?'
        })
      },
      down(){
        download(this.plan,this.list,this.excelName)
        this.dialogVisible = false
      },
      copy(){
        console.log(this.plan)
        sessionStorage.setItem('createList',JSON.stringify(this.list))
        sessionStorage.setItem('createForm',JSON.stringify(this.plan[0]))
        sessionStorage.setItem('navDefaultActive','1')
        this.$store.state.navDefaultActive = '1'
        setTimeout(()=>{
          this.$router.push('createMaterial')
        },1)

      }
    },
    mounted(){
      if(this.list==null||this.list===''){
        this.list=[
          {
            materialClassificationCode:'',
            materialClassificationName:'',
            materialCode:'',
            materialName:'',
            specifications:'',
            model:'',
            company:'',
            demandQuantity:'',
            demandMonth:'',
            demandDate:'',
            source:'',
            expectedSupplier:'',
            fixedSupplier:'',
            remarks:'',
            materialTrackingCode:'',
            demandOrganization:'',
            cascader:'',//选择后
          },
        ]
      }
    }
  };
</script>

<style scoped>

</style>