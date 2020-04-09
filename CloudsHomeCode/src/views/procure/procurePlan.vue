<template>
    <div>
        <selectProcure ref="select" @select="selectTable" @change="changeCount"></selectProcure>
        <plan :operation="true" :table-data="tableData"></plan>
        <nextPage ref="nextPage"  @next="nextPage" ></nextPage>
    </div>
</template>

<script>
    import plan from "./plan"
import selectProcure from "./selectProcure"
  export default {
    name: "procurePlan",
    components:{
      plan,selectProcure
    },
    data(){
      return{
        tableData: [
          // {
          //   planType: '1',
          //   procureId: '3',
          //   procureName: '江浙小吃、小吃零食',
          //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
          //   needPeoName: '上海市普陀区真北路',
          //   planState: '1',
          //   approvalState: '3',//审核状态
          //   needType:"2",
          //   planMonth:123456
          // },{
          //   planType: '2',
          //   procureId: '1',
          //   procureName: '江浙小吃、小吃零食',
          //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
          //   needPeoName: '上海市普陀区真北路',
          //   planState: '3',
          //   approvalState: '4',//审核状态
          //   needType:"1",
          //   planMonth:456789789
          // },{
          //   planType: '2',
          //   procureId: '1',
          //   procureName: '江浙小吃、小吃零食',
          //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
          //   needPeoName: '上海市普陀区真北路',
          //   planState: '4',
          //   approvalState: '1',//审核状态
          //   needType:"1",
          //   planMonth:456789789
          // },
          // {
          //   planType: '3',
          //   procureId: '2',
          //   procureName: '江浙小吃、小吃零食',
          //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
          //   needPeoName: '上海市普陀区真北路',
          //   planState: '4',
          //   approvalState: '4',//审核状态
          //   needType:"3",
          //   planMonth:789789789
          // },
          // {
          //   planType: '3',
          //   procureId: '2',
          //   procureName: '江浙小吃、小吃零食',
          //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
          //   needPeoName: '上海市普陀区真北路',
          //   planState: '4',
          //   approvalState: '1',//审核状态
          //   needType:"3",
          //   planMonth:789789789
          // }
        ],
      }
    },
    mounted() {
      let cnt={
        offset:0,
        count:10
      }
      this.getProcurePlan(cnt)
    },
    methods:{
      selectTable(val){
        this.$refs.nextPage.judge(val.length)
        this.tableData=val
      },
      changeCount(){//查询条件改变后跳转到第一页
        this.$refs.nextPage.defaultPage()
      },
      nextPage(cnt){
        //this.$refs.select.getPlan(cnt)
        this.$refs.select.getPlan(cnt)
      },
      getProcurePlan(cnt){
        this.$api.getProcurePlan(cnt,(res)=>{
          this.$refs.nextPage.judge(res.data.length)
          this.tableData=res.data
        })
      },
    }
  };
</script>

<style scoped>

</style>