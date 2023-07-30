import { createApp } from 'vue'


//import Components
import First from './vue-components/First.vue';
import PhoneInput from './vue-components/PhoneInput.vue';
import OtpInput from "./vue-components/OtpInput.vue";

const app = createApp({})

//register Components
app.component('first', First)
app.component('phone-input', PhoneInput)
app.component('otp-input', OtpInput)

app.mount("#app")
