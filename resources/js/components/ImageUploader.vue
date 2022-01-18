<template>
    <div v-for="image in images" :key="image.index" class="inline relative">
        <label class="block">
            <img :class="image.src ? 'inline' : 'hidden'" :src="image.src" />
            <div class="absolute bottom-0 w-full" v-if="image.originalName">
                <label>{{ image.originalName }}</label>
                <label class="float-right" v-if="image.originalName.match(/.(jpg|jpeg|png)$/i)">
                    Background:
                    <input ref="background" type="checkbox" @click="selectedAsBackground(image.id)" :checked="background == image.id">
                </label>
            </div>
            <div v-if="image.id === undefined">
                <input type="file" :name="`${inputName}[${image.index}]`" :class="!image.src ? 'inline' : 'hidden'" @change="imageUploaded(image.index)" accept="image/*,video/*" class="block w-full text-sm" />
            </div>
        </label>
    </div>
    <input name="background" type="hidden" :value="background" />
</template>

<script>
export default {
    props: ['inputName', 'existing', 'currentBg'],
    data() {
        return {
            background: null,
            images: [{
                index: 0,
                originalName: '',
                src: null
            }]
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
        'imageUploaded': function (imgIndex) {
            var file = this.$refs[`img-${imgIndex}`][0].files
            if (file) {
                this.images[imgIndex].originalName = file[0].name
                this.images[imgIndex].src = URL.createObjectURL(file[0])
                this.images.push({ index: this.images.length, src: null })
            }
        },
        'selectedAsBackground': function (id) {
            this.background = id; 
        }
    }
};
</script>