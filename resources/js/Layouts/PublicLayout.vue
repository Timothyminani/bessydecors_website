<template>
  <div class="min-h-screen flex flex-col bg-white text-gray-900">

    <!-- NAVIGATION BAR -->
    <header class="shadow-sm bg-white fixed top-0 left-0 w-full z-50 ">
      <nav class="max-w-7xl mx-auto md:pr-0 pr-2 md:px-6 flex items-center bg-white md:justify-between">
        
        <!-- LOGO -->
        <h1 class="text-2xl  font-bold text-black">
         <img :src="LogoDemo" alt="Profile Picture" class="w-28 md:w-33 h-19"/>
        </h1>







<!-- LINKS -->
<div
  :class="mobileMenuOpen 
    ? 'block absolute top-full right-0 w-70 bg-white shadow-md md:static md:block' 
    : 'hidden md:block'"
  class="md:flex items-center  py-6 px-10"
>

    <ul class="flex md:flex-row flex-col gap-8 text-lg font-medium md:bg-transparent md:w-auto">
          <li><Link href="/home" class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Home</Link></li>
          
         <li class="relative">

  <!-- DESKTOP: Hover dropdown -->
  <div class="hidden md:block group">
    <Link 
      href="/allProducts"
      class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37]"
    >
      Products
    </Link>

    <ul
      class="absolute left-0 mt-6 w-52 bg-white shadow-lg py-2
             opacity-0 invisible group-hover:opacity-100 group-hover:visible
             transition-all duration-200"
    >
      <li
        v-for="cat in categories"
        :key="cat"
        class="block px-4 py-2 hover:bg-gray-100 cursor-pointer"
        @click="$inertia.get(`/allProducts?category=${cat}`)"
      >
        {{ cat }}
      </li>
    </ul>
  </div>

  <!-- MOBILE: Click dropdown -->
  <div class="block md:hidden">
    <button
      @click="productOpen = !productOpen"
      class="w-full py-3 px-3 flex gap-2 items-center hover:text-[#D4AF37]"
    >
      Products
      <span>{{ productOpen ? '▲' : '▼' }}</span>
    </button>

    <ul
      v-show="productOpen"
      class="ml-4 mt-2 flex flex-col gap-2  rounded-lg p-2 "
    >
      <li
        v-for="cat in categories"
        :key="cat"
        class="block px-4 py-2 text-gray-600 hover:bg-gray-100 cursor-pointer rounded"
        @click="$inertia.get(`/allProducts?category=${cat}`)"
      >
        {{ cat }}
      </li>
    </ul>
  </div>

</li>

           <li><Link href="/blog"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Blog</Link></li>
          <li><Link href="/about"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">About</Link></li>
          <li><Link href="/contact"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Contact</Link></li>
        </ul>






</div>



<!-- CENTER: SEARCH BAR -->
    <div class="flex justify-center items-center  w-1/2 md:w-1/4 ">
      <div class="relative">
       <form @submit.prevent="submitSearch" class="flex items-center gap-2">
    <input
        v-model="search"
        type="text"
        placeholder="Search products..."
        class="px-3 py-2 border border-[#D4AF37] rounded-lg focus:outline-none focus:ring w-full md:w-64"
    />

    <button
        type="submit"
        class="px-4 py-2 md:flex hidden bg-[#D4AF37] hover:bg-yellow-600 rounded-lg"
    >
        Search
    </button>
</form>

      </div>
    </div>

    <!-- RIGHT: ICONS -->
    <div class="flex items-center  gap-0 md:gap-6 px-8">

      <!-- CART ICON -->
      <div class="relative cursor-pointer hover:text-black">
        <svg class="w-7 h-7 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path d="M3 3h2l.4 2M7 13h10l4-8H5.4"></path>
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
        </svg>

        <!-- COUNTER -->
        <span class="absolute -top-2 -right-2 bg-[#D4AF37] text-white text-xs rounded-full px-2 py-0.5">
          0
        </span>
      </div>

      <!-- USER DROP-DOWN (HOVER) -->
      <div class="relative group hidden md:flex ">
        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M12 12c2.7 0 5-2.2 5-5s-2.3-5-5-5-5 2.2-5 5 2.3 5 5 5z"></path>
            <path d="M4 20c0-4 4-7 8-7s8 3 8 7"></path>
          </svg>
        </div>

        <!-- DROPDOWN -->
        <div class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg py-2 
                    opacity-0 group-hover:opacity-100 transition 
                    ">

          <Link 
            href="admin/login" 
            class="block px-4 py-2 hover:bg-gray-100 text-gray-700">
            Login
          </Link>

          <Link 
            href="/register" 
            class="block px-4 py-2 hover:bg-gray-100 text-gray-700">
            Sign Up
          </Link>

        </div>
      </div>

    </div>


<!-- HAMBURGER BUTTON (Mobile only) -->
<button
  @click="mobileMenuOpen = !mobileMenuOpen"
  class="md:hidden text-4xl text-black"
>
  <span v-if="!mobileMenuOpen" >☰</span>
  <span v-else>✕</span>
</button>

        

      </nav>

    </header>



    <!-- MAIN CONTENT -->
    <main class="flex-grow pt-19">
      <slot />
    </main>

    <!-- FOOTER -->
    <footer class="bg-black text-white py-8 mt-10">
      <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">

        <div>
          <h3 class="font-semibold text-lg mb-2">Bessy Funiture</h3>
          <p class="text-gray-300 text-sm">
            Quality furniture built with passion and precision.
          </p>
        </div>

        <div>
          <h3 class="font-semibold text-lg mb-2">Quick Links</h3>
          <ul class="text-gray-300 space-y-1 text-sm">
            <li><Link href="/">Home</Link></li>
            <li><Link href="/products">Products</Link></li>
            <li><Link href="/about">About</Link></li>
            <li><Link href="/contact">Contact</Link></li>
          </ul>
        </div>

        <div>
          <h3 class="font-semibold text-lg mb-2">Contact</h3>
          <p class="text-gray-300 text-sm">Nairobi, Kenya</p>
          <p class="text-gray-300 text-sm">Email: info@bessydecofunitre.com</p>
        </div>

      </div>

      <div class="text-center text-gray-500 text-sm mt-6">
        © 2025 Bessy Deco funiture. All Rights Reserved.
      </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
   <a
  href="https://wa.me/254716635598"
  target="_blank"
  class="fixed z-100 bottom-5 right-5 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition flex items-center justify-center gap-2"
>

  <svg xmlns="http://www.w3.org/2000/svg"
       fill="currentColor"
       viewBox="0 0 16 16"
       class="w-7 h-7">
    <path d="M13.601 2.326A7.854 7.854 0 008.002 0C3.58 0 .004 3.575.004 7.997c0 1.41.368 2.788 1.066 3.999L0 16l4.113-1.043a7.932 7.932 0 003.887 1.008h.003c4.422 0 8-3.576 8-7.997a7.94 7.94 0 00-2.402-5.642zM8.003 14.48a6.46 6.46 0 01-3.292-.896l-.236-.14-2.438.618.65-2.378-.153-.244A6.471 6.471 0 011.54 8c0-3.579 2.915-6.494 6.463-6.494a6.43 6.43 0 014.585 1.907A6.43 6.43 0 0114.498 8c0 3.578-2.916 6.48-6.495 6.48zm3.79-4.83c-.206-.103-1.226-.602-1.416-.669-.19-.07-.33-.103-.47.103-.137.206-.54.668-.662.806-.122.137-.243.155-.45.052-.206-.103-.868-.319-1.653-.993-.611-.545-1.022-1.216-1.142-1.422-.12-.206-.013-.317.091-.42.093-.092.206-.24.309-.36.103-.12.137-.206.206-.343.068-.137.034-.257-.017-.36-.052-.103-.47-1.137-.644-1.553-.17-.41-.343-.355-.47-.355-.12 0-.257-.017-.397-.017-.137 0-.36.052-.548.257-.19.206-.72.703-.72 1.713 0 1.01.737 1.987.84 2.125.103.137 1.45 2.214 3.508 3.103.49.212.872.338 1.17.433.492.157.94.135 1.295.082.395-.06 1.226-.5 1.398-.985.172-.485.172-.9.12-.986-.052-.086-.19-.137-.397-.24z" />
  </svg>

  Chat with us on Whatsapp
</a>


  </div>
</template>


<script setup>

import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, TruckIcon, ClipboardDocumentListIcon, ShoppingBagIcon, ArrowRightOnRectangleIcon, } from '@heroicons/vue/24/outline'
import LogoDemo from '@/images/Logo2.jpg'
import NavLink from "@/Components/navLink.vue"
import { Link } from '@inertiajs/vue3'
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { usePage } from '@inertiajs/vue3';

const search = ref("");

const submitSearch = () => {
    if (!search.value.trim()) return;

    router.get("/allProducts", {
        search: search.value
    });
};


const page = usePage();
const categories = page.props.nav_categories;



const mobileMenuOpen = ref(false)
const productOpen = ref(false)


</script>
