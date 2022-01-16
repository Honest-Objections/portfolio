import { createApp } from "vue";
import Portfolio from "./components/Portfolio.vue";
import MarkdownEditor from "./components/MarkdownEditor.vue"
import ImageUploader from "./components/ImageUploader.vue"
import Markdown from "./components/Markdown.vue"

const app = createApp({
    components: {
        Portfolio,
        MarkdownEditor,
        ImageUploader,
        Markdown
    }
});

app.mount("#app");