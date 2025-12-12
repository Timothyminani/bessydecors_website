<template>
  <PublicLayout>
  <div class="max-w-6xl mx-auto p-6">

    <!-- Product Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

      <!-- LEFT: IMAGE -->
      <div>
       
   <img
        :src="mainImage"
        class="w-full h-80 object-cover rounded-lg shadow transition"
    />




        <!-- Additional images (optional) -->
        <div class="flex gap-3 mt-4 overflow-x-auto">
        <div
    v-for="img in images"
    :key="img"
    class="p-1 rounded-lg cursor-pointer"
    :class="activeImage === img ? 'border-2 border-yellow-500' : 'border'"
    @click="changeImage(img)"
  >
    <img
      :src="`/storage/${img}`"
      class="w-24 h-24 object-cover rounded-md"
    />
  </div>
        </div>
      </div>

      <!-- RIGHT: DETAILS -->
      <div>
        <h1 class="text-3xl font-bold mb-4">{{ product.name }}</h1>

        <p class="text-gray-700 mb-3">
          Category: <span class="font-semibold">{{ product.category }}</span>
        </p>

        <p class="text-2xl font-semibold text-green-600 mb-4">
          Ksh {{ product.price.toFixed(2) }}
        </p>

        <p class="text-gray-600 mb-6 whitespace-pre-line">
          {{ product.description }}
        </p>


<div class="flex w-full gap-3">
        <button
          class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-6 py-3 rounded-lg transition"
        >
          Add to Cart
        </button>

      <!-- WhatsApp Button -->
  <a
    :href="whatsappLink"
    target="_blank"
    class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded-lg transition flex items-center gap-2  md:w-auto"
  >
    <!-- WhatsApp Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
      <path d="M20.52 3.48A11.92 11.92 0 0 0 12.05 0C5.66 0 .61 5.05.61 11.44c0 2 .52 3.93 1.52 5.66L0 24l7.15-2a11.38 11.38 0 0 0 4.9 1.12h.01c6.4 0 11.46-5.05 11.46-11.44 0-3.05-1.18-5.92-3.23-8.2zM12.05 21.3c-1.5 0-2.97-.4-4.25-1.17l-.3-.17-4.24 1.18 1.14-4.13-.2-.32A9.69 9.69 0 0 1 2.19 11.4c0-5.4 4.46-9.8 9.96-9.8a9.73 9.73 0 0 1 6.97 2.9 9.76 9.76 0 0 1 2.88 6.92c0 5.4-4.46 9.8-9.95 9.8zm5.48-7.33c-.3-.15-1.78-.88-2.06-.97-.28-.1-.48-.15-.68.15-.2.3-.78.97-.95 1.17-.17.2-.35.22-.66.07-.3-.15-1.25-.46-2.38-1.47-.88-.77-1.47-1.7-1.64-2-.17-.3-.02-.47.13-.62.14-.15.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.68-1.65-.93-2.27-.24-.6-.5-.52-.68-.52h-.58c-.2 0-.53.07-.8.38-.28.3-1.05 1-1.05 2.47 0 1.46 1.08 2.87 1.24 3.07.15.2 2.14 3.34 5.2 4.68 3.06 1.33 3.06.9 3.62.85.56-.05 1.78-.72 2.03-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.34z"/>
    </svg>

    WhatsApp Us
  </a>




</div>
      </div>

    </div>
  </div>





<!-- RELATED PRODUCTS -->
<!-- RELATED PRODUCTS -->
<div class="mt-16 px-8">
  <h2 class="text-2xl font-bold mb-6 text-center">Related Products</h2>

  <Swiper
      :modules="modules"
      :slides-per-view="1.3"
      :space-between="15"
      :navigation="true"
      :breakpoints="{
        640: { slidesPerView: 2.3 },
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 4 }
      }"
      class="pb-10"
  >
    <SwiperSlide
      v-for="item in related"
      :key="item.id"
      @click="$inertia.get(`/products/${item.id}`)"
      class="cursor-pointer"
    >
      <div class="border rounded-lg p-3 shadow hover:shadow-lg transition">
        <img
          :src="`/storage/${item.image_1}`"
          class="w-full h-40 object-cover rounded-md"
        />

        <p class="font-semibold mt-3 line-clamp-1">{{ item.name }}</p>
        <p class="text-green-600 font-bold">Ksh {{ item.price }}</p>
      </div>
    </SwiperSlide>
  </Swiper>

</div>










    </PublicLayout>
</template>




<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { ref } from "vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';

import { Navigation } from 'swiper/modules';
const modules = [Navigation];


const props = defineProps({
  product: Object,
  related: Array
});

// List all images that exist safely
const images = [
  props.product?.image_1,
  props.product?.image_2,
  props.product?.image_3
].filter(Boolean);

// fallback image
const defaultImg = images.length ? images[0] : null;

const mainImage = ref(defaultImg ? `/storage/${defaultImg}` : null);
const activeImage = ref(defaultImg);

const changeImage = (img) => {
  mainImage.value = `/storage/${img}`;
  activeImage.value = img;
};




const phoneNumber = "254716635598"; 

const message = encodeURIComponent(
  `Hello, I am interested in this product:\n` +
  `• Name: ${props.product.name}\n` +
  `• Category: ${props.product.category}\n` +
  `• Price: Ksh ${props.product.price}\n\n` +
  `Can you give me more details?`
);

const whatsappLink = `https://wa.me/${phoneNumber}?text=${message}`;






</script>




<style>
.swiper-button-next,
.swiper-button-prev {
  color: black !important;
  z-index: 999;
  color: black !important;
  
}


.mySwiper {
  padding-bottom: 40px;
   
}


 .swiper-pagination-bullet {
    background: #d4af37 !important; /* gold */
    opacity: 0.5;
  }

  .swiper-pagination-bullet-active {
    background: #b8860b !important; /* darker gold */
    opacity: 1;
    transform: scale(1.3);
  }








</style>