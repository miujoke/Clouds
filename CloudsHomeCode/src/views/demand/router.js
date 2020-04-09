const demandHome  = ()=>import('./index')

let routes=[
            {
                path:'/demandHome',
                name:'demandHome',
                component:demandHome
            },
        ]

let ROUTES=routes
ROUTES.forEach((val,index,arr)=>{
    arr[index].meta={
       require_teacher:true
    }
})

export default ROUTES
