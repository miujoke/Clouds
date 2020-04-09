<template>
    <div>
        <update update="updates" :plan="plan" :list="list"></update>
    </div>

</template>

<script>
  import update from "../createPlan/createProcurePlan"
  export default {

    components:{
      update
    },
    data(){
      return{
        plan:JSON.parse(sessionStorage.getItem('updateProcurePlan')),
        list:'',
      }
    },
    mounted(){
      let cnt={
        planId:this.plan.planId
      }
      this.$api.getMaterialPlan(cnt,(res)=>{
        this.list=res.data
      })
    },
    created() {
      let cnt={
        procureId :this.plan.procureId
      }
      this.$api.getProcureList(cnt,(res)=>{
        this.list=res.data
      })
    }
  };
</script>

<style scoped>

</style>