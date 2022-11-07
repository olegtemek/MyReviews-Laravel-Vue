import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import i18n from 'laravel-vue-i18n/vite';
export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@style': path.resolve(__dirname, './resources/scss'),
            // '@fonts': path.resolve(__dirname, './resources/fonts'),
            '@assets': path.resolve(__dirname, './resources/assets'),
            '@lang': path.resolve(__dirname, './resources/lang'),
        },
    },

    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@style/_variables.scss";`
            }
        }
    },

    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        i18n(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

    ],
});