<template>
    <div class="text" :style="{fontSize:fsize,fontWeight:fweight,color:fcolor}">
        {{text}}
    </div>
</template>

<script>
  export default {
    name: "titleText",
    props:['size','weight','text','color'],
    data(){
      return{
        fsize:'16px',
        fweight:'500',
        fcolor:'#000000'
      }
    },
    mounted(){
      if(this.size!==''&&this.size){
        this.fsize=this.size
      }
      if(this.weight!==''&&this.weight){
        this.fweight=this.weight
      }
      if(this.color!==''&&this.color){
        this.fcolor=this.color
      }

    }
  };
</script>

<style scoped>
    .text{
        text-align: center;
    }
</style>