
<template>
    <ul class="flex  gap-8 text-lg font-medium ">
          <li><Link href="/home" class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Home</Link></li>
          
          <li class="relative group"><Link href="/allProducts"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Products</Link>

<!-- Dropdown -->
            <ul
                class="absolute left-0 mt-6 w-100 bg-white shadow-lg  py-2
                       opacity-0 invisible group-hover:opacity-100 group-hover:visible
                       transition-all duration-200"
            >
               
                <li
                
              v-for="cat in categories"
              :key="cat"
               class="block px-4 py-2 hover:bg-gray-100    cursor-pointer"
              @click="$inertia.get(`/allProducts?category=${cat}`)"
                
                
                > {{ cat }}</li>
   
            </ul>




          </li>
           <li><Link href="/blog"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Blog</Link></li>
          <li><Link href="/about"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">About</Link></li>
          <li><Link href="/contact"  class="py-6 px-3 hover:text-[#D4AF37] hover:border-b-2 hover:border-[#D4AF37] ">Contact</Link></li>
        </ul>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const categories = page.props.nav_categories;


</script>
