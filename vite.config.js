import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/styles.css',
                'resources/css/menu.css',
                'resources/css/asistente.css',
                'resources/css/cafeteria.css',
                'resources/css/cards.css',
                'resources/css/laravel.css',
                'resources/css/login.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
