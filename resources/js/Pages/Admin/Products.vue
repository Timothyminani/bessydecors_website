<template>
  <AdminLayout>
    <template #nav>
      <h1 class="text-3xl font-bold">Product Dashboard</h1>
    </template>

    <template #main>
      <div class="p-6 bg-white shadow rounded-lg">


<!-- Flash Message -->
   <div 
  v-if="showFlash && page.props.flash?.success" 
  class="bg-green-100 text-green-800 p-3 rounded mb-4"
>
  {{ page.props.flash.success }}
</div>
 
 
 <div class="w-full ">
  <button
   @click="showModal = true"
      class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gary-700 mb-10 font-semibold flex items-center"
    >
        <CloudArrowUpIcon class="w-7 h-7 inline-block mr-2" />
      <span>Upload New Product</span>
    </button>
    
</div>
        <!-- Search + Filter Toolbar -->
        <div class="flex items-center justify-between mb-4">
          <input
            type="text"
            placeholder="Search products..."
            class="w-1/3 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200"
            v-model="searchQuery"
          />

          <div>
 <select
    v-model="selectedFilter"
    class="px-3 py-2 border rounded-lg bg-white focus:ring focus:ring-blue-200"
  >
    <option value="">All Products</option>
    <option value="Available">Available</option>
    <option value="Out of Stock">Out of Stock</option>
    <option value="Archived">Archived</option>
  </select>
          </div>


        </div>

        <!-- Table Wrapper -->
        <div class="overflow-y-auto max-h-[500px] rounded-lg">
          <table class="min-w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-gray-50 sticky top-0 z-10">
              <tr>
                <th class="w-14 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                <th class="w-36 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="w-28 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                <th class="w-28 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="w-20 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Discount</th>
                <th class="w-28 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tags</th>
                <th class="w-20 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Featured</th>
                <th class="w-32 px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr
                v-for="product in products"
                :key="product.id + product.name"
                class="hover:bg-gray-50"
              >
                <td class="px-4 py-2">
                 <img :src="`/storage/${product.image_1}`" alt="" class="w-14 h-14 object-cover rounded" />

                </td>
                <td class="px-4 py-2 whitespace-nowrap">{{ product.name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ product.category }}</td>
                <td class="px-4 py-2 truncate">{{ product.description }}</td>
                <td class="px-4 py-2 whitespace-nowrap">KES {{ product.price.toLocaleString() }}</td>
                <td class="px-4 py-2 whitespace-nowrap">
                  <span v-if="product.discount">{{ product.discount }}%</span>
                  <span v-else class="text-gray-400">-</span>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                  <span
                    :class="{
                      'bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs': product.status === 'Available',
                      'bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs': product.status === 'Out of Stock',
                      'bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs': product.status === 'Archived'
                    }"
                  >
                    {{ product.status }}
                  </span>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                  <span
                    v-for="tag in product.tags"
                    :key="tag"
                    class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs mr-1"
                  >
                    {{ tag }}
                  </span>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                  <span v-if="product.featured" class="text-yellow-500 font-bold">★</span>
                  <span v-else class="text-gray-300">☆</span>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                  <button class="text-white mr-2 py-1 px-3 bg-blue-600 hover:bg-blue-400 rounded"    @click="openEditModal(product)">Edit</button>
                  <button class="text-white py-1 px-3 bg-red-600 hover:bg-red-400 rounded"  @click="openDeleteModal(product)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


<!-- 🟦 Modal Background (Creating a new product) -->
<div
  v-if="showModal"
  class="fixed inset-0 bg-gray-900/80  flex items-center justify-center z-50 "
>



  <!-- 🟩 Modal Content -->
  <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-6 relative overflow-y-scroll max-h-[90vh] no-scrollbar">

    <!-- Close X -->
<div class="flex justify-center items-center  p-2  ">
 <h2 class="text-xl font-bold"> {{ isEditMode ? 'Edit Product' : 'Upload New Product' }}</h2>

  <button @click="closeModal" class="absolute   hover:border  right-10 text-gray-500 hover:text-black">
      <XMarkIcon class="w-6 h-6" />
    </button>
    
</div>

    <!-- FORM -->
    <form class="space-y-4" @submit.prevent="handleSubmit" enctype="multipart/form-data">
      
      <!-- Name -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Product Name</label>
        <input type="text" v-model="form.name" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <!-- Category -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Category</label>
        <select  v-model="form.category" class="w-full border rounded-lg px-3 py-2">
          <option>Living Room</option>
          <option>Office</option>
          <option>Dining</option>
          <option>Kitchen</option>
          <option>Bedroom</option>
          <option>Outdoor</option>
          <option>Kids</option>
          <option>Home Décor & Storage</option>
        </select>
      </div>

 <!-- Status -->
      <div>
  <label class="block text-gray-700 font-semibold mb-1">Status</label>
  <select v-model="form.status" class="w-full border rounded-lg px-3 py-2">
    <option value="Available">Available</option>
    <option value="Out of Stock">Out of Stock</option>
    <option value="Archived">Archived</option>
  </select>
</div>

      <!-- Description -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Description</label>
        <textarea v-model="form.description" class="w-full border rounded-lg px-3 py-2" rows="3"></textarea>
      </div>

      <!-- Price -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Price (KES)</label>
        <input  v-model="form.price" type="number" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <!-- Discount -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Discount (%)</label>
        <input v-model="form.discount" type="number" class="w-full border rounded-lg px-3 py-2" />
      </div>

      <!-- Tags -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Tags (comma separated)</label>
        <input  v-model="form.tags" type="text" class="w-full border rounded-lg px-3 py-2" placeholder="sofa, wood, modern" />
      </div>

      <!-- Featured -->
      <div class="flex items-center gap-2">
        <input type="checkbox" v-model="form.featured" id="featured" class="h-4 w-4" />
        <label for="featured" class="text-gray-700">Mark as Featured</label>
      </div>

      <!-- Image Upload -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div v-for="index in 3" :key="index">
      <label class="block text-gray-700 font-semibold mb-1">
        Product Image {{ index }}
      </label>

      <div
        class="border border-dashed rounded-lg p-4 text-center bg-gray-50 cursor-pointer"
        @click="$refs['imageInput' + index][0].click()"
      >
        <CloudArrowUpIcon class="w-10 h-10 mx-auto text-gray-500" />
        <p class="text-gray-600 mt-2">
          {{ fileNames[index - 1] || 'Click to upload image' }}
        </p>
        <input
          type="file"
          class="hidden"
          :ref="'imageInput' + index"
          @change="(e) => handleFileChange(e, index - 1)"
        />
      </div>
    </div>
  </div>

      <!-- Submit -->
      <button
        type="submit"
        class="w-full bg-black font-semibold text-white py-2 rounded-lg mt-4 hover:bg-gray-700"
      >
        {{ isEditMode ? 'Update Product' : 'Save Product' }}
      </button>
    </form>
  </div>
</div>




<!-- 🔴 DELETE CONFIRMATION MODAL -->
<div 
  v-if="showDeleteModal"
  class="fixed inset-0 bg-black/60 flex items-center justify-center z-50"
>
  <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-xl relative">

    <h2 class="text-xl font-bold text-red-600">Delete Product</h2>
    <p class="text-gray-700 mt-3">
      Are you sure you want to delete 
      <span class="font-semibold">{{ productToDelete?.name }}</span>?
      This action cannot be undone.
    </p>

    <div class="mt-6 flex justify-end gap-3">
      <button
        class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"
        @click="closeDeleteModel"
      >
        Cancel
      </button>

      <button
        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
        @click="confirmDelete"
      >
        Delete
      </button>
    </div>

  </div>
</div>






 </template>
  </AdminLayout>
</template>

<script setup>

import { computed } from "vue";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, ArrowUpTrayIcon, CloudArrowUpIcon, XMarkIcon  } from '@heroicons/vue/24/outline'
import { ref, reactive, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';


const searchQuery = ref('');
const selectedFilter = ref('');
const showModal = ref(false);
const isEditMode = ref(false); 
const currentProductId = ref(null);     
const  showDeleteModal = ref(false);
const productToDelete = ref(null);

// Use reactive for form so nested properties are reactive
const form = reactive({
  name: "",
  category: "",
  description: "",
  price: "",
  discount: "",
  status: "Available", 
  tags: "",
  featured: false,
  images: [null, null, null], // store selected files
});

// Separate reactive array for file names to display
const fileNames = reactive(['', '', '']);

const handleFileChange = (event, index) => {
  const file = event.target.files[0];
  if (file) {
    form.images[index] = file;        // store file
    fileNames[index] = file.name;     // store file name for UI
  }
};










function submitForm() {

 
    
  const payload = new FormData();

  payload.append("name", form.name);
  payload.append("category", form.category);
  payload.append("description", form.description);
  payload.append("price", form.price);
  payload.append("discount", form.discount);
  payload.append("status", form.status); // <-- add this
  payload.append("tags", form.tags);
  payload.append("featured", form.featured ? 1 : 0);

  form.images.forEach((img) => {
    if (img) {
      payload.append("images[]", img);
    }
  });

 router.post("/admin/products/store", payload, {
  forceFormData: true,

    onSuccess: () => {
        showModal.value = false;
        // Reset form
        form.name = "";
        form.category = "";
        form.description = "";
        form.price = "";
        form.discount = "";
        form.status = "Available";
        form.tags = "";
        form.featured = false;
        form.images = [null, null, null];
        fileNames[0] = '';
        fileNames[1] = '';
        fileNames[2] = '';

        
    },


 




  
});

}




const page = usePage();
const showFlash = ref(false);

watch(
  () => page.props.flash?.success,
  (val) => {
    if (val) {
      showFlash.value = true;
      setTimeout(() => (showFlash.value = false), 4000);
    }
  }
);


const products = computed(() => page.props.products);



// Function to open edit modal with product data


function openEditModal(product) {
  isEditMode.value = true;           // now form is in edit mode
  currentProductId.value = product.id;

  form.name = product.name;
  form.category = product.category;
  form.description = product.description;
  form.price = product.price;
  form.discount = product.discount;
  form.status = product.status;
  form.tags = product.tags?.join(', ') || '';
  form.featured = product.featured;

  // Populate file names for UI
  fileNames[0] = product.image_1?.split('/').pop() || '';
  fileNames[1] = product.image_2?.split('/').pop() || '';
  fileNames[2] = product.image_3?.split('/').pop() || '';

  showModal.value = true;            // show the modal
}




function handleSubmit() {
  if (isEditMode.value) {
    updateForm();
  } else {
    submitForm();
  }
}




function updateForm() {
  const payload = new FormData();

  payload.append("name", form.name);
  payload.append("category", form.category);
  payload.append("description", form.description);
  payload.append("price", form.price);
  payload.append("discount", form.discount);
  payload.append("status", form.status);
  payload.append("tags", form.tags);
  payload.append("featured", form.featured ? 1 : 0);

  form.images.forEach((img) => {
    if (img) {
      payload.append("images[]", img);
    }
  });

  router.post(`/admin/products/${currentProductId.value}/update`, payload, {
    forceFormData: true,
    onSuccess: () => {

      showModal.value = false;
      
      // Reset form
      resetForm();
      isEditMode.value = false;
      currentProductId.value = null;
    },
  });
}



const closeModal = () => {
  showModal.value = false;
  resetForm();
};







function resetForm() {
  form.name = "";
  form.category = "";
  form.description = "";
  form.price = "";
  form.discount = "";
  form.status = "Available";
  form.tags = "";
  form.featured = false;
  form.images = [null, null, null];
  fileNames[0] = '';
  fileNames[1] = '';
  fileNames[2] = '';

 
}




function openDeleteModal(product) {
    showDeleteModal.value = true;
    productToDelete.value = product;
   
}



function confirmDelete() {
    if (!productToDelete.value) return;

    router.delete(`/admin/products/${productToDelete.value.id}`, {
        onSuccess: () => {
            showDeleteModal.value = false;  
            productToDelete.value = null;  
        }
    });
}


function closeDeleteModel(){
  showDeleteModal.value = false;  
}

</script>
