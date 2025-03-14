import { defineConfig } from 'vite';
import zest from '@decodelabs/vite-plugin-zest';
import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

const castaway = () => {
    return {
        name: 'castaway',

        config: (config) => {
            const existing = config.build?.rollupOptions?.output?.manualChunks ?? undefined;

            return {
                build: {
                    rollupOptions: {
                        output: {
                            manualChunks: (id) => {
                                // React
                                if (id.includes('node_modules/react')) {
                                    return 'react';
                                }

                                // Vue
                                if (
                                    id.includes('@vue') ||
                                    id.includes('node_modules/vue/dist') ||
                                    id.endsWith('integrations/vue.js')
                                ) {
                                    return 'vue';
                                }

                                if (existing) {
                                    const output = existing(id);

                                    if (output !== undefined) {
                                        return output;
                                    }
                                }

                                if (
                                    id.endsWith('.vue') ||
                                    id.endsWith('.jsx')
                                ) {
                                    return 'components';
                                }
                            }
                        },
                        preserveEntrySignatures: 'strict'
                    }
                }
            }
        }
    }
};








// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        castaway(),
        zest({
            buildOnExit: true,
            mergeToPublicDir: true,
            publicCacheBuster: true
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
