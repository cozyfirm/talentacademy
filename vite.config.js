import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import sass from 'sass';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
