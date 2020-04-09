<template>
    <div>
        <title-text text="物资需求汇总表" weight="600" color="#636569" style="margin-bottom: 20px" />
        <el-row >
            <el-col :span="3" :offset="14">
                <el-date-picker v-model="years" @change="months=''" type="year" format="yyyy年" value-format="yyyy" placeholder="选择年"></el-date-picker>
            </el-col>
            <el-col :span="3">
                <el-select v-model="months" @change="getList()"  placeholder="请选择月份" :disabled="years===''">
                    <el-option v-for="item in monthTable" :key="item" :value="item">{{item}}月</el-option>
                </el-select>
            </el-col>
        </el-row>

        <metarialList :list="list"></metarialList>
    </div>
</template>

<script>
  import metarialList from "@/components/materlist/materList";

  export default {
    name: "reportForm",
    components:{
      metarialList
    },
    data(){
      return{
        list:[],
        years:'',
        months:'',
        monthTable:['01','02','03','04','05','06','07','08','09','10','11','12']
      }
    },
    methods:{
      getList(){
        this.list=[]
        let t=this.months===''?parseInt(this.years):parseInt(this.years+''+this.months)
        console.log(t)
        let cnt={
          planState:'2',
          planMonth:t
        }
        this.$api.selectMaterialPlanState(cnt,(res)=>{
          let c={
            demandMonth:t
          }
          for(let i in res.data){
            c.planId=res.data[i].planId
            this.$api.selectMetarialList(c,(res)=>{
              this.list.push(...res.data)
            })
          }
        })
      }
    },
    created() {
    },
    watch:{
      years(){
        this.months=""
        this.getList()
      },

    }
  };
</script>

<style scoped>

</style>