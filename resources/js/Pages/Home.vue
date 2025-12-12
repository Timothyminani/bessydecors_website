<template>
  <PublicLayout>
    <div class="min-h-screen ">

    <div class="relative md:px-6 h-[90vh]   bg-no-repeat bg-container"
    :style="{ backgroundImage: `url(${DemoImage})`, backgroundSize: 'cover', backgroundPosition: 'center' }"
    >
    
<div class="absolute inset-0 bg-black/50"></div>


<div class="absolute inset-0 px-4 sm:px-6 lg:px-10 
            h-[70vh] flex flex-col justify-center items-center gap-4
            text-center  ">

  <!-- Heading Row -->
  <div class="w-full flex flex-wrap   justify-center items-center gap-2">

    <hr class="border-2 w-8 sm:w-12 border-[#D4AF37]">

    <h1 class="font-bold text-white 
               text-2xl sm:text-3xl md:text-4xl leading-tight">
      Welcome <span class="text-[#D4AF37] italic">Home</span> to Comfort & Style
    </h1>

    <hr class="border-2 w-8 sm:w-12 border-[#D4AF37]">

  </div>

  <!-- Sub heading -->
  <h1 class="font-medium text-white 
             text-lg sm:text-xl md:text-2xl">
    Furniture That Feels Like <span class="text-[#D4AF37] italic">Home</span>
  </h1>

  <!-- Paragraph -->
  <p class="font-medium text-white tracking-wide 
            text-sm sm:text-base md:text-lg 
            max-w-md sm:max-w-lg md:max-w-xl px-2">
    Transform your <span class="text-[#D4AF37] italic">home</span> with designs
    that elevate every room with sophistication.
    From elegant finishes to expert craftsmanship, we build pieces that stand out.
  </p>

  <!-- Button -->
  <div class="w-full   flex justify-center items-center mt-5">
    <a href="/allProducts"
       class="flex justify-center items-center gap-2 
              px-10 sm:px-14 md:px-20 py-3 
              bg-[#D4AF37] text-white font-semibold
              hover:bg-yellow-700 transition rounded-md text-sm sm:text-base">

      Shop Now
      <ShoppingBagIcon class="w-5 h-5" />
    </a>
  </div>

</div>


    </div>





<div class="flex flex-col justify-center items-center gap-2 w-full mt-10 mb-10">

    <div class="w-full flex justify-center items-center gap-4">
    <hr class="border-2 w-12 border-[#D4AF37]">
    <h1 class="font-bold text-blac text-2xl">Top Categories</h1>
     <hr class="border-2 w-12 border-[#D4AF37]">
    </div>

<div class="flex justify-center items-center w-full">



    <div class="grid md:grid-cols-4 grid-cols-1 gap-6 p-10">
       

       <div 
            @click="$inertia.get(`/allProducts?category=Dining`)"
          class="flex flex-col justify-center items-center gap-2">
        <div class="relative p-0 flex flex-col justify-center items-center gap-2 overflow-hidden group transition shadow-lg shadow-gray-500 rounded">
            <img :src="LivingRoom" alt="" class="   w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 rounded "/>

           

<div class="absolute inset-0 cursor-pointer bg-gradient-to-t from-black/86 to-transparent flex flex-col items-center justify-end text-center text-white 
              opacity-0 group-hover:opacity-100 transition-opacity duration-500">
  <div class="flex flex-col justify-center items-center gap-2 p-6">
    <p class="text-lg text-[#D4AF37] font-bold">Sofas & Couches</p>
    <p class=" font-semibold">Soft comfort crafted for everyday living. Elevate your space with designs that blend elegance and relaxation.</p>


<button
  @click="$inertia.get(`/allProducts?category=Dining`)"
 class="px-4 py-2 rounded-lg text-white font-semibold flex gap-2
               bg-gradient-to-r from-[#D4AF37] to-yellow-600 hover:from-yellow-600 hover:to-[#D4AF37] transition">
  Shop Now
     <ShoppingBagIcon class="w-5 h-5" />
</button>

</div>
</div>
   </div>

<h1 class="font-semibold ">Sofas & Couches</h1>

</div>







  <div 
    @click="$inertia.get(`/allProducts?category=Bedroom`)"
  class="flex flex-col justify-center items-center gap-2">
        <div class="relative p-0 flex flex-col justify-center items-center gap-2 overflow-hidden group transition shadow-lg shadow-gray-500  rounded">
            <img :src="BedRoom" alt="" class="   w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 rounded "/>

           

<div class="absolute inset-0 cursor-pointer bg-gradient-to-t from-black/86 to-transparent flex flex-col items-center justify-end text-center text-white 
              opacity-0 group-hover:opacity-100 transition-opacity duration-500">
  <div class="flex flex-col justify-center items-center gap-2 p-6">
    <p class="text-lg text-[#D4AF37] font-bold">Beds & Bedroom</p>
    <p class=" font-semibold">Where comfort meets luxury. Sleep deeper with premium designs made to transform your nights.</p>


<button class="px-4 py-2 rounded-lg text-white font-semibold flex gap-2
               bg-gradient-to-r from-[#D4AF37] to-yellow-600 hover:from-yellow-600 hover:to-[#D4AF37] transition">
  Shop Now
     <ShoppingBagIcon class="w-5 h-5" />
</button>

</div>
</div>
     </div>

<h1 class="font-semibold ">Beds & Bedroom</h1>

</div>










  <div 
    @click="$inertia.get(`/allProducts?category=Dining`)"
  class="flex flex-col justify-center items-center gap-2">
        <div class="relative p-0 flex flex-col justify-center items-center gap-2 overflow-hidden group transition shadow-lg shadow-gray-500  rounded">
            <img :src="Dinning" alt="" class="   w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 rounded "/>

           

<div class="absolute inset-0 cursor-pointer bg-gradient-to-t from-black/86 to-transparent flex flex-col items-center justify-end text-center text-white 
              opacity-0 group-hover:opacity-100 transition-opacity duration-500">
  <div class="flex flex-col justify-center items-center gap-2 p-6">
    <p class="text-lg text-[#D4AF37] font-bold">Dining Sets</p>
    <p class=" font-semibold">Create moments that matter. Stylish dining furniture designed for family connections and modern living.</p>


<button class="px-4 py-2 rounded-lg text-white font-semibold flex gap-2
               bg-gradient-to-r from-[#D4AF37] to-yellow-600 hover:from-yellow-600 hover:to-[#D4AF37] transition">
  Shop Now
     <ShoppingBagIcon class="w-5 h-5" />
</button>

</div>
</div>
           </div>

<h1 class="font-semibold ">Dining Sets</h1>

</div>







  <div 
    @click="$inertia.get(`/allProducts?category=Office`)"
  class="flex flex-col justify-center items-center gap-2">
        <div class="relative p-0 flex flex-col justify-center items-center gap-2 overflow-hidden group transition shadow-lg shadow-gray-500 rounded">
            <img :src="Office" alt="" class="   w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 rounded "/>

           

<div class="absolute inset-0 cursor-pointer bg-gradient-to-t from-black/86 to-transparent flex flex-col items-center justify-end text-center text-white 
              opacity-0 group-hover:opacity-100 transition-opacity duration-500">
  <div class="flex flex-col justify-center items-center gap-2 p-6">
    <p class="text-lg text-[#D4AF37] font-bold">Office & Work Space</p>
    <p class=" font-semibold">Work smarter in comfort. Sleek, ergonomic pieces built for productivity and style</p>


<button class="px-4 py-2 rounded-lg text-white font-semibold flex gap-2
               bg-gradient-to-r from-[#D4AF37] to-yellow-600 hover:from-yellow-600 hover:to-[#D4AF37] transition">
  Shop Now
     <ShoppingBagIcon class="w-5 h-5" />
</button>

</div>
</div>

   </div>

<h1 class="font-semibold ">Office & Work Space</h1>

</div>






        
    </div>



</div>



</div>






<div class="flex flex-col justify-center items-center gap-2 w-full mt-10 mb-10">

    <div class="w-full flex justify-center items-center gap-4">
    <hr class="border-2 w-12 border-[#D4AF37]">
    <h1 class="font-bold text-blac text-2xl">Featured Products</h1>
     <hr class="border-2 w-12 border-[#D4AF37]">
    </div>
    </div>

<div class="px-7">
   
 <Swiper
  :modules="[Navigation, Pagination]"
  :slides-per-view="1.3"
  :space-between="20"
  :loop="true"
  :navigation="true"
  :pagination="{ clickable: true }"
  :breakpoints="{
    640: { slidesPerView: 2 },
    1024: { slidesPerView: 4 }
  }"
  class="mySwiper"
>





      <swiper-slide  v-for="product in featuredProducts" :key="product.id">
        <div class="rounded-lg shadow-2xl shadow-gray-400 p-4 group bg-white ">
         <img :src="`/storage/${product.image_1}`" class="w-full h-50 object-cover rounded transition-transform duration-500 group-hover:scale-90" />
          <h3 class="mt-2 text-lg font-semibold">{{ product.name }}</h3>

<div class="flex space-x-1">
    <StarSolid class="w-5 h-5 text-yellow-500" />
    <StarSolid class="w-5 h-5 text-yellow-500" />
    <StarSolid class="w-5 h-5 text-yellow-500" />
    <StarSolid class="w-5 h-5 text-yellow-500" />
    <StarOutline class="w-5 h-5 text-gray-300" />
  </div>

          
          <p class="text-gray-600 text-sm">{{ product.price }} Ksh</p>

<button>
      <a :href="`/products/${product.id}`" class="flex justify-center items-center gap-2 mt-3 px-4 py-2 bg-[#D4AF37] text-white font-semibold  hover:bg-yellow-700 transition rounded">View Details  <ArrowRightOnRectangleIcon class="w-5 h-5" /></a>
</button>

        </div>
      </swiper-slide>






   
    
  
  </Swiper>


</div>





  <section class="relative bg-yellow-50 overflow-hidden">
  <div
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20 py-16 lg:py-32 flex flex-col lg:flex-row items-center gap-12 "
  >
    
    <!-- LEFT: Text + Offer -->
    <div class="w-full lg:w-1/2 space-y-6  text-center lg:text-left ">
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
        Upgrade Your Home with Our Latest Offers
      </h1>

      <p class="text-gray-700 text-base sm:text-lg lg:text-xl">
        Discover premium furniture with up to 
        <span class="font-bold text-yellow-600">50% off</span> 
        on selected items. Comfort, style, and affordability – all in one place.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
        <a 
          href="/allProducts"
          class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-6 py-3 rounded-lg transition text-center"
        >
          Shop Now
        </a>

        <a 
          href="/contact"
          class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-900 font-semibold px-6 py-3 rounded-lg transition text-center"
        >
          Learn More
        </a>
      </div>
    </div>

    <!-- RIGHT: Hero Image -->
    <div class="w-full lg:w-1/2 flex justify-center">
      <img 
        src="@/images/office3.jpg" 
        alt="Furniture Offer"
        class="w-full max-w-sm sm:max-w-md lg:max-w-lg rounded-xl shadow-xl object-cover"
      />
    </div>

  </div>

  <!-- Background gradient -->
  <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-l md:from-yellow-50 from-yellow-50 md:via-yellow- to-transparent pointer-events-none"></div>
</section>



<div class="flex flex-col justify-center items-center gap-2 w-full mt-10 mb-10">

    <div class="w-full flex justify-center items-center gap-4">
    <hr class="border-2 w-12 border-[#D4AF37]">
    <h1 class="font-bold text-blac text-2xl">Customer Review</h1>
     <hr class="border-2 w-12 border-[#D4AF37]">
    </div>
    </div>


<div class="flex space-x-10 justify-center items-center px-10 mb-10 md:flex-row flex-col md:gap-0 gap-6">

    <div class="flex flex-col justify-center items-center gap-4 p-6 shadow-lg shadow-gray-400 rounded-lg max-w-sm">
        <UserCircleIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">John Doe</h3>
        <p class="text-center text-gray-600">"I recently purchased a sofa from Dfuniture, and I couldn't be happier. The quality is outstanding, and it has transformed my living room!"</p>
    </div>

    <div class="flex flex-col justify-center items-center gap-4 p-6 shadow-lg shadow-gray-400 rounded-lg max-w-sm">
        <UserCircleIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Jane Smith</h3>
        <p class="text-center text-gray-600">"The custom dining table I ordered exceeded my expectations. The craftsmanship is impeccable, and it fits perfectly in my home."</p>
    </div>

    <div class="flex flex-col justify-center items-center gap-4 p-6 shadow-lg shadow-gray-400 rounded-lg max-w-sm">
        <UserCircleIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Michael Brown</h3>
        <p class="text-center text-gray-600">"Exceptional service from start to finish. The team at Dfuniture helped me choose the  perfect pieces for my office space."</p  >
        </div>






</div>





<div class="flex flex-col justify-center items-center gap-2 w-full mt-10 mb-10">

    <div class="w-full flex justify-center items-center gap-4">
    <hr class="border-2 w-12 border-[#D4AF37]">
    <h1 class="font-bold text-blac text-2xl">Photo Galary</h1>
     <hr class="border-2 w-12 border-[#D4AF37]">
    </div>
    </div>

<div class="flex space-x-1 justify-center items-center px-10 mb-10">

<Swiper
    
    :slides-per-view="1.3"
    :space-between="20"
    :modules="[Navigation, Pagination]"
    :loop="true"
    :navigation="true"
    :pagination="{ clickable: true }"
     :breakpoints="{
       640: { slidesPerView: 2 },
       1024: { slidesPerView: 2 }
  }"
    class="mySwiper"
  >

      <swiper-slide  v-for="(image, index) in galleryImages" :key="index">
        <div class="rounded-lg shadow-2xl shadow-gray-400 p-4 group bg-white ">
         <img :src="image" class="w-full h-100 object-cover rounded transition-transform duration-500 group-hover:scale-90" />
        </div>
      </swiper-slide>
    

     </Swiper>
</div>


    </div>




<div class="flex flex-col justify-center items-center gap-2 w-full mt-10 mb-10">

    <div class="w-full flex justify-center items-center gap-4">
    <hr class="border-2 w-12 border-[#D4AF37]">
    <h1 class="font-bold text-blac text-2xl">Why Choose Us?</h1>
     <hr class="border-2 w-12 border-[#D4AF37]">
    </div>
    </div>


<div class="flex space-x-10 justify-center items-center px-10 mb-10 md:flex-row flex-col">

    <div class="flex flex-col justify-center items-center gap-4 p-6  rounded-lg">
        <ShieldCheckIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Quality Craftsmanship</h3>
        <p class="text-center text-gray-600">Our furniture is built to last with premium materials and expert craftsmanship.</p>
    </div>

    <div class="flex flex-col justify-center items-center gap-4 p-6 rounded-lg">
        <TruckIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Free Delivery</h3>
        <p class="text-center text-gray-600">Enjoy free delivery on all orders, bringing your new furniture right to your doorstep.</p>
    </div>

    <div class="flex flex-col justify-center items-center gap-4 p-6 rounded-lg">
        <ClipboardDocumentListIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Custom Designs</h3>
        <p class="text-center text-gray-600">We offer custom furniture options to fit your unique style and space.</p>
    </div>

    <div class="flex flex-col justify-center items-center gap-4 p-6 rounded-lg">
        <Cog6ToothIcon class="w-12 h-12 text-[#D4AF37]" />
        <h3 class="text-lg font-semibold">Exceptional Service</h3>
        <p class="text-center text-gray-600">Our dedicated team is here to assist you every step of the way.</p>

</div>


</div>










  </PublicLayout>
</template>

<script setup>
import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, TruckIcon, ClipboardDocumentListIcon, ShoppingBagIcon, ArrowRightOnRectangleIcon, StarIcon as StarOutline } from '@heroicons/vue/24/outline'
import { StarIcon as StarSolid } from '@heroicons/vue/24/solid'
import PublicLayout from '@/Layouts/PublicLayout.vue'
import DemoImage from '@/images/demoImage4.jpg'
import LivingRoom from '@/images/livingRoom3.jpg'
import BedRoom from '@/images/beds1.avif'
import Dinning from '@/images/dining2.jpg'
import Office from '@/images/office4.jpg'
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";

import img1 from "@/images/dining1.jpg"
import img2 from "@/images/dining2.jpg"
import img3 from "@/images/dining3.webp"
import img4 from "@/images/dining4.jpg"
import img5 from "@/images/dining5.webp"

const galleryImages = [img1, img2, img3, img4, img5]



const props = defineProps({
  featuredProducts: Array
});



</script>


<style>
.swiper-button-next,
.swiper-button-prev {
  color: black !important;
  z-index: 999;
  color: #D4AF37 !important;
  
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