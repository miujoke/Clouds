<template>
    <div>
        <fun :plan="tableData" :list="list"></fun><br><br>
        <title-text text="物资需求计划详情" weight="600" color="#636569" style="margin-bottom: 20px" />
        <materialPlan   :operation="false" :table-data="tableData"></materialPlan>
        <list style="width: 98%;margin-left: 1%" :list="list"></list>
    </div>
</template>

<script>
    import fun from "../fun/index"
  import materialPlan from "../materialPlan"
  import list from "./materList"
  export default {
    name: "materialList",
    components:{
      materialPlan,list,fun
    },
    data(){
      return{
        list:[],
        tableData:[JSON.parse(sessionStorage.getItem('materialList'))]
      }
    },
    methods:{

    },
    mounted(){

     },
    created() {
      let cnt={
        planId:this.tableData[0].planId
      }
      this.$api.getMetarialList(cnt,(res)=>{
        this.list=res.data
      })
    }

  };
</script>

<style scoped>

</style>