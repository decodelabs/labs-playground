import '@styles/style.css';
import createCastawayApp from '@decodelabs/castaway';
import react from '../../../castaway-client/src/integrations/react';
import vue from '@decodelabs/castaway/vue';

createCastawayApp({
    components: {
        MyThing: () => vue(import('@components/MyThing.vue')),
        AnotherThing: () => vue(import('@components/AnotherThing.vue')),
        ReactThing: () => react(import('@components/ReactModule.jsx')),
        AnotherReactThing: () => react(import('@components/ReactModule.jsx')),
    }
});
