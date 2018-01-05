const path = require('path')

module.exports = {
  entry: {
    app: './public/app.js',
    vendor: ['jquery'],
  },
  output: {
    filename: './public/dist',
    path: path.resolve(__dirname, 'public/dist'),
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader',
        ],
      },
    ],
  },
}