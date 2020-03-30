const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
	entry: [
		"@babel/polyfill", 
		"./app/assets/js/app.js",
		"./app/assets/scss/styles.scss"
	],
	output: {
		filename: "../app/dist/bundle.js"
	},
	watch: true,
	mode: "development",
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
            vue: 'vue/dist/vue.js'
        }
    },
	plugins : [
		new VueLoaderPlugin()
	],
	devtool: "none"
}