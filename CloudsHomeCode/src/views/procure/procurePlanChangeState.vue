<template>
    <div id="card">
        <div id="title">
            物资计划修改情况
        </div>
        <el-card>
            <el-timeline v-show="activities!==[]">
                <el-timeline-item
                        placement="top"
                        v-for="(item, index) in activities"
                        :key="index"
                        icon="el-icon-more"
                        type="primary "
                        :timestamp="getTime(item.reviseTime)">
                                        <span class="title">
                                            {{item.revise}}修改物资计划
                                        </span>
                    <div style="color:#909399;margin-right: 50px;margin-top: 10px">
                        {{item.reviseRemarks}}
                    </div>
                </el-timeline-item>
            </el-timeline>
            <div style="color: #2ca5ef" class="el-icon-s-promotion" v-show="activities===''">暂无修改情况</div>
        </el-card>
    </div>
</template>

<script>
  export default {
    name: "materialPlanChangeState",
    props:['procureId'],
    data(){
      return{
        activities: [
          {
            reviseTime:12345678978989,
            revise:"李四",
            reviseRemarks:"很好",
          },
          {
            reviseTime:12345678978989,
            revise:"李四",
            reviseRemarks:"很好",
          },
        ],
      }
    },
    methods:{
      getTime(val){
        let date=new Date(val)
        let y = date.getFullYear(); //getFullYear方法以四位数字返回年份
        let M = date.getMonth() + 1; // getMonth方法从 Date 对象返回月份 (0 ~ 11)，返回结果需要手动加一
        let d = date.getDate(); // getDate方法从 Date 对象返回一个月中的某一天 (1 ~ 31)
        let h = date.getHours();
        let m = date.getMinutes();
        let s = date.getSeconds();
        return `${y}-${M}-${d} ${h}:${m}:${s}`
      }
    },
    mounted(){
      let cnt={
        procureId:this.procureId
      }
      this.$api.getProcurePlanChangeState(cnt,(res)=>{
        this.activities=res.data
      })
    }
  };
</script>

<style scoped lang="scss">
    #card{
        #title{
            color:#909399;
            margin-bottom: 2px;
        }
        .el-card{
            min-height: 400px;
            max-height: 500px;
            overflow-y: scroll;
        }
        ::-webkit-scrollbar {
            display: none;
        }
        min-width: 400px;
    }
</style>