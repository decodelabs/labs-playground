<?php
use DecodeLabs\Zest\Config\Generic as Config;
return new Config(
    path: '',
    host: null,
    port: 6543,
    https: null,
    outDir: 'public/assets/zest',
    assetsDir: '.',
    publicDir: 'public',
    aliases: ['@components' => './src/@components', '@scripts' => './src/@scripts', '@styles' => './src/@styles'],
    urlPrefix: '/',
    entry: 'src/@scripts/main.js',
    manifestName: 'manifest.json',
);
