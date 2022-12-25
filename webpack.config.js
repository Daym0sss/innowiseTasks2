const path = require('path')

module.exports = {
    entry: './assets/javascript/script.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'dist')
    }
}