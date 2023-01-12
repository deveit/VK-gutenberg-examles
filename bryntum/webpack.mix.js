const mix = require('laravel-mix')
const globImporter = require('node-sass-glob-importer');

mix.setPublicPath('./')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.s[ac]ss$/i,
                    use: [
                        {
                            loader: 'sass-loader',
                            options: {
                                sassOptions: { importer: globImporter() }
                            }
                        }
                    ],
                },
            ],
        },
    })
    .sass('_dev/scss/core.scss', 'public/build/css/styles.css')
    .version()
