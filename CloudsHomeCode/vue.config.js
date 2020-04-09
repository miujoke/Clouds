module.exports = {
  //基本路径
  publicPath: './',

  //输出文件目录
  outputDir: 'clouds',
  // configureWebpack: config => {
  //   config.entry.app = ["babel-polyfill", "./src/main.js"];
  // }
  pwa: {
    iconPaths: {
      favicon32     : 'favicon.ico',
      favicon16     : 'favicon.ico',
      appleTouchIcon: 'favicon.ico',
      maskIcon      : 'favicon.ico',
      msTileImage   : 'favicon.ico'
    }
  },
}