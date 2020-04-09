<template>
    <div>
        <metarss @addList="addList"></metarss>
        <el-button type="danger" round>取消合并</el-button>
        <el-popover
                placement="top"
                width="500"
                trigger="click">
            <el-checkbox-group v-model="checkedCities" @change="choiceCheckbox">
                <el-checkbox v-for="item in check" :label="item.label" :value="item.value" :key="item.value">{{item.label}}</el-checkbox>
            </el-checkbox-group>
            <el-button slot="reference" type="primary" style="margin-left: 50px" round>合并</el-button>
        </el-popover>

        <el-table
                id="table-column"
                :data="tableData"
                style="width: 98%">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-table
                            :data="[props.row]">
                        <el-table-column
                                v-for="(item,index) in tableHead2"
                                :key="item.prpo"
                                :label="item.label"
                                :prop="item.prop">
                        </el-table-column>
                    </el-table>
                </template>
            </el-table-column>
            <el-table-column
                    type="index"
                    label="id">
            </el-table-column>
            <el-table-column
                    v-for="(item,index) in tableHead1"
                    :key="item.prpo"
                    :label="item.label"
                    :prop="item.prop">
            </el-table-column>
            <el-table-column
                    fixed="right"
                    label="操作"
                    width="120">
                <template slot-scope="scope">
                    <el-button
                            @click.native.prevent="list.splice(scope.$index,1)"
                            type="text"
                            style="color: red;font-size: 16px"
                            class="el-icon-delete"
                            size="small">
                    </el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import metarss from './metar.vue'
    const condition=[{label:'物料编码',value:'materialCode'},{label:'需求月份',value:'demandMonth'},
                     {label:'期望供应商', value:'expectedSupplier'},{label:'固定供应商',value:'fixedSupplier'}]
  export default {
    props: ['list'],
    data() {
      return {
        check: condition,
        checkedCities: [],
        tableData: [],
        change: false,
        tableHead1: [
          { label: '物料编码', prop: 'materialCode' },
          { label: '物料名称', prop: 'materialName' },
          { label: '规格', prop: 'specifications' },

          { label: '单位', prop: 'company' },
          { label: '需求数量', prop: 'demandQuantity' },
          { label: '需求月份', prop: 'demandMonth' },
          { label: '期望供应商', prop: 'expectedSupplier' },
          { label: '固定供应商', prop: 'fixedSupplier' },
        ],
        tableHead2: [
          { label: '型号', prop: 'model' },
          { label: '物料分类名称', prop: 'materialClassificationName' },
          { label: '物料分类编码', prop: 'materialClassificationCode' },
          { label: '需求日期', prop: 'demandDate' },
          { label: '货源是否稳定', prop: 'source' },
          { label: '备注', prop: 'remarks' },
          { label: '物料追踪码 ', prop: 'materialTrackingCode' },
          { label: '需求库存组织', prop: 'demandOrganization' }],
      }
    },
    methods: {
      preservation() {//保存
        this.change = false
        sessionStorage.setItem('createProcureList', JSON.stringify(this.tableData))
      },
      tips() {//是否保存
        return this.change
      },
      addList(list) {  //选择物料加入计划
        this.tableData = list
      },
      choiceCheckbox() {//选择合并条件
        console.log(this.checkedCities)
      },
      createList(id) {
        console.log(this.tableData)
        this.tableData.forEach((val) => {
          let cnt = {
            procureId: id,
            materialTrackingCode: val.materialTrackingCode,
            materialCode: val.materialCode
          }
          this.$api.createProcureList(cnt, (res) => {

          })
        })
      },
    },
      components:{metarss},
      mounted() {
        let createList = sessionStorage.getItem('createProcureList')
        if (this.list !== '' && this.list != null) {
          this.change = false
          this.tableData = this.list
          console.log(this.list + "list")
        } else if (createList !== '' && createList !== null) {
          this.change = false
          this.tableData = JSON.parse(createList)
        }
      },
      // computed: {
      //   form() {
      //     return JSON.parse(JSON.stringify(this.tableData))
      //   }
      // },
      // watch: {
      //   form() {
      //     this.change = true
      //   }
      // },

  }
</script>

<style scoped>

</style>