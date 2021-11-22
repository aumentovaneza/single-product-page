<template>
    <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
        <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
            <img :src="image1.file_path" :alt="image1.file_name" class="w-full h-full object-center object-cover">
        </div>
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                <img  :src="image2.file_path" :alt="image2.file_name" class="w-full h-full object-center object-cover">
            </div>
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                <img  :src="image3.file_path" :alt="image3.file_name" class="w-full h-full object-center object-cover">
            </div>
        </div>
        <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
            <img  :src="image4.file_path" :alt="image4.file_name" class="w-full h-full object-center object-cover">
        </div>
    </div>
</template>

<script>
export default {
    name: "product-images-component",
    props: ['images'],
    computed :  {
        image1 : function() {
            return this.images[0];
        },
        image2 : function() {
            return this.images[1];
        },
        image3 : function() {
            return this.images[2];
        },
        image4 : function() {
            return this.images[3];
        }
    }
}
</script>

<style scoped>

</style>
