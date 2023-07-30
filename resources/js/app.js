import { createApp } from 'vue'


//import Components
import First from './vue-components/First.vue';
import PhoneInput from './vue-components/PhoneInput.vue';

const app = createApp({})

//register Components
app.component('first', First)
app.component('phone-input', PhoneInput)

app.mount("#app")
