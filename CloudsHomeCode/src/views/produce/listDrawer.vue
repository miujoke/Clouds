<template>
    <div  id="drawerss">

            <el-drawer
                title="填写物料清单"
                :visible.sync="drawer"
                :direction="direction"
                :before-close="handleClose">
            <div id="formDiv">
                <el-form :model="createForm" :rules="rules" ref="createForm" label-position="left" label-width="110px" class="demo-ruleForm">

                    <el-form-item label="物料名称" prop="cascader"  >
                        <el-select v-model="createForm.cascader" placeholder="请选择" @change="handleChange">
                            <el-option
                                    v-for="item in options"
                                    :key="item.materialCode"
                                    :label="item.materialName"
                                    :value="item.materialCode">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="单位" prop="company" >
                        <el-select v-model="createForm.company" placeholder="请选择">
                            <el-option
                                    v-for="item in coms"
                                    :key="item"
                                    :value="item">
                            </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="需求数量" prop="demandQuantity" >
                        <el-input-number v-model="createForm.demandQuantity" :step="1"></el-input-number>
                    </el-form-item>


                    <el-form-item label="需求日期" prop="demandDate" >
                        <el-date-picker
                                v-model="createForm.demandDate"
                                type="date"
                                @change="clickDate(createForm.demandDate)"
                                value-format="timestamp"
                                placeholder="选择日期">
                        </el-date-picker>
                    </el-form-item>
                    <el-form-item label="货源是否稳定" prop="source" >
                        <el-radio-group v-model="createForm.source">
                            <el-radio label="是">是</el-radio>
                            <el-radio label="否">否</el-radio>
                        </el-radio-group>
                    </el-form-item>
                    <el-form-item label="期望供应商" prop="expectedSupplier" >
                        <el-select v-model="createForm.expectedSupplier" placeholder="请选择">
                            <el-option value="供应商1"></el-option>
                            <el-option value="供应商2"></el-option>
                            <el-option value="供应商3"></el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="固定供应商" prop="fixedSupplier" >
                        <el-select v-model="createForm.fixedSupplier" placeholder="请选择">
                            <el-option value="供应商4"></el-option>
                            <el-option value="供应商5"></el-option>
                            <el-option value="供应商6"></el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="需求库存组织" prop="demandOrganization" >
                        <el-select v-model="createForm.demandOrganization" placeholder="请选择">
                            <el-option value="组织1"></el-option>
                            <el-option value="组织2"></el-option>
                            <el-option value="组织3"></el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="备注" prop="remarks" >
                        <el-input v-model="createForm.remarks"  maxlength="30" type="textarea" placeholder="请输入内容"></el-input>
                    </el-form-item>
                </el-form>

                <el-button style="width: 150px;margin:0 0 50px 50%" type="primary" v-if="addButton" @click="add">添加</el-button>
                <el-button style="width: 150px;margin:0 0 50px 50%" type="primary" v-else @click="update">编辑</el-button>
            </div>
        </el-drawer>

    </div>


</template>

<script>

  export default {
    name: "listDrawer",
    data(){
      return{
        drawer: false,//是否打开
        direction: 'rtl',//从下往上开
        createForm:{
          materialClassificationCode:'',
          materialClassificationName:'',
          materialCode:'',
          materialName:'',
          specifications:'',
          model:'',
          company:'',
          demandQuantity:'',
          demandMonth:'',
          demandDate:'',
          source:'',
          expectedSupplier:'',
          fixedSupplier:'',
          remarks:'',
          materialTrackingCode:'',
          demandOrganization:'',
          cascader:'',//选择后
        },
        rules: {
          cascader: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          company: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          demandQuantity: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          demandDate: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          source: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          expectedSupplier: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          fixedSupplier: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          demandOrganization: [{ required: true, message: '请选择物品', trigger: 'blur' }],
          remarks: [{ required: true, message: '请选择物品', trigger: 'blur' }],
        },
        addButton:false,
        updateButton:false,
        options:[],
        coms:['克','千克','吨','个','张','米','千米'],
        tableDataId:''
      }
    },
    methods:{
      submitForm() {  //创建按钮
        let r
        let formName = 'createForm'
        this.$refs[formName].validate((valid) => {
          if (valid) {
            console.log(this.createForm)
            r= true;
          } else {
            this.$message({type:"warning",message:"请完整填写需求计划"})
            r= false;
          }
        })
        return r
      },
      add(){
        if(this.submitForm()){
          this.$emit('add',this.createForm)
          this.closeDrawer()
        }

      },
      update(){
        if(this.submitForm()) {
          this.$emit('update', this.createForm, this.tableDataId)
          this.closeDrawer()
        }
      },
      openDrawer(){
        this.drawer=true
        this.addButton=true
      },
      closeDrawer(){
        this.drawer=false
        this.addButton=false
        this.updateButton=false
      },
      updateDrawer(val,id){
        this.tableDataId=id
        this.drawer=true
        this.updateButton=true
        this.createForm=JSON.parse(JSON.stringify(val));
      },
      handleClose(done) {
        this.$confirm('是否继续填写？')
          .then(_ => {

          })
          .catch(_ => {

            done();
            this.closeDrawer()
          });
      },
      handleChange(value) {
        console.log(value);
        let ary
        this.options.forEach((val)=>{
          if(val.materialCode===value) ary=val
        })
        console.log(ary)
        this.createForm.materialClassificationCode=ary.materialClassificationCode
        this.createForm.materialClassificationName=ary.materialClassificationName
        this.createForm.materialName=ary.materialName
        this.createForm.materialCode=ary.materialCode
        this.createForm.specifications=ary.specifications
        this.createForm.model=ary.model
        this.createForm.company=ary.company

      },
      clickDate(val){
        let date=new Date(val)
        this.createForm.demandMonth=date.getFullYear()+''+parseInt(date.getMonth()+1)
        console.log(this.createForm.demandMonth)
      }
    },
    created(){
      this.$api.getStockList({},(res)=>{
        this.options=res.data
      })
    }
  };
</script>

<style scope  lang="scss">
    #drawerss{
        overflow: hidden;
        height: 100%;

    }
    #formDiv{
        padding:0 20px;
    }

    .el-drawer__header{
        margin-bottom: 10px !important;
    }

    .el-drawer__body{
        overflow-y: scroll;
    }
    ::-webkit-scrollbar {/*滚动条整体样式*/
        width: 0;     /*高宽分别对应横竖滚动条的尺寸*/
        height: 0;

    }
</style>