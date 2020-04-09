<template>
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">

        <el-form-item label="物品分类" prop="type">
            <el-select v-model="ruleForm.type" placeholder="请选择物品分类">
                <el-option v-for="item in type" :key="item.value" :label="item.label" :value="item"></el-option>
            </el-select>
        </el-form-item>

        <el-form-item label="规格" prop="specifications">
            <el-select v-model="ruleForm.specifications" placeholder="请选择规格">
                <el-option v-for="item in specifications" :key="item.value" :label="item.label" :value="item.label"></el-option>
            </el-select>
        </el-form-item>

        <el-form-item label="物品名称" prop="materialName">
            <el-input v-model="ruleForm.materialName" placeholder="请输入物品名称">
            </el-input>
        </el-form-item>

        <el-form-item label="单位" prop="company">
            <el-select v-model="ruleForm.company" placeholder="请选择单位">
                <el-option v-for="item in company" :key="item.value" :label="item.label" :value="item.label"></el-option>
            </el-select>
        </el-form-item>

        <el-form-item label="型号" prop="model">
            <el-input v-model="ruleForm.model" placeholder="请输入型号">
            </el-input>
        </el-form-item>

        <el-form-item>
            <el-button type="primary" @click="submitForm('ruleForm')">立即创建</el-button>
            <el-button @click="resetForm('ruleForm')">重置</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
  export default {
    data() {
      return {
        type:[
          {label:"生活",value:10},
          {label:"办公",value:11}
          ],
        specifications:[
          {label:"椅子",value:10},
          {label:"水",value:11},
          {label:"打印机",value:12},
          {label:"笔",value:13},
          {label:"桌子",value:14},
          {label:"椅子",value:15},
        ],
        company:[
          {label:"个",value:11},
          {label:"张",value:12},
          {label:"台",value:13},
          {label:"cm",value:14},
          {label:"m",value:15},
          {label:"L",value:16},
        ],
        ruleForm: {
          type:'',
          specifications:'',
          company:'',
          model:'',
          materialName:''
        },
        rules: {
          type: [
            { required: true, message: '请输入', trigger: 'blur' },
          ],
          specifications: [
            { required: true, message: '请输入', trigger: 'blur' },
          ],
          company: [
            { required: true, message: '请输入', trigger: 'blur' },
          ],
          model: [
            { required: true, message: '请输入', trigger: 'blur' },
          ],
          materialName: [
            { required: true, message: '请输入', trigger: 'blur' },
          ],
        }
      };
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.createStockList()
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      createStockList(){
        let f=this.ruleForm
        let cnt={
          materialClassificationCode:f.type.value,
          materialClassificationName:f.type.label,
          materialName:f.materialName,
          materialCode:Date.now(),
          specifications:f.specifications,
          company:f.company,
          model:f.model,
        }
        console.log(cnt)
        this.$api.createStockList(cnt,(res)=>{

        })
      }
    }
  }
</script>

<style scoped>

</style>