const VueLoaderPlugin = require('vue-loader/lib/plugin');
var webpack = require('webpack');

module.exports = env => {
	return {
		entry: [
			"@babel/polyfill", 
			"./app/assets/js/app.js",
			"./app/assets/scss/styles.scss"
		],
		output: {
			filename: "../app/dist/bundle.js"
		},
		watch: true,
		mode: env.mode,
		module: {
		  rules: [
			{
				test: /\.scss$/,
				use: [
					{
						loader: "file-loader",
						options: {
							name: "../app/dist/styles.css"
						}
					},
					{
						loader: "sass-loader"
					}
				]
			},
		  {
			test: /\.vue$/,
				use: [
					{
						loader: "vue-loader"
					}
				]
			  }
		]
		},
		resolve: {
			alias: {
				vue: 'vue/dist/vue.esm.js'
			}
		},
		plugins : [
			new VueLoaderPlugin()
		],
		performance: {
			hints: false
		},
		devtool: "none"
	}
}