import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/node_modules/**', '**/vendor/**', '**/storage/**'],
        },
    },
    optimizeDeps: {
        include: ['vue', 'alpinejs'], // Add any other frequently used libraries
    },
});