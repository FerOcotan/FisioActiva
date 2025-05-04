import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'], // Asegúrate que está este entry point
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),

        
    ],
    build: {
        // Copiar imágenes de resources a public
        assetsDir: 'images',
        manifest: true,
    }
});
