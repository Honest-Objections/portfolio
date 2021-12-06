import { createApp } from "vue";
import Portfolio from "./components/Portfolio.vue";

const app = createApp({
    components: {
        Portfolio
    }
});

app.mount("#app");