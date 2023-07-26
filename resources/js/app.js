import { createApp } from 'vue'


//import Components
import First from './vue-components/First.vue'

const app = createApp({})

//register Components
app.component('first', First)

app.mount("#app")
