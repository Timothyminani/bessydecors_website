<template>
  <PublicLayout>
    <div class="w-full h-[380px] relative flex items-center justify-center py-2 mt-10 ">
      <Swiper
        :modules="[Autoplay, Pagination, Navigation]"
        :pagination="{ clickable: true }"
        :navigation="true"
        :loop="true"
        :autoplay="{ delay: 4500, disableOnInteraction: false }"
        class="w-260 h-full md:rounded-2xl"
      >
        <SwiperSlide v-for="(slide, index) in slides" :key="index">
          <div
            class="h-full w-full bg-cover bg-center relative"
            :style="{ backgroundImage: `url(${slide.image})` }"
          >
            <div class="absolute inset-0 bg-black/50"></div>

            <div class="absolute inset-0 flex flex-col justify-center px-6 md:px-20 text-white max-w-xl">
              <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
                {{ slide.title }}
              </h1>
              <p class="text-lg md:text-xl mb-6">
                {{ slide.text }}
              </p>

              <a
                :href="slide.link"
                class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-3 rounded-lg w-max transition"
              >
                {{ slide.button }}
              </a>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
    </div>








<div class="">
   

   
    <h2  class="text-2xl font-bold mb-6 text-center mt-10">
         {{ selectedCategory ? selectedCategory : 'All Products' }}
     </h2>




<!-- Category Buttons Scroll -->
<div class="flex gap-3 md:justify-center items-center overflow-x-auto py-3 md:px-0 px-3 ">


<button
    @click="filterByCategory(null)"
    :class="[
      'px-4 py-2 rounded-full whitespace-nowrap border transition',
      !selectedCategory
        ? 'bg-yellow-500 text-black border-yellow-700'
        : 'bg-white border-gray-300 text-gray-700'
    ]"
  >

 All
  </button>





  <button
    v-for="cat in categories"
    :key="cat"
    @click="filterByCategory(cat)"
    :class="[
      'px-4 py-2 rounded-full whitespace-nowrap border transition',
      selectedCategory === cat
        ? 'bg-yellow-500 text-black border-yellow-700'
        : 'bg-white border-gray-300 text-gray-700'
    ]"
  >
    {{ cat }}
  </button>
</div>




 <!-- Product Card Grid -->

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 md:px-10 lg:px-20 mb-10">
      <!-- Product Card -->
      <div
         v-for="product in page.props.All_products.data"
        :key="product.id"
        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition"
      >
        <img
          :src="`/storage/${product.image_1}`"
          :alt="product.name"
          class="w-full h-48 object-cover"
        />
        <div class="p-4   ">
          <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>

<div class="flex space-x-1">
    <StarSolid class="w-4 h-4 text-yellow-500" />
    <StarSolid class="w-4 h-4 text-yellow-500" />
    <StarSolid class="w-4 h-4 text-yellow-500" />
    <StarSolid class="w-4 h-4 text-yellow-500" />
    <StarOutline class="w-4 h-4 text-gray-300" />
  </div>


          <p class="text-gray-600 mb-4">Ksh{{ product.price.toFixed(2) }}</p>

          <a
            :href="`/products/${product.id}`"
            class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-lg w-full text-center transition"
          >
            View Details
          </a>
        </div>
      </div>
      </div>


</div>


<!-- Pagination -->
<div class="flex justify-center mt-8 mb-16">
  <nav class="flex space-x-1 gap-5">
    <button
      v-for="link in page.props.All_products.links"
      :key="link.label"
      :disabled="!link.url"
      @click="goTo(link.url)"
      v-html="link.label"
      class="px-3 py-1 border rounded text-sm"
      :class="{
        'bg-yellow-500 text-white': link.active,
        'bg-gray-100 hover:bg-gray-200': !link.active && link.url,
        'text-gray-300 cursor-not-allowed': !link.url
      }"
    ></button>
  </nav>
</div>




  </PublicLayout>
</template>


<script setup>
import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, TruckIcon, ClipboardDocumentListIcon, ShoppingBagIcon, ArrowRightOnRectangleIcon, StarIcon as StarOutline } from '@heroicons/vue/24/outline'
import { StarIcon as StarSolid } from '@heroicons/vue/24/solid'
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import { router, usePage } from '@inertiajs/vue3';
import { ref } from "vue";


import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// Import local images
import img1 from "@/images/dining1.jpg"
import img2 from "@/images/dining2.jpg"
import img3 from "@/images/dining3.webp"

const slides = [
  {
    image: img1,
    title: 'Comfort Meets Style',
    text: 'Experience premium furniture built for modern living.',
    button: 'Shop Sofas',
    link: '/products/sofas'
  },
  {
    image: img2,
    title: 'Create Beautiful Moments',
    text: 'Elegant dining sets designed for modern homes.',
    button: 'Browse Dining',
    link: '/products/dining'
  },
  {
    image: img3,
    title: 'Your Dream Bedroom',
    text: 'Discover beds crafted for peaceful nights.',
    button: 'Explore Bedroom',
    link: '/products/bedroom'
  }
];



const props = defineProps({
  All_products: Array,
  categories: Array,
  selectedCategory: String,
  searchTerm: String
});



const page = usePage();

function goTo(url) {
  if (url) {
    router.visit(url);
  }
}






const filterByCategory = (category) => {
  if (!category) {
    router.get('/allProducts', {}, {
      preserveScroll: true,
      preserveState: true
    });
  } else {
    router.get('/allProducts', { category }, {
      preserveScroll: true,
      preserveState: true
    });
  }
};







</script>




<style>
/* Optional: make pagination dots larger and goldish */
.swiper-pagination-bullet {
  width: 10px;
  height: 10px;
  background: #facc15 !important; /* yellow-400 */
  opacity: 0.8;
}

.swiper-pagination-bullet-active {
  background: #eab308 !important; /* yellow-500 */
  opacity: 1;
   transform: scale(1.3);
}



.swiper-button-next,
.swiper-button-prev {
  color: black !important;
  z-index: 999;
  color: #D4AF37 !important;
  
}





</style>