<template>
    <div class="page-btn " style=" float: right; font-size: 16px;color: #666;padding: 0;margin: 10px 5% 40px 0">
        <span class="page-text">当前页码：第 <span style="color: #f60;">{{page}}</span> 页</span>
        <el-button type="primary" :disabled="page===1"   @click="changePage(page-1)">上一页</el-button>
        <el-button type="primary" :disabled="pageOver ===true"  @click="changePage(page+1)">下一页</el-button>
    </div>
</template>

<script>
    export default {
        name: "nextPage",
        props:['setupCount'],
        data(){
            return{
                page:1,
                pageOver:false,
                count:10,
                offset:0,
            }
        },
        methods:{
            changePage(page){
                this.page=page
                let cnt = {
                    count:this.count,
                    offset:parseInt(page-1)*parseInt(this.count)
                }
                this.$emit('next',cnt)
            },
            //修改数据后变为第一页
            defaultPage(){
                this.page=1
            },

            //父组件点击变化页面后判断下一页是否禁用
            judge(length){
                this.pageOver = length < this.count;
            }
        },
        mounted(){
            if(this.setupCount!==""&&this.setupCount){ //需要改变每页多少条时
                this.count=this.setupCount
            }
        }
    }
</script>

<style scoped>

</style>
