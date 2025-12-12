<template>
  <PublicLayout>
  
  <div class="w-full h-[380px] relative flex items-center justify-center py-2 mt-10 ">
     
          <div
            class="h-full w-300 md:rounded-xl bg-cover bg-center relative"
             :style="{ backgroundImage: `url(${DemoImage})`, backgroundSize: 'cover', backgroundPosition: 'center' }"
          >
            <div class="absolute inset-0 md:rounded-xl bg-black/60"></div>

<div class="absolute md:rounded-xl inset-0 flex flex-col justify-center items-center text-white px-4 sm:px-6 md:px-20 text-center">

  <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold mb-3 sm:mb-4 leading-tight max-w-3xl">
    Welcome to Our Blog Page
  </h1>

  <p class="text-sm sm:text-base md:text-xl mb-5 sm:mb-6 leading-relaxed max-w-2xl">
    Welcome to our blog — a space where creativity meets practical inspiration. 
    Whether you're exploring fresh ideas, learning something new, or simply looking 
    for a spark of motivation, we’re here to guide you. Dive into our latest posts, 
    discover tips that matter, and join a community that values growth, creativity, 
    and great stories. Enjoy reading, and feel free to explore as much as you like!
  </p>

  <a 
    href="/allProducts"
    class="bg-[#D4AF37] hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300"
  >
    Explore Products
  </a>

</div>

          </div>
      
   
    </div>


<div class="w-full flex justify-center items-center px-2 md:px-10 py-10 md:py-10  ">

<div class="flex w-full md:w-auto md:justify-center items-center  px-4 py-3 rounded-4xl shadow-lg shadow-gray-400 border border-gray-200 overflow-x-auto ">


<ul class="flex justify-center items-center gap-6 text-lg font-medium">
      <li
        v-for="cat in ['All', ...categories]"
        :key="cat"
        @click="filterByCategory(cat)"
        :class="[
          '  rounded-4xl transition duration-300 cursor-pointer whitespace-nowrap ',
          selectedCategory === cat ? 'bg-[#D4AF37] px-10 py-2 text-white' : 'bg-white text-gray-700 '
        ]"
      >
        {{ cat }}
      </li>
    </ul>


</div>

</div>



<div class="w-full flex justify-start items-center px-10 mb-20 gap-10 flex-wrap ">

<div
   v-for="blog in props.posts.data"
  :key="blog.id"
 class="rounded-lg  w-[350px] shadow-lg shadow-gray-400 overflow-hidden hover:shadow-xl transition duration-300">

<div class="w-full relative ">
<img
          :src="'/storage/' + blog.image"
           v-if="blog.image"
          class="w-full h-60 object-cover"
        />

        <div class="absolute inset-0 flex flex-col justify-end">
         <h3 class="text-lg   bg-black/50  font-semibold text-white  flex justify-center items-center p-3  ">  {{ blog.title }} </h3>
        </div>
        </div>



  <div class="p-4 flex flex-col gap-3 justify-between ">
   
    <p class="text-gray-900 font-semibold  text-sm">{{ excerpt(blog.content) }}</p>

<div class="flex justify-end">
<button>
    <a   :href="`/blog/${blog.slug}`" class=" bg-[#D4AF37] hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded  transition duration-300 flex justify-center items-center">
        Read More
        <ChevronRightIcon class="w-6 h-6" />
    </a>
</button>
</div>


  </div>



</div>

</div>






<!-- Pagination -->
<div class="w-full flex justify-center my-10" v-if="posts.links">
  <div class="flex items-center gap-10">

    <!-- Previous -->
    <button
      :disabled="!posts.prev_page_url"
      @click="goTo(posts.prev_page_url)"
      class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-200 disabled:opacity-40 disabled:cursor-not-allowed"
    >
      Previous
    </button>

    <!-- Next -->
    <button
      :disabled="!posts.next_page_url"
      @click="goTo(posts.next_page_url)"
      class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-200 disabled:opacity-40 disabled:cursor-not-allowed"
    >
      Next
    </button>

  </div>
</div>





  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, TruckIcon, ClipboardDocumentListIcon, ShoppingBagIcon, ArrowRightOnRectangleIcon, ChevronRightIcon,  ChevronLeftIcon, StarIcon as StarOutline } from '@heroicons/vue/24/outline'
import { StarIcon as StarSolid } from '@heroicons/vue/24/solid'
import DemoImage from '@/images/demoImage4.jpg'
import { router, usePage } from '@inertiajs/vue3';
import { ref } from "vue";



function stripHtml(html) {
  const temp = document.createElement("div");
  temp.innerHTML = html;
  return temp.textContent || temp.innerText || "";
}

function excerpt(html, length = 160) {
  const text = stripHtml(html);
  return text.length > length ? text.substring(0, length) + "........" : text;
}

const props = defineProps({
  posts: Object
});



const page = usePage();

const categories = ref(page.props.categories);
const selectedCategory = ref(page.props.selectedCategory);

const filterByCategory = (category) => {
  selectedCategory.value = category;

  router.get('/blog', 
    category && category !== 'All' ? { category } : {},
    {
      preserveScroll: true,
      preserveState: true
    }
  );
};












function goTo(url) {
  if (url) {
    router.visit(url);
  }
}




</script>
