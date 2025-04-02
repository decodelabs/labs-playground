import '@styles/style.css';
import createCastawayApp from '@decodelabs/castaway';
import react from '@decodelabs/castaway/react';
import vue from '@decodelabs/castaway/vue';

createCastawayApp({
    components: {
        MyThing: () => vue(import('@components/my-thing.vue')),
        AnotherThing: () => vue(import('@components/another-thing.vue')),
        ReactThing: () => react(import('@components/react-module.jsx')),
        AnotherReactThing: () => react(import('@components/react-module.jsx')),
    }
});
