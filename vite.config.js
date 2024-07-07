import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import sass from 'sass';
// import 'jquery-ui/ui/core';
// import 'jquery-ui/ui/widgets/datepicker';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/css/public-part/layout.scss', 'resources/js/app.js', 'resources/js/standalone/summernote.js', 'resources/js/public-part/chat/chat.js' ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
