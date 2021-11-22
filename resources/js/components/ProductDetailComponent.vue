<template>
    <div>
        <!-- Product info -->
        <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                    {{ name }}
                </h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:mt-0 lg:row-span-3">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl text-gray-900">${{ productPrice }}</p>

                <div class="mt-10">
                    <!-- Sizes -->
                    <div class="mt-10">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm text-gray-900 font-medium">Size</h3>
                        </div>

                        <fieldset class="mt-4">
                            <legend class="sr-only">
                                Choose a size
                            </legend>
                            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                <template v-for=" variant in variants ">
                                    <label
                                        :class="[variant.id === selectedVariant ? ['ring-2', 'ring-indigo-500'] : ['ring-indigo-200']]"
                                        class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                                        <input type="radio"
                                               name="size-choice"
                                               :value=variant.id
                                               class="sr-only"
                                               aria-labelledby="size-choice-1-label"
                                               @change="changeSelectVariant(variant.id)"
                                        >
                                        <p id="size-choice-1-label">
                                            {{ variant.variant_value }}
                                        </p>
                                        <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></div>
                                    </label>
                                </template>
                            </div>
                        </fieldset>
                    </div>

                    <button @click="changeShowPaymentStatus()" type="button" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                       Buy Now
                    </button>
                </div>
            </div>

            <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">
                           {{ description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="showPayment" class="border-2 max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-1 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
            <h1 class="mb-16 text-2xl font-bold">Payment Details</h1>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" v-model="paymentDetails.firstName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"  v-model="paymentDetails.lastName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="text" name="email-address" id="email-address" autocomplete="email" v-model="paymentDetails.emailAddress" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select id="country" name="country" autocomplete="country-name"  v-model="paymentDetails.country" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>United States</option>
                        <option>Canada</option>
                        <option>Mexico</option>
                    </select>
                </div>

                <div class="col-span-6">
                    <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                    <input type="text" name="street-address" id="street-address" autocomplete="street-address"  v-model="paymentDetails.streetAddress" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" autocomplete="address-level2"  v-model="paymentDetails.city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                    <input type="text" name="region" id="region" autocomplete="address-level1"  v-model="paymentDetails.state" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"  v-model="paymentDetails.zip" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Card Details</label>
                    <StripeElements
                        :stripe-key="stripeKey"
                        :instance-options="instanceOptions"
                        :elements-options="elementsOptions"
                        #default="{ elements }"
                    ref="elms"
                    >
                        <StripeElement
                            type="card"
                            :elements="elements"
                            :options="cardOptions"
                            :class="['border-gray-300','border','mt-1', 'block', 'w-full', 'rounded-md', 'shadow-sm', 'py-2', 'px-3', 'focus:ring-indigo-500', 'focus:border-indigo-500', 'sm:text-sm']"
                            ref="card"
                        />
                    </StripeElements>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <button type="button" @click="pay" class="mt-4 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Make Payment
                    </button>
                </div>
        </div>
    </div>
    </div>
</template>
<script>
import { StripeElements, StripeElement,createToken } from 'vue-stripe-elements-plus';

export default {
    name: "product-detail-component",
    components : { StripeElements, StripeElement },
    props: ['name','description','variants','id','price'],
    data : function (){
        return {
            selectedVariant : 1,
            completed: false,
            stripeKey: 'pk_test_51JyRgXKIHyNCmSayln2j2Wj10uee7drwG173HfYnsgvqrgjMuNenjCsH7bPBG1776Zu61efCqmTFzSmDeHSHHopx00WAdCBYL9', // test key, don't hardcode
            instanceOptions: {
            },
            elementsOptions: {
            },
            cardOptions: {
                hidePostalCode: true
            },
            paymentDetails : {
                firstName : "",
                lastName : "",
                emailAddress : "",
                country : "",
                streetAddress : "",
                city : "",
                state : "",
                zip : ""
            },
            showPayment: false
        }
    },
    methods : {
        changeSelectVariant(id) {
            this.selectedVariant = id;
        },
        async pay() {
            const groupComponent = this.$refs.elms
            const cardComponent = this.$refs.card

            const cardElement = cardComponent.stripeElement

            groupComponent.instance.createToken(cardElement).then(result => {
                axios.post('../checkout', {
                    stripeToken : result.token.id,
                    amount : this.price,
                    currency : 'USD',
                    description : this.name,
                    id : this.id,
                    paymentDetails : this.paymentDetails
                }).then((response) => {
                    this.$swal(response.data);
                    this.resetForm();
                });
            })
        },
        changeShowPaymentStatus() {
            if (this.showPayment === false) {
                this.showPayment = true;
            } else {
                this.showPayment = false;
            }
        },
        resetForm() {
            this.paymentDetails.firstName = "";
            this.paymentDetails.lastName = "";
            this.paymentDetails.emailAddress = "";
            this.paymentDetails.country = "";
            this.paymentDetails.streetAddress = "";
            this.paymentDetails.city = "";
            this.paymentDetails.state = "";
            this.paymentDetails.zip = "";
            this.showPayment = false;

        }
    },
    computed : {
        productPrice() {
            let val = (this.price/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    }
}
</script>

<style scoped>
</style>
