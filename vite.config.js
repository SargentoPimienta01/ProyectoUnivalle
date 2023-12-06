import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
      chunkSizeWarningLimit: 3072, // 3MB
      assetsInlineLimit: 0,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/styles.css',
                'resources/css/menu.css',
                'resources/css/asistente.css',
                'resources/css/cafeteria.css',
                'resources/css/cards.css',
                'resources/css/laravel.css',
                'resources/css/login.css',
                'resources/css/tramites.css',
                'resources/css/nav.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/intro.js',
                'resources/js/bootstrap.js',
                'resources/js/asistenteHome.js',
            ],
            refresh: true,
        }),
    ],
});
