const path = require('path');
const webpack = require('webpack');
const extractTextPlugin = require('extract-text-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const optimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const SpritesmithPlugin = require('webpack-spritesmith');
const ImageminPlugin  = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin  = require('copy-webpack-plugin');

let plugins = [];

plugins.push(new extractTextPlugin('styles.css'));

plugins.push(new webpack.optimize.CommonsChunkPlugin({
    name: 'vendor',
    filename: 'vendor.bundle.js'
}));

plugins.push(new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
    Popper: ['popper.js', 'default']
}));

plugins.push(new SpritesmithPlugin({
        src: {
            cwd: path.resolve(__dirname, 'public/assets/images/icons'),
            glob: '*.png',
        },
        target: {
            image: path.resolve(__dirname, 'public/dist/images/sprite.png'),
            css: path.resolve(__dirname, 'public/assets/styles/icons/_sprite.scss'),
        },
        apiOptions: {
            cssImageRef: "/public/dist/images/sprite.png",
        },

    }));

if (process.env.NODE_ENV === 'production') {
    plugins.push(new UglifyJsPlugin({
        uglifyOptions: {
            ecma: 8,
            output: {
                comments: false,
                beautify: false,
            },
            warnings: true
        }
    }));

    plugins.push(new optimizeCSSAssetsPlugin({
        cssProcessor: require('cssnano'),
        cssProcessorOptions: {
            discardComments: {
                removeAll: true
            }
        },
        canPrint: true
    }));
}

plugins.push(new CopyWebpackPlugin([{
    from: 'public/assets/images/**'
}]));

plugins.push(new ImageminPlugin({
    // disable: process.env.NODE_ENV === 'production',
    test: 'public/assets/images/**',
    pngquant: {
        quality: '95-100'
    },
    optipng: {
        optimizationLevel: 9
    }
}));
module.exports = {
    entry: {
        app: './public/app.js',
        vendor: ['jquery', 'bootstrap']
    },
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'public/dist')
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: extractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [{
                        loader: "css-loader"
                    }, {
                        loader: "sass-loader"
                    }],
                }),
            },
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.js$/,
                use: ["source-map-loader"],
                enforce: "pre"
            },
            {
                test: /\.(woff|woff2)(\?v=\d+\.\d+\.\d+)?$/,
                loader: 'url-loader?limit=10000&mimetype=application/font-woff'
            },
            {
                test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
                loader: 'url-loader?limit=10000&mimetype=application/octet-stream'
            },
            {
                test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
                loader: 'file-loader'
            },
            {
                test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
                loader: 'url-loader?limit=10000&mimetype=image/svg+xml'
            }
        ]
    },
    plugins
};