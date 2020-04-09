<template>
    <div>
        <title-text text="物资需求计划列表" weight="600" color="#636569" style="margin-bottom: 20px" />
        <div>
            <selectPlan ref="select" @select="selectTable" @change="changeCount"></selectPlan>
        </div>
        <materialPlan operation="true" :table-data="tableData"></materialPlan>
        <nextPage ref="nextPage"  @next="nextPage" ></nextPage>
    </div>
</template>

<script>
    import selectPlan from './selectMaterialPlan'
  export default {
    name: "index",
    data(){
      return{
        tableData: [
        //   {
        //   planType: '1',
        //   planId: '3',
        //   planName: '江浙小吃、小吃零食',
        //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
        //   needPeoName: '上海市普陀区真北路',
        //   planState: '1',
        //   approvalState: '3',//审核状态
        //   needType:"2",
        //     planMonth:123456
        // },{
        //   planType: '2',
        //   planId: '1',
        //   planName: '江浙小吃、小吃零食',
        //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
        //   needPeoName: '上海市普陀区真北路',
        //   planState: '3',
        //   approvalState: '4',//审核状态
        //   needType:"1",
        //     planMonth:456789789
        // },{
        //     planType: '2',
        //     planId: '1',
        //     planName: '江浙小吃、小吃零食',
        //     needDepartment: '荷兰优质淡奶，奶香浓而不腻',
        //     needPeoName: '上海市普陀区真北路',
        //     planState: '4',
        //     approvalState: '1',//审核状态
        //     needType:"1",
        //     planMonth:456789789
        //   },
        //   {
        //   planType: '3',
        //   planId: '2',
        //   planName: '江浙小吃、小吃零食',
        //   needDepartment: '荷兰优质淡奶，奶香浓而不腻',
        //   needPeoName: '上海市普陀区真北路',
        //   planState: '4',
        //   approvalState: '4',//审核状态
        //   needType:"3",
        //     planMonth:789789789
        // },
        //   {
        //     planType: '3',
        //     planId: '2',
        //     planName: '江浙小吃、小吃零食',
        //     needDepartment: '荷兰优质淡奶，奶香浓而不腻',
        //     needPeoName: '上海市普陀区真北路',
        //     planState: '4',
        //     approvalState: '1',//审核状态
        //     needType:"3",
        //     planMonth:789789789
        //   }
        ],
      }
    },
    methods:{
      nextPage(cnt){
        this.$refs.select.getPlan(cnt)
        //this.getMaterialPlan(cnt)
      },
      getMaterialPlan(cnt){
        this.$api.getMaterialPlan(cnt,(res)=>{
          this.tableData=res.data
        })
      },
      selectTable(val){
        this.$refs.nextPage.judge(val.length)
        this.tableData=val
      },
      changeCount(){//查询条件改变后跳转到第一页
        this.$refs.nextPage.defaultPage()
      }

    },
    mounted(){
      let cnt={
        offset:0,
        count:10
      }
      this.getMaterialPlan(cnt)
    },
    watch:{
      tableData(val){
        this.$refs.nextPage.judge(val.toString().length)
      }
    },
    components:{
      selectPlan
    }
  };
</script>

<style scoped>

</style>