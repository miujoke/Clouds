<template>
    <el-timeline  class="timeline">
        <el-timeline-item
                placement="top"
                v-for="(item, index) in activities"
                :key="index"
                :icon="item.icon"
                :type="item.type"
                :color="getColor(index)"
                :size="item.size"
                :timestamp="approval(index)">
            <el-card>
                                <span class="title">
                                    {{item.content}}
                                        <i v-if="index===0"  style="color: #04b3f9" class="el-icon-success"></i>
                                    <span v-for="i in 3" :key="i" v-if="i===index">
                                        <span v-if="index===1">
                                            <i v-if="materialPlanState[0].headState===2" style="color: #04b3f9" class="el-icon-success"></i>
                                            <i v-if="materialPlanState[0].needState===3" style="color: #e6a23c" class="el-icon-error"></i>
                                        </span>
                                        <span v-if="index===2">
                                            <i v-if="materialPlanState[0].needState===2" style="color: #04b3f9" class="el-icon-success"></i>
                                            <i v-if="materialPlanState[0].needState===3" style="color: #e6a23c" class="el-icon-error"></i>
                                        </span>
                                    </span>
                                    <i v-if="index===3&&materialPlanState[0].needState===2&&materialPlanState[0].headState===2"  style="color: #04b3f9" class="el-icon-success"></i>
                                </span>
                <p style="color:#909399">
                    {{getRemarks(index)}}
                </p>
            </el-card>
        </el-timeline-item>
    </el-timeline>
</template>

<script>
  export default {
    props:['procureId'],
    data(){
      return{
        activities: [{
          content: '创建采购计划',
          type: 'primary',
          icon: 'el-icon-more'
        }, {
          content: '采购主管审核',
        }, {
          content: '财务审核',
        }, {
          content: '审核成功',

        }],
        materialPlanState:[{//物资需求计划状态
          create:"创建人",//创建人
          createTime:12315645,
          createRemarks:"创建人",
          approvalHead:"部门主管审核",//审核主管
          approvalHeadTime:12354678,
          headState:2,
          approvalHeadRemarks:"有问题",
          approvalNeed:"审核需求计划员",//审核需求计划员
          approvalNeedTime:1236457,//
          approvalNeedRemarks:"不错",
          needState:4,
          revise:"",//修改人
          reviseTime:12345678,
          reviseRemarks:"不错不错"
        }],
        approvalColor:{//时间线图标颜色
          succ:"#0bbd87",
          now:"#e6a23c"
        },
        approvalCode:this.$store.state.approvalCode
      }
    },
    methods:{
      getColor(id){   //获取图标颜色
        let item=this.materialPlanState[0]
        if(id===0){
          return '#3692f1'
        } else if(id===1){
          if(item.headState==="2") return this.approvalColor.succ

        }else if(id===2){
          if(item.needState==="2") return this.approvalColor.succ

        }else if(id===3){
          if(item.needState==="2"&&item.headState==="2") return this.approvalColor.succ
          else return ''
        }
      },
      approval(id){   //日期
        let item=this.materialPlanState[0]
        let time=parseInt(item.createTime)
        if(id>this.approvalCode){
          return ''
        }
        else if(id===0&&item.create!==null){
          return `${this.getTime(time)}   ${item.create}`
        }else if(id===1&&item.approvalHead!==null){
          return `${this.getTime(item.approvalHeadTime)}   ${item.approvalHead}`
        }else if(id===2&&item.approvalNeed!==null){
          return `${this.getTime(item.approvalNeedTime)}   ${item.approvalNeed}`
        }else if(id===3){
          return ''
        }else{
          this.approvalCode=id
          return '审核中'
        }
      },
      getRemarks(id){  //是谁评论
        if(id===0){return this.materialPlanState.createRemarks}
        else if(id===1){return this.materialPlanState.approvalHeadRemarks}
        else if(id===2){return this.materialPlanState.approvalNeedRemarks}
        else{return ''}
      },
      getTime(val){
        let date=new Date(parseInt(val))
        let y = date.getFullYear(); //getFullYear方法以四位数字返回年份
        let M = date.getMonth() + 1; // getMonth方法从 Date 对象返回月份 (0 ~ 11)，返回结果需要手动加一
        let d = date.getDate(); // getDate方法从 Date 对象返回一个月中的某一天 (1 ~ 31)
        let h = date.getHours();
        let m = date.getMinutes();
        let s = date.getSeconds();
        return `${y}-${M}-${d} ${h}:${m}:${s}`
      },
    },
    mounted(){
      let cnt={
        procureId :this.procureId
      }
      this.$api.getProcurePlanState(cnt,(res)=>{
        this.materialPlanState=res.data

      })
    },
    create() {
      // let cnt={
      //   procureId :this.procureId
      // }
      // this.$api.getProcurePlanState(cnt,(res)=>{
      //   this.materialPlanState=res.data
      // })
    }

  };
</script>

<style scoped lang="scss">
    .timeline{
        .el-card{
            width:400px !important;
        }
    }

</style>