import '@styles/style.css';
import createCastawayApp from '@decodelabs/castaway';
import react from '@decodelabs/castaway/react';
import vue from '@decodelabs/castaway/vue';

createCastawayApp({
    integrations: {
        react,
        vue,
    },
    components: {
        MyThing: () => import('@components/MyThing.vue'),
        AnotherThing: () => import('@components/AnotherThing.vue'),
        ReactThing: () => import('@components/ReactModule.jsx'),
        AnotherReactThing: () => import('@components/ReactModule.jsx'),
    }
});
