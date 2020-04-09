<template>
    <el-dialog
            title="提示"
            :visible.sync="dialogVisible"
            width="30%">
        <span v-html>{{message}}</span>
        <span slot="footer" class="dialog-footer">
            <el-button @click="quxiao">取 消</el-button>
            <el-button type="primary" @click="queren">确 定</el-button>
        </span>
    </el-dialog>
</template>

<script>
  export default {
    props:['message'],
    data() {
      return {
        dialogVisible: false,
        state:null
      };
    },
    methods: {
      returnDialog(){
        this.$emit('dialog',this.state)
      },
      quxiao(){
          this.state=false
          this.dialogVisible=false
        this.returnDialog()
      },
      queren(){
        this.state=true
        this.dialogVisible=false
        this.returnDialog()
      },
      openDia(){
        this.dialogVisible=true
      }
    }
  };
</script>

<style scoped>

</style>