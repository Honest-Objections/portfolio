const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss'); /* Add this line at the top */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .browserSync({
        host: '127.0.0.1',
        proxy: process.env.APP_URL,
        open: false
    });

// mix.webpackConfig({
//     module: {
//         rules: [
//             {
//                 test: /\.worker.js$/,
//                 loader: 'worker-loader',
//                 options: { /* ... */ }
//             },
//         ]
//     }
// }); 