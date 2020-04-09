<template>
  <div class="home">
    <el-container>

      <el-container class="main-head">
        <el-header class="header-box" >
          <div class="system-box">智能制造协同共享平台</div>

            <div style="float: right">
              <el-button type="danger" plain size="mini" @click="outLogin">注销登录</el-button>
            </div>
        </el-header>
        <el-main style="background: #f0f2f5;height: 100%;overflow: hidden;padding: 0"  >
          <div class="main">
            <router-view></router-view>
          </div>
        </el-main>
      </el-container>
        <el-aside width="160px" class="slide-box">
            <div class="logo-box">
                <i class="icon-ail-ai30"></i>
                <div>clouds</div>
            </div>
            <el-menu
                    :collapse="isCollapse"
                    :default-active="navDefaultActive"
                    class="el-menu-vertical-demo"
                    background-color="#fff"
                    text-color="#606266"
                    active-text-color="#04b3f9"
                    active-background-color="#f0f9eb"
                    style="overflow: hidden;width: 160px;"
            >
                    <span v-for="(item,key) in menuList"  :key="key">
                        <el-menu-item v-if="item.child.length ===0"    :index="''+key" @click="navActive(item,key)" >
                            <i class="iconfont icon-box" :class="item.icon"></i>
                            <span slot="title">{{item.title}}</span>
                        </el-menu-item>
                        <el-submenu :index="''+key"  v-if="item.child.length >0" >
                            <template slot="title">
                                <i class="el-icon-location"></i>
                                <span>{{item.title}}</span>
                            </template>
                                <el-menu-item :index="key+'-'+key1" v-for="(item1,key1) in item.child" @click="navActive1(key,item1,key1)" :key="key+'-'+key1">{{item1.title}}</el-menu-item>
                        </el-submenu>
                    </span>
            </el-menu>
        </el-aside>
    </el-container>
  </div>
</template>

<script>
  import menu from '@/assets/data/menu'
  export default {
    name: "home",
    components: {},
    data() {
      return {
        showActive: false,
        showActive1: true,
        tableData: [],
        orgName: '',
        isRouterActive: true,
        menuList:[],
        navDefaultActive:"",
        isCollapse:false


      }
    },
    methods: {
      //事件层
      //一级菜单选中事件
      navActive(item,key) {
        if(this.$route.fullPath===item.path) return
        sessionStorage.setItem('navDefaultActive',''+key)
        this.navDefaultActive=sessionStorage.getItem('navDefaultActive')
        this.$store.state.navDefaultActive = ''+key
        this.$router.push(item.path)
      },
      //二级菜单选中事件
      navActive1(key,item1,key1) {
        if(this.$route.fullPath===item.path) return
        sessionStorage.setItem('navDefaultActive',''+key+'-'+key1)
        this.navDefaultActive=sessionStorage.getItem('navDefaultActive')
        this.$store.state.navDefaultActive = key+'-'+key1
        this.$router.push(item1.path)
      },
      outLogin(){
        localStorage.setItem('grade', '')
        localStorage.setItem('user_name', '')
        localStorage.setItem('user_id', '')
        sessionStorage.setItem('navDefaultActive',"0")
        this.$router.push('/login')
      }
    },
    mounted() {

      const loading = this.$loading({lock: true, text: '拼命加载中...', spinner: 'el-icon-loading'})
      if(localStorage.getItem('grade') === '' || localStorage.getItem('grade') == null){
        this.$message.error('登录信息失效，重新登录')
        this.outLogin()
      }
      if(localStorage.getItem('grade') === this.$constData.grade.produce){
        this.menuList = menu.produceMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.produceHead){
        this.menuList = menu.produceHeadMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.demand){
        this.menuList = menu.demandMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.department){
        this.menuList = menu.departmentMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.departmentHead){
        this.menuList = menu.departmentHeadMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.procure){
        this.menuList = menu.procureMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.procureHead){
        this.menuList = menu.procureHeadMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.finance){
        this.menuList = menu.financeMenu
      }else if(localStorage.getItem('grade') === this.$constData.grade.warehouse){
        this.menuList = menu.warehouseMenu
      }
      //解决页面刷新后重定向首页问题
      let navDefaultActive=sessionStorage.getItem('navDefaultActive')
      if(!navDefaultActive||navDefaultActive===""){
        //sessionStorage.setItem('navDefaultActive',''+"0")
        navDefaultActive='0'
      }
      this.navDefaultActive=navDefaultActive
      this.$store.state.navDefaultActive = navDefaultActive
      this.showActive = true
      loading.close()
      this.$router.push(this.menuList[0].path)
    }
  }
</script>

<style scoped lang="scss">
  $head-bc:#fff;
  .home{
  .main{
    width: 100%;
    height: 100%;
    background: #fff;
    padding: 10px;
  }
  .slide-box {
    width: 160px;
    background: $head-bc;
    min-height: 100vh;
    overflow: hidden;
      position: fixed;
      left: 0;
      top: 0;
      z-index:100;
  }

  .logo-box {
    width: 160px;
    height: 60px;
    text-align: center;
    line-height: 60px;
    font-size: 28px;
    color: #04b3f9;
    background-color: $head-bc;
      div{
          font-weight: 600;
          float: left;
          line-height: 60px;
          padding: auto 0;
      }
      i {
          float: left;
          width: 40px;
          height: 40px;
          line-height: 60px;
          text-align: center;
          color: #04b3f9;
          font-size: 40px;

      }
  }
  .header-box {
    background: $head-bc;
    font-size: 1.6rem;
    line-height: 60px;
    color: #fff;
  }

  .icon-box {
      line-height: 56px;
    display: block;
    float: left;
    width: 20px;
    height: 56px;
    margin:0 2px 0 10px;
    font-size: 18px;
  }

  .system-box {
    float: left;
    width: 400px;
    height: 60px;
    color:#04b3f9;
    font-weight: 600 !important;
    text-align: center;
  }

  .system-mech {




  }

  .system-center {
    position: absolute;
    width: 300px;
    height: 60px;
    left: 50%;
    margin-left: -250px;
    overflow: hidden;
    text-overflow:ellipsis;
    white-space: nowrap;
  }

  .system-right {
    position: absolute;
    right: 100px;
    cursor: pointer;
  }

  .system-right span {
    color: #fff;
    border: 1px solid #ddd;
    background: rgba(255, 255, 255, .3);
  }

      .el-menu-item:hover{
          background-color: #f0f9eb !important;
      }
      .el-menu-item{
          padding: 0 10px !important;
      }
      .el-aside{

      }
      .main-head{
          margin-left: 160px;
      }

  }
</style>
