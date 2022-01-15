import { createApp } from "vue";
import Portfolio from "./components/Portfolio.vue";
import MarkdownEditor from "./components/MarkdownEditor.vue"
import ImageUploader from "./components/ImageUploader.vue"

const app = createApp({
    components: {
        Portfolio,
        MarkdownEditor,
        ImageUploader
    }
});

app.mount("#app");