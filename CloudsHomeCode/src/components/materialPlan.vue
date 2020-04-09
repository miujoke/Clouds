<template>
    <div id="materialPlan">

        <el-table
                :row-key='getRowKeys'
                :expand-row-keys="expands"
                @expand-change="expandSelect"
                :data="tableData"
                type="index"
                style="width: 98%;">
            <el-table-column  type="expand">
                <template slot-scope="props">
                    <el-row>
                    <el-col :span="12">
                        <materialPlanState :planId="props.row.planId" />
                    </el-col>
                    <el-col :span="10">
                        <materialPlanChangeState :planId="props.row.planId" />
                    </el-col>
                    </el-row>
                </template>
            </el-table-column>
            <el-table-column label="计划名称" prop="planName"></el-table-column>

            <el-table-column label="编码" prop="planId"></el-table-column>

            <el-table-column label="计划类型" prop="planType" width="80">
                <template slot-scope="props">
                    {{getPlanType(props.row.planType)}}
                </template>

            </el-table-column>
            <el-table-column label="需求计划年/月" prop="planMonth">
            </el-table-column>

            <el-table-column label="需求部门" prop="needDepartment"></el-table-column>

            <el-table-column label="需求人" prop="needPeoName"></el-table-column>

            <el-table-column label="计划状态" prop="planState">
                <template slot-scope="scope">
                    <el-tag
                            :type="getPlanStateType(scope.row.planState)"
                            disable-transitions>{{getPlanState(scope.row.planState)}}</el-tag>
                </template>
            </el-table-column>

            <el-table-column label="审批状态" prop="approvalState">
                <template slot-scope="scope">
                    <el-tag
                            :type="getPlanStateType(scope.row.approvalState)"
                            disable-transitions>{{getApprovalState(scope.row.approvalState)}}</el-tag>
                </template>
            </el-table-column>

            <el-table-column label="需求类型" prop="needType">
                <template slot-scope="props">
                    {{getNeedType(props.row.needType)}}
                </template>
            </el-table-column>

            <el-table-column
                    fixed="right"
                    label="操作"
                    width="120">
                <template slot-scope="scope">
                    <el-button v-if="operation" style="margin-left: 5px" type="text" size="small"  @click="details(scope.row)">
                        打印
                    </el-button>
                    <span v-if="getPower(scope.row)">
                        <el-button style="margin-left: 5px" @click="submitPlan(scope)" v-if="scope.row.approvalState==='1'&&scope.row.planState==='4'" type="text" size="small">
                            提交
                        </el-button>
                        <el-button style="margin-left: 5px" @click="updates(scope.row)" v-if="scope.row.approvalState==='1'||scope.row.approvalState==='3'" type="text" size="small">
                            修改
                        </el-button>
                        <el-button style="margin-left: 5px" type="text" size="small" @click="goBack(scope)" v-if="scope.row.approvalState==='4'">
                            撤回
                        </el-button>
                        <el-button style="margin-left: 5px" type="text" size="small" v-if="scope.row.planState==='4'" @click="deletePlan(scope)">
                            删除
                        </el-button>
                    </span>
                </template>
            </el-table-column>
        </el-table>
    </div>

</template>


<script>
    import materialPlanChangeState from "./materlist/materialPlanChangeState"
    import materialPlanState from "./materlist/materialPlanState"
  export default {
    name: "materialPlan",
    data(){
      return{
        reverse: true,
        expands:[],//展开行
        getRowKeys(row) {
          return row.id
        },
      }
    },
    props:['operation','tableData'],
    methods:{
      approval(tableId,id){
        let item=this.materialPlanState
        if(id>this.approvalCode){
          return ''
        }
        else if(id===0&&item.create!==''){
          return `${this.getTime(item.createTime)}   ${item.create}`
        }else if(id===1&&item.approvalHead!==''){
          return `${this.getTime(item.approvalHeadTime)}   ${item.approvalHead}`
        }else if(id===2&&item.approvalNeed!==''){
            return `${this.getTime(item.approvalNeedTime)}   ${item.approvalNeed}`
        }else if(id===3){
          return ''
        }else{
          this.approvalCode=id
          return '审核中'
        }
      },

      getPlanStateType(id){
        id=parseInt(id)
        let succ="success"
        let info="info"
        let warn="warning"
        let dan="danger"
        if(id===1){return ''}
        else if(id===2){return succ}
        else if(id===3){return warn}
        else if(id===4){return info}
      },
      getPlanState(id){
        id=parseInt(id)
        let succ="已计划"
        let info="已提交汇总"
        let warn="已删除"
        let dan="已自由"
        if(id===1){return succ}
        else if(id===2){return info}
        else if(id===3){return warn}
        else if(id===4){return dan}
      },
      getApprovalState(id){
        id=parseInt(id)
        let succ="未提交"
        let info="审批通过"
        let warn="审批退回"
        let dan="审批中"
        if(id===1){return succ}
        else if(id===2){return info}
        else if(id===3){return warn}
        else if(id===4){return dan}
      },

      expandSelect(row, expandedRows) {//展开行
        this.$store.state.approvalCode=100
        let that=this
        that.tableId()
        if (expandedRows.length) {
          that.expands = []
          if (row) {
            that.expands.push(row.id)// 每次push进去的是每行的ID
          }
        } else {
          that.expands = []// 默认不展开
        }
      },
      tableId(){//给每行增加ID
        for(let i in this.tableData){
          this.tableData[i].id=i
        }
      },

      getPower(row){//编辑权力
        if(row.planState==='3'){
          return false
        }
        if(row.needType==='1'){
          if(localStorage.getItem('grade') === this.$constData.grade.produce){
            return true
          }else return false
        }else if(row.needType==='2'||row.needType==='3'){
          if(localStorage.getItem('grade') === this.$constData.grade.options) {
            return true
          }
          else return false
        }
    },
      details(row){//详情按钮
        sessionStorage.setItem('materialList',JSON.stringify(row))
        this.$router.push({path:"materialList"})
      },
      updates(row){
        sessionStorage.setItem('updateMaterialList',JSON.stringify(row))
        this.$router.push({path:"updateMaterial"})
    },
      getPlanType(id){//获取计划类型
        id=parseInt(id)
        let month="月计划"
        let year="年计划"
        let urgent="紧急计划"
        if(id===1){return month}
        else if(id===2){return year}
        else if(id===3){return urgent}
        else {return ''}
      },
      getNeedType(id){
        id=parseInt(id)
        let month="订单型"
        let year="非订单型"
        let urgent="紧急型"
        if(id===1){return month}
        else if(id===2){return year}
        else if(id===3){return urgent}
        else {return ''}
      },
      getTime(row){
        let date=new Date(JSON.parse(row.planMonth))
        let Y=date.getFullYear()
        let M=date.getMonth()+1
        if(row.planType==='1'||row.planType==='3'){
          return `${Y}-${M}`
        }else{
          return Y
        }
      },
      goBack(scope){//退回  审批中边为未提交
        this.tableData.splice(scope.$index,1)
        let cnt={}
        cnt.planId=scope.row.planId
        cnt.approvalState='1'
        cnt.planState=scope.row.planState

        this.$api.changeState(cnt,(res)=>{
          scope.row.approvalState='1'
          this.tableData.splice(scope.$index,0,scope.row)
          })
      },
      deletePlan(scope){//删除计划
        let cnt={}
        cnt.planId=scope.row.planId
        cnt.approvalState=scope.row.approvalState
        cnt.planState='3'
        this.$api.changeState(cnt,(res)=>{
          scope.row.planState='4'
          this.tableData[scope.$index].planState='3'
        })
      },
      submitPlan(scope){
        this.tableData.splice(scope.$index,1)
        let cnt={}
        cnt.planId=scope.row.planId
        cnt.approvalState='4'
        cnt.planState=scope.row.planState

        this.$api.changeState(cnt,(res)=>{
          scope.row.approvalState='4'
          this.tableData.splice(scope.$index,0,scope.row)
        })
      }

    },
    mounted(){

    },
    created(){

    },
    components:{
      materialPlanChangeState,materialPlanState
    }

  };
</script>

<style scoped lang="scss">
    #materialPlan{
        .el-timeline{
            padding: 0;
        }
        .demo-table-expand {
            font-size: 0;
        }
        .demo-table-expand label {
            width: 90px;
            color: #99a9bf;
        }
        .demo-table-expand .el-form-item {
            margin-right: 0;
            margin-bottom: 0;
            width: 50%;
        }
        .title{
            font-size: 16px;
        }

    }
</style>