// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

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
    // <-- Cambio clave: usar string en lugar de boolean
    manifest: 'manifest.json',
    emptyOutDir: true,
    rollupOptions: {
      output: {
        entryFileNames: 'images/[name]-[hash].js',
        chunkFileNames: 'images/[name]-[hash].js',
        assetFileNames: ({ name }) => `images/[name]-[hash][extname]`,
      },
    },
  },
});
