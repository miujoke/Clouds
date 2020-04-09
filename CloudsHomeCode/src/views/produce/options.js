
let options= [
  {
    value: '01',
    label: '办公',
    children: [
      {
      value: '01',
      label: '桌子',
      children:[
        {
          value: '01',
          label: '电脑桌',
          children:[
            {
              value: '01',
              label: '大',
            },{
              value: '02',
              label: '中',
            },{
              value: '03',
              label: '小',
            },
          ]
        },
        {
          value: '02',
          label: '办公桌',
          children:[
            {
              value: '01',
              label: '1000mm X 1500mm',
            },{
              value: '02',
              label: '900mm X 600mm',
            },{
              value: '03',
              label: '1800mm X 1800mm',
            },
          ]
        }
      ]
    },{
      value: '02',
      label: '椅子',
      children:[
        {
          value: '01',
          label: '沙发椅',
          children:[
            {
              value: '01',
              label: '黑色',
            },{
              value: '02',
              label: '白色',
            },{
              value: '03',
              label: '灰色',
            },
          ]
        },
        {
          value: '02',
          label: '升降椅',
          children:[
            {
              value: '01',
              label: '大',
            },{
              value: '02',
              label: '中',
            },{
              value: '03',
              label: '小',
            },
          ]
        }
      ]
    },{
      value: '03',
      label: '纸',
      children:[
        {
          value: '01',
          label: 'A3',
          children:[
            {
              value: '01',
              label: '297mm×420mm',
            }
          ]
        },
        {
          value: '02',
          label: 'A4',
          children:[
            {
              value: '01',
              label: '210mm×297mm',
            }
          ]
        },
      ]
    },]
  },{
    value: '02',
    label: '生活',
    children: [
      {
        value: '01',
        label: '水',
        children:[
          {
            value: '01',
            label: '桶装水',
            children:[
              {
                value: '01',
                label: '18L',
              },{
                value: '02',
                label: '16L',
              },{
                value: '03',
                label: '14L',
              },
            ]
          },
          {
            value: '02',
            label: '矿泉水',
            children:[
              {
                value: '01',
                label: '康师傅',
              },{
                value: '02',
                label: '哇哈哈',
              },{
                value: '03',
                label: '北极熊',
              },
            ]
          }
        ]
      },{
        value: '02',
        label: '笔',
        children:[
          {
            value: '01',
            label: '钢笔',
            children:[
              {
                value: '01',
                label: '万宝龙',
              },{
                value: '02',
                label: '施耐德',
              },{
                value: '03',
                label: '英雄',
              },
            ]
          },
          {
            value: '02',
            label: '铅笔',
            children:[
              {
                value: '01',
                label: '大',
              },{
                value: '02',
                label: '中',
              },{
                value: '03',
                label: '小',
              },
            ]
          }
        ]
      },{
        value: '03',
        label: '手机',
        children:[
          {
            value: '01',
            label: '华为',
            children:[
              {
                value: '01',
                label: 'mate3',
              }
            ]
          },
          {
            value: '02',
            label: 'vivo',
            children:[
              {
                value: '01',
                label: 'x27',
              }
            ]
          },
        ]
      },]
  }
  ]

export default options