/**
* 接口中间层
* */
//let url = "http://192.168.2.177:8088/cloudS/";//测试后台地址
//let url = "http://gzzfgz.com/";//杨燊服务器后台地址
let url ="http://39.104.143.96:12367/cloudSs/"
import axios from 'axios';
function toFormData(obj) {//数据处理
  let formData = new FormData();
  for(let key in obj) {
    formData.append(key, obj[key]);
  }
  return formData;
}
export function util(path,cnt,callback) {
  let op = {
    method: 'POST',
    headers: { 'content-type': 'application/form-data' },
    data: toFormData(cnt),
    url: url+path+".php",
  };
  axios(op)
    .then((res)=> {
    callback(res)
  }).catch((err)=>{
    callback(err);
  })
};
