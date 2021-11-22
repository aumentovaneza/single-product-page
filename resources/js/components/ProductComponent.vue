<template>
    <div>
        <!-- Image gallery -->
        <product-images-component :images="product.images">

        </product-images-component>
        <product-detail-component :name="product.name"
                                  :description="product.description"
                                  :variants="product.variants"
                                  :id="product.id"
                                  :price="product.price"
        >
        </product-detail-component>
    </div>
</template>

<script>
export default {
    name: "product-component",
    props : ['id'],
    data : function() {
        return {
            product : null
        }
    },
    mounted() {
        this.getProduct();
    },
    methods : {
        getProduct : function() {
            axios.get('data/'+this.id).then((response) => {
                this.product = response.data.data;
            });
        }
    },
    computed : {
    }
}
</script>

<style scoped>

</style>
