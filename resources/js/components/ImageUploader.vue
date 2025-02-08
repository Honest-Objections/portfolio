<template>
    <input type="file" :name="`${inputName}[]`" ref="fileInput" :class="inline" @change="imageUploaded()" accept="image/*,video/*" class="block w-full text-sm" multiple="multiple" />
    <input name="background" type="hidden" :value="background" />
    <div v-for="(image, index) in images" :key="index" class="inline relative">
        <label class="block">
            <img :class="image.src ? 'inline' : 'hidden'" :src="image.src" />
            <div class="absolute bottom-0 w-full" v-if="image.originalName">
                <label>{{ image.originalName }}</label>
                <span v-if="image.id">
                    <button class="px-5" @click.prevent="deleteImage(image.id, index)">Delete</button>
                    <label class="float-right" v-if="image.originalName.match(/.(jpg|jpeg|png)$/i)">
                        Background:
                        <input ref="background" type="checkbox" @click="selectedAsBackground(image.id)" :checked="background === image.id">
                    </label>
                </span>
            </div>
            <div v-if="image.id === undefined">
                <p>(pending) {{ image.name }}</p>
            </div>
        </label>
    </div>
</template>

<script>
export default {
    props: ['inputName', 'existing', 'currentBg'],
    data() {
        return {
            background: null,
            images: []
        }
    },
    mounted: function () {
        var self = this; 
        JSON.parse(this.existing).forEach(image => {
            self.images.push(image); 
        });
        self.background = self.currentBg; 
    },
    methods: {
        'imageUploaded': function () {
            console.log(this.$refs.fileInput.files)
            this.$refs.fileInput.files.forEach(file => {
                console.log("uploaded", file)
                this.images.push({
                    originalName: file.name,
                    src: URL.createObjectURL(file),
                    background: false,
                    file: file
                })
            })
        },
        'deleteImage': async function(id, index) {
            const token = document.head.querySelector('meta[name="csrf-token"]').content;
            const self = this
            const response = await fetch(`/api/images/${id}`, { 
                method: "DELETE", 
                headers: { 
                    "Content-Type": "application/json", 
                    "X-CSRF-TOKEN": token 
                } 
            });
            
            if (response.ok) {
                console.log('image successfully removed', index, id, self.images)
                self.images.splice(index, 1)
            } else {
                console.error("Failed to delete image", id, err)
            }
            
        },
        'selectedAsBackground': function (id) {
            this.background = id; 
        }
    }
};
</script>