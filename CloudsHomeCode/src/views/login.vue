<template>
    <div class="login-container" >
        <el-form class="login-form" label-position="left" :rules="rules" :model="user">

            <div class="title-container">
                <h3 class="title">
                    clouds登录
                </h3>
            </div>

            <el-form-item prop="username">
                <span class="svg-container">
                    <i class="iconfont course_user"></i>
                 </span>
                <el-input
                        v-model="user.username"
                        placeholder="请输入账号"
                        type="text"
                />
            </el-form-item>
            <el-form-item prop="password">
                <span class="svg-container">
                    <i class="iconfont course_ziyuanxhdpi"></i>
                </span>
                <el-input
                        v-model="user.password"
                        :type="passwordType"
                        placeholder="请输入密码"
                        name="password"
                />
                <span class="show-pwd" @click="showPwd">
                    <i :class="passwordType === 'password' ? 'iconfont course_yanjing_bi' : 'iconfont course_yanjing_kai'"/>
                </span>
            </el-form-item>
            <el-select v-model="user.adminId" placeholder="请选择登陆权限">
                <el-option
                        v-for="item in adminLabel"
                        :key="item.value"
                        :label="item.name"
                        :value="item.adminId">
                </el-option>
            </el-select>
            <!--<el-radio-group v-model="user.adminId">-->
                <!--<el-radio  v-for="(item,index) in adminLabel" :label="item.adminId" :key="index">{{item.name}}</el-radio>-->
            <!--</el-radio-group>-->

            <el-button :loading="loading" type="primary" style="width:100%;margin:60px 0 0 0;" @click="judgeLogin()">
                登录
            </el-button>

        </el-form>

    </div>
</template>

<script>


    export default {
        name: 'login',
        data() {
            return {
                user:{username: 'admin',password: 'admin',adminId:""},
                passwordType: 'password',
                loading: false,
                rules:{
                    username:[{ min: 7, max: 10, message: '账号长度在 7 到 10位', trigger: 'blur' }],
                    password:[{ min: 6, max: 16, message: '密码长度在 6 到 16位 ', trigger: 'blur' }],
                },
                adminLabel:[
                  {name:"生产计划员",adminId:'0'},{name:"生产主管",adminId:'1'},{name:"采购计划员",adminId:'5'}, {name:"采购主管",adminId:'6'},
                  {name:"需求计划员",adminId:'2'},{name:"需求部门计划员",adminId:'3'},{name:"需求部门主管",adminId:'4'}
                  ,{name:"财务",adminId:'7'},{name:'仓库',adminId:'8'}]
            }
        },
        methods: {
            //显示密码
            showPwd() {
                if (this.passwordType === 'password') {
                    this.passwordType = ''
                } else {
                    this.passwordType = 'password'
                }
            },
            judgeLogin(){
                if(this.user.adminId==="") this.$message({message:"请选择权限",type:"warning"})
              else{
                  this.loginAdmin(this.user.adminId)
                }

                },
            //登录
            loginBtn(key) {
             this.$router.push({path:"/"})
            },
            loginAdmin(key){
                // if(this.user.username === '' || this.user.password === ''){
                //     this.$message.error('请将账号密码输入完整')
                // }else{
                     localStorage.setItem('grade',key)
                     this.$router.push('/produceHome')

            }
        },
        mounted(){
            localStorage.setItem('grade','')
            localStorage.setItem('user_name','')
            localStorage.setItem('user_id','')
        },
      created() {

        let trident= navigator.userAgent.indexOf('Trident') > -1//IE内核
        if(trident){
          this.$message({
            type:'danger',
            message:'ie页面部分样式暂时不支持',
            duration:0
          })
        }

      }
    }
</script>

<style scope lang="scss">
    /* 修复input 背景不协调 和光标变色 */
    /* Detail see https://github.com/PanJiaChen/vue-element-admin/pull/927 */

    $bg: #283443;
    $light_gray: #fff;
    $cursor: #fff;

    @supports (-webkit-mask: none) and (not (cater-color: $cursor)) {
        .login-container .el-input input {
            color: $cursor;
        }
    }

    /* reset element-ui css */
    .login-container {
        .el-input {
            display: inline-block;
            height: 47px;
            width: 85%;

            input {
                background: transparent;
                border: 0px;
                -webkit-appearance: none;
                border-radius: 0px;
                padding: 12px 5px 12px 15px;
                color: $light_gray;
                height: 47px;
                caret-color: $cursor;

                &:-webkit-autofill {
                    box-shadow: 0 0 0px 1000px $bg inset !important;
                    -webkit-text-fill-color: $cursor !important;
                }
            }
        }

        .el-form-item {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            color: #454545;
        }
    }
</style>

<style lang="scss" scoped>
    $bg: #2d3a4b;
    $dark_gray: #889aa4;
    $light_gray: #eee;

    .login-container {
        min-height: 100%;
        width: 100%;
        background-color: $bg;
        overflow: hidden;

        .login-form {
            position: relative;
            width: 520px;
            max-width: 100%;
            padding: 160px 35px 0;
            margin: 0 auto;
            overflow: hidden;
        }

        .tips {
            font-size: 14px;
            color: #fff;
            margin-bottom: 10px;

            span {
                &:first-of-type {
                    margin-right: 16px;
                }
            }
        }

        .svg-container {
            padding: 6px 5px 6px 15px;
            color: $dark_gray;
            vertical-align: middle;
            width: 30px;
            display: inline-block;
        }

        .title-container {
            position: relative;

            .title {
                font-size: 26px;
                color: $light_gray;
                margin: 0px auto 40px auto;
                text-align: center;
                font-weight: bold;
            }

            .set-language {
                color: #fff;
                position: absolute;
                top: 3px;
                font-size: 18px;
                right: 0px;
                cursor: pointer;
            }
        }

        .show-pwd {
            position: absolute;
            right: 10px;
            top: 7px;
            font-size: 16px;
            color: $dark_gray;
            cursor: pointer;
            user-select: none;
        }

        .thirdparty-button {
            position: absolute;
            right: 0;
            bottom: 6px;
        }

        @media only screen and (max-width: 470px) {
            .thirdparty-button {
                display: none;
            }
        }
    }
</style>
