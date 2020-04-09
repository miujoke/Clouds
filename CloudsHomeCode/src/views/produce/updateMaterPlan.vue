<template>
    <div>
        <update update="updates" :plan="plan" :list="list"></update>
    </div>

</template>

<script>
    import update from "./createMaterial"
  export default {
    name: "updateMaterPlan",
    components:{
      update
    },
    data(){
      return{
        plan:JSON.parse(sessionStorage.getItem('updateMaterialList')),
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
        planId:this.plan.planId
      }
      this.$api.getMaterialPlan(cnt,(res)=>{
        this.list=res.data
      })
    }
  };
</script>

<style scoped>

</style>