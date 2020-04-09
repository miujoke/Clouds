<template>
    <div>
        <div>
            <el-select v-model="view" placeholder="分类查看">
                <el-option
                        v-for="item in classifiedView"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                </el-option>
            </el-select>
        </div>
        <el-table :data="tableData" style="width: 98%;margin-left: 1%">
            <el-table-column>
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
            <el-table-column
                    v-for="item in tableHead"
                    :key="item.prop"
                    :label="item.label"
                    :prop="item.prop">
            </el-table-column>
        </el-table>
            <nextPage ref="nextPage" @next="nextPage"></nextPage><br><br><br>
        <div style="float:right;margin-right: 5%" v-if="view===1">
            <el-button type="success"  @click="open('2')" :disabled="oneCheck===[]">审批通过</el-button>
            <el-button type="warning"  @click="open('3')" :disabled="oneCheck===[]">审批退回</el-button>
        </div>

    </div>
</template>

<script>

  export default {
    data() {
      return {
        isIndeterminate: false,
        checkAll: false,//全选
        oneCheck:[],//选了什么
        view:1,
        classifiedView:[    //Classified view分类查看
          { label:'待审批需求计划',value:1 },
          { label:'已审批需求计划',value:2 },
        ],
        tableData:[],
        tableHead:[
          { label:'需求计划编号', prop:'procureId' },
          { label:'需求计划名称', prop:'procureName' },
          { label:'需求计划类型', prop:'planType' },
          { label:'审批状态', prop:'approvalState' },
          { label:'制单人', prop:'create' },
          { label:'制单时间', prop:'createTime' },
         ],
      }
    },
    methods: {
      updateApprovalPlanNeed(cnt){
        this.$api.updateApprovalProcureNeed(cnt,(res)=>{
          if(res.data){
            this.$message({
              type: 'success',
              message: '审批成功 '
            });
            let cnt={
              offset:0,
              count:10,
              headState:localStorage.getItem('grade') === this.$constData.grade.finance?'2':(this.view===1?'is null':'is not null'),
              approvalState:'4',
              needState:localStorage.getItem('grade') === this.$constData.grade.finance?(this.view===1?'is null':'is not null'):'',
            }
            this.getApprovalProcure(cnt)
          }
        })
      },
      updateApprovalPlanHead(cnt){
        this.$api.updateApprovalProcureHead(cnt,(res)=>{
          console.log(res)
          if(res.data){
            this.$message({
              type: 'success',
              message: '审批成功 '
            });
            let cnt={
              offset:0,
              count:10,
              headState:localStorage.getItem('grade') === this.$constData.grade.finance?'2':(this.view===1?'is null':'is not null'),
              approvalState:'4',
              needState:localStorage.getItem('grade') === this.$constData.grade.finance?(this.view===1?'is null':'is not null'):'',
            }
            this.getApprovalProcure(cnt)
          }

        })
      },
      open(state) {
        let arr=[]
        this.oneCheck.forEach((val,id)=>{
            if(val===true) arr.push(id)
        })
        console.log(arr)
        this.$prompt('请在下方填写','审批意见', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
        }).then((remarks) => {
          arr.forEach((item)=>{
            if(state==='3'){
              let s={
                planId:this.tableData[item].planId,
                approvalState:'3',
                planState:'4'
              }
              this.$api.changeState(s,(res)=>{
              })
            }
              let cnt={
                procureId:this.tableData[item].procureId,
                approvalState:localStorage.getItem('grade') === this.$constData.grade.finance?(state==='2'?'2':'3'):(state==='2'?'4':'3')
              }
              if(localStorage.getItem('grade') === this.$constData.grade.finance){//需求计划员审核
                cnt.approvalNeed="需求计划员"
                cnt.approvalNeedTime=Date.now()
                cnt.approvalNeedRemarks=remarks.value
                cnt.needState=state
                this.updateApprovalPlanNeed(cnt)
              }else{
                cnt.approvalHead="部门主管"
                cnt.approvalHeadTime=Date.now()
                cnt.approvalHeadRemarks=remarks.value
                cnt.headState=state
                this.updateApprovalPlanHead(cnt)////主管审核
              }
          })
        }).catch(() => {
          this.$message({
            type: 'info',
            message: '取消审批'
          });
        });
      },
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
      nextPage(cnt){
        cnt.headState=localStorage.getItem('grade') === this.$constData.grade.finance?'2':(this.view===1?'is null':'is not null')
        cnt.approvalState='4'
        cnt.needState=localStorage.getItem('grade') === this.$constData.grade.finance?(this.view===1?'is null':'is not null'):''
        this.getApprovalPlan(cnt)
      },
      getApprovalProcure(cnt){
        this.$api.getApprovalProcure(cnt,(res)=>{
          this.tableData=res.data
          this.$refs.nextPage.judge(res.data.length)
          for(let i=0;i<res.data.length;i++){
            this.oneCheck[i]=false
          }
        })
      }
    },
    mounted() {
      let cnt={
        offset:0,
        count:10,
        headState:localStorage.getItem('grade') === this.$constData.grade.finance?'2':(this.view===1?'is null':'is not null'),
        approvalState:'4',
        needState:localStorage.getItem('grade') === this.$constData.grade.finance?(this.view===1?'is null':'is not null'):'',
      }
      this.getApprovalProcure(cnt)
    },
    watch:{
      view(){
        let cnt={
          offset:0,
          count:10,
          headState:localStorage.getItem('grade') === this.$constData.grade.finance?"2":(this.view===1?'is null':'is not null'),
          approvalState:'4',
          needState:localStorage.getItem('grade') === this.$constData.grade.finance?(this.view===1?'is null':'is not null'):'',
        }
        this.getApprovalProcure(cnt)
      }
    }
  }
</script>