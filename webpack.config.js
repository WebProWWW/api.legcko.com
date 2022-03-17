
const path = require('path')
const { WebpackManifestPlugin } = require('webpack-manifest-plugin')
const LiveReloadPlugin = require('webpack-livereload-plugin')
const CssExtractPlugin = require('mini-css-extract-plugin')
const postCssPresetEnv = require('postcss-preset-env')
const { VueLoaderPlugin } = require('vue-loader')
const chokidar = require('chokidar');

const lrPlugin = new LiveReloadPlugin({appendScriptTag: false});

chokidar.watch('./app/**/*.php', { ignored: 'vendor' }).on('change', (e, path) => {
  lrPlugin.server.notifyClients(['index.php']);
});

module.exports = {
    watchOptions: {
        ignored: ['**/node_modules', '**/vendor', '**/runtime'],
    },
    target: 'web',
    entry: {
        site: './src/site/index.coffee',
        admin: './src/admin/index.coffee',
    },
    output: {
        clean: true,
        path: path.resolve(__dirname, 'public_html/dist'),
        publicPath: '/dist/',
        filename: 'js/[name].[contenthash].js',
        hashDigestLength: 8,
    },
    module: {
        rules: [
            {
                test: /.vue$/i,
                loader: 'vue-loader',
            },
            {
                test: /\.coffee$/i,
                loader: 'coffee-loader',
                options: {
                    bare: false,
                    transpile: {
                        presets: ['@babel/preset-env'],
                    },
                },
            },
            {
                test: /\.css$/i,
                use: [
                    CssExtractPlugin.loader,
                    'css-loader',
                ],
            },
            {
                test: /\.styl(us)?$/i,
                use: [
                    CssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [postCssPresetEnv()],
                            },
                        },
                    },
                    'stylus-loader',
                ],
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name].[contenthash][ext]',
                }
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[name].[contenthash][ext]',
                }
            },
        ],
    },
    plugins: [
        new VueLoaderPlugin(),
        new CssExtractPlugin({filename: 'css/[name].[contenthash].css'}),
        new WebpackManifestPlugin(),
        lrPlugin,
    ]
}