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
                'resources/img/UnivalleLogo.png',
                'resources/img/banner.png',
                'resources/images/tramites.png',
                'resources/images/cajas.png',
                'resources/images/NAF.png',
                'resources/images/P_ATENCION.png',
                'resources/images/CAFETERIA.png',
                'resources/images/POSGRADO.png',
                'resources/images/BIBLIOTECA.png',
                'resources/images/MEDICO.png',
                'resources/js/intro.js',
                'resources/js/asistenteHome.js',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
