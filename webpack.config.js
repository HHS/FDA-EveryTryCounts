const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
	entry: ["@babel/polyfill", "~/assets/js/app.js"],
	output: {
		filename: "~/assets/dist/bundle.js"
	},
	watch: true,
	mode: "development",
	module: {
		rules: [
			{
				test: /\.vue$/,
				use: [
					{
						loader: "vue-loader"
					}
				]
			},
			{
				test: /\.scss$/,
				use: [
					'vue-style-loader',
					'css-loader',
					'sass-loader',
					{
						loader: "sass-loader"
					}
				]
			},
			{
				test: /\.m?js$/,
				exclude: /node_modules\/(?!()\/).*/,
				use: {
					loader: "babel-loader",
					options: {
						presets: ["@babel/preset-env"]
					}
				}
			}
		]
	},
	plugins : [
		new VueLoaderPlugin()
	],
	devtool: "none"
}