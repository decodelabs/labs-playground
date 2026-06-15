import { defineConfig } from 'vite';
import castaway from '@decodelabs/vite-plugin-castaway';
import zest from '@decodelabs/vite-plugin-zest';
import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        castaway(),
        zest({
            buildOnExit: true,
            mergeToPublicDir: true,
            publicCacheBuster: true,
            legacyMountDev: true
        }),
        //react(),
        vue(),
    ],

    resolve: {
        alias: {
            '@components': './src/@components',
            '@scripts': './src/@scripts',
            '@styles': './src/@styles',
        },
    },

    build: {
        rollupOptions: {
            input: 'src/@scripts/main.js'
        }
    },

    server: {
        port: 6543,
        cors: {
            origin: '*'
        }
    }
})
