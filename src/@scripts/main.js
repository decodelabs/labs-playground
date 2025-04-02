import '@styles/style.css';
import createCastawayApp from '@decodelabs/castaway';
import react from '@decodelabs/castaway/react';
import vue from '@decodelabs/castaway/vue';

createCastawayApp({
    components: {
        MyThing: () => vue(import('@components/fragments/my-thing.vue')),
        AnotherThing: () => vue(import('@components/fragments/another-thing.vue')),
        ReactThing: () => react(import('@components/fragments/react-module.jsx')),
        AnotherReactThing: () => react(import('@components/fragments/react-module.jsx')),
    }
});
