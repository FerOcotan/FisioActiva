import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        assetsDir: 'images',
        manifest: true,
        emptyOutDir: true,
        rollupOptions: {
            output: {
                entryFileNames: 'images/[name]-[hash].js',
                chunkFileNames: 'images/[name]-[hash].js',
                assetFileNames: ({ name }) => {
                    if (name && name.endsWith('.css')) {
                        return 'images/[name]-[hash][extname]';
                    }
                    return 'images/[name]-[hash][extname]';
                },
            },
        }
    }
});
