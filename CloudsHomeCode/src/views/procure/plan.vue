<template>
    <div id="materialPlan">
        <title-text text="采购计划列表" v-if="operation" weight="600" color="#636569" style="margin-bottom: 20px" />
        <title-text text="采购计划详情" v-else weight="600" color="#636569" style="margin-bottom: 20px" />
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
                            <procurePlanState :procureId="props.row.procureId" />
                        </el-col>
                        <el-col :span="10">
                            <procurePlanChangeState :procureId="props.row.procureId" />
                        </el-col>
                    </el-row>
                </template>
            </el-table-column>
            <el-table-column label="计划名称" prop="procureName"></el-table-column>

            <el-table-column label="计划编码" prop="procureId"></el-table-column>

            <el-table-column label="制单人" prop="create"></el-table-column>

            <el-table-column label="制单时间" prop="createTime"></el-table-column>
            <el-table-column label="采购时间" prop="procureTime"></el-table-column>
            <el-table-column label="计划状态" prop="planState">
                <template slot-scope="scope">
                    <el-tag
                            :type="getPlanStateType(scope.row.planState)"
                            disable-transitions>{{getPlanState(scope.row.planState)}}
                    </el-tag>
                </template>
            </el-table-column>

            <el-table-column label="审批状态" prop="approvalState">
                <template slot-scope="scope">
                    <el-tag
                            :type="getPlanStateType(scope.row.approvalState)"
                            disable-transitions>{{getApprovalState(scope.row.approvalState)}}
                    </el-tag>
                </template>
            </el-table-column>
            <el-table-column label="计划类型" prop="planType" >
                <template slot-scope="props">
                    {{getPlanType(props.row.planType)}}
                </template>

            </el-table-column>

            <el-table-column

                    fixed="right"
                    label="操作">
                <template slot-scope="scope">
                    <el-button v-if="operation" style="margin-left: 5px" type="text" size="small"  @click="details(scope.row)">
                        打印
                    </el-button>
                    <span v-if="getPower(scope.row)">
                        <el-button style="margin-left: 5px" @click="goBack(scope,'4',null)" v-if="scope.row.approvalState==='1'&&scope.row.planState==='4'" type="text" size="small">
                            提交
                        </el-button>
                        <el-button style="margin-left: 5px" @click="updates(scope.row)" v-if="scope.row.approvalState==='1'||scope.row.approvalState==='3'" type="text" size="small">
                            修改
                        </el-button>
                        <el-button style="margin-left: 5px" type="text" size="small" @click="goBack(scope,'1',null)" v-if="scope.row.approvalState==='4'">
                            撤回
                        </el-button>
                        <el-button style="margin-left: 5px" type="text" size="small" v-if="scope.row.planState==='4'" @click="goBack(scope,'1','3')">
                            删除
                        </el-button>
                    </span>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>


<script>
  import procurePlanChangeState from "./procurePlanChangeState"
  import procurePlanState from "./procurePlanState"
  export default {
    name: "Plan",
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
      getPower(row) {//编辑权力
        if (row.planState === '3') {
          return false
        }
        if (localStorage.getItem('grade') === this.$constData.grade.procure) {
          return true
        } else return false
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
      tableId(){//给每行增加ID
        for(let i in this.tableData){
          this.tableData[i].id=i
        }
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
      details(row){//详情按钮
        sessionStorage.setItem('producePlan',JSON.stringify(row))
        this.$router.push({path:"procurePlanDetails"})
      },
      goBack(scope,id,planState){//退回  审批中边为未提交
        this.tableData.splice(scope.$index,1)
        let cnt={}
        cnt.procureId =scope.row.procureId
        cnt.approvalState=id
        cnt.planState=planState===null?scope.row.planState:planState

        this.$api.procureChangeState(cnt,(res)=>{
          scope.row.approvalState=id
          scope.row.planState=planState===null?scope.row.planState:planState
          this.tableData.splice(scope.$index,0,scope.row)
        })
      },
      updates(row){
        sessionStorage.setItem('updateProcurePlan',JSON.stringify(row))
        this.$router.push({path:"updateProcure"})
      },

    },
    mounted(){

      },
    created(){

    },
    components:{
      procurePlanChangeState,procurePlanState
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