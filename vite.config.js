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
                'resources/img/UnivalleLogo.png',
                'resources/img/banner.png',
                'resources/images/TRAMITESS.png',
                'resources/images/CAJASS.png',
                'resources/images/NAFF.png',
                'resources/images/P_ATENCIONN.png',
                'resources/images/CAFETERIAA.png',
                'resources/images/POSGRADOO.png',
                'resources/images/BIBLIOTECAA.png',
                'resources/images/MEDICOO.png',
            ],
            refresh: true,
        }),
    ],
});
