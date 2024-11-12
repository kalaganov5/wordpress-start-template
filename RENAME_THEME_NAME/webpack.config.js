const path = require('path');

module.exports = {
  entry: './assets/js/main.js', // Входной файл
  output: {
    filename: 'bundle.js', // Выходной файл
    path: path.resolve(__dirname, './assets/js') // Директория для выходного файла
  },
  module: {
    rules: [
      {
        test: /\.js$/, // Обрабатываем все .js файлы
        exclude: /node_modules/, // Исключаем папку node_modules
        use: {
          loader: 'babel-loader', // Используем babel-loader для обработки файлов
          options: {
            presets: ['@babel/preset-env'] // Указываем пресет для Babel
          }
        }
      },
      {
        test: /\.css$/, // Обрабатываем все .css файлы
        use: ['style-loader', 'css-loader'], // Используем style-loader и css-loader
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf|svg)$/, // Обрабатываем шрифты и иконки
        use: {
          loader: 'file-loader',
          options: {
            name: '[name].[ext]', // Сохраняем имя файла
            outputPath: 'fonts/', // Папка для выходных шрифтов
          }
        }
      }
    ]
  }
};
