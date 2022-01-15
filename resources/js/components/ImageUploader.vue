<template>
    <div v-for="image in images" :key="image.index" class="inline relative">
        <input :ref="`img-${image.index}`" type="file" :name="`${inputName}[${image.index}]`" :class="!image.src ? 'inline' : 'hidden'" @change="imageUploaded(image.index)" accept="image/*" />
        <img :class="image.src ? 'inline' : 'hidden'" :src="image.src" />
        <div class="absolute bottom-0" v-if="image.id !== undefined">
            <label>{{ image.originalName }}</label>
        </div>
    </div>
</template>

<script>
export default {
    props: ['inputName', 'existing'],
    data() {
        return {
            images: [{
                index: 0,
                src: null
            }]
        }
    },
    mounted: function () {
        var self = this; 
        JSON.parse(this.existing).forEach(image => {
            self.images.push(image); 
        });
        console.log(this.images) 
    },
    methods: {
        'imageUploaded': function (imgIndex) {
            var file = this.$refs[`img-${imgIndex}`][0].files
            if (file) {
                this.images[imgIndex].src = URL.createObjectURL(file[0])
                this.images.push({ index: this.images.length, src: null })
            }
        }
    }
};
</script>