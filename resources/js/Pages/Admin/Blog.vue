<template>
  <AdminLayout>
    <template #nav>
      <h1 class="text-3xl font-bold">Blog Dashboard</h1>
    </template>

    <template #main>
      <div class="p-6 bg-white shadow rounded-lg">
        <!-- Flash Message (example) -->
       

        <div class="w-full">
          <button
            @click="openModal"
            class="px-4 py-2 bg-gray-900 text-white rounded-lg mb-4 font-semibold flex items-center"
          >
            <CloudArrowUpIcon class="w-6 h-6 inline-block mr-2" />
            <span>Upload New Blog</span>
          </button>
        </div>


<div 
  v-if="showFlash && page.props.flash?.success" 
  class="bg-green-100 text-green-800 p-3 rounded mb-4"
>
  {{ page.props.flash.success }}
</div>



        <!-- rest of page (table placeholder) -->
        <div class="overflow-y-auto max-h-[500px] rounded-lg">
          <table class="min-w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-gray-50 sticky top-0 z-10">
              <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">




<tr v-for="blog in posts" :key="blog.id">

        <!-- Thumbnail -->
        <td class="px-4 py-2">
          <img
            :src="`/storage/${blog.image}`"
            class="w-14 h-14 object-cover rounded"
            v-if="blog.image"
          />
        </td>

        <!-- Title -->
        <td class="px-4 py-2 font-semibold text-gray-800">
          {{ blog.title }}
        </td>

        <!-- Category -->
        <td class="px-4 py-2 text-gray-600">
          {{ blog.category || '—' }}
        </td>

        <!-- Actions -->
        <td class="flex px-4 py-2">
         <button  class="text-white mr-2 py-1 px-3 rounded bg-blue-600"  @click="openEditModal(blog)">Edit</button>
          <button class="text-white rounded py-1 px-3 bg-red-600"   @click="openDeleteModal(blog.id)">Delete</button>
        </td>

      </tr>





            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
      <div
    v-if="showModal"
    class="fixed inset-0 flex items-center justify-center bg-black/50 bg-opacity-50 z-50"
  >
    <div class="bg-white p-6 px-10 rounded-lg w-full max-w-3xl overflow-y-scroll no-scrollbar max-h-[90vh] relative">
      <!-- Close Button -->
      <button
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700"
        @click="closeModal"
      >
        ✕
      </button>

      <h2 class="text-xl font-bold mb-4"><span> {{isEditMode ? "Update Blog" : "Create a New Blog"}} </span></h2>

      <form @submit.prevent="handleSubmit">

        <!-- Title -->
        <div class="mb-4">
          <label class="block font-semibold mb-1">Title</label>
          <input
            v-model="form.title"
            type="text"
            class="w-full border rounded p-2"
            required
          />
        </div>

        <!-- Category -->
        <div class="mb-4">
          <label class="block font-semibold mb-1">Category</label>
          <input
            v-model="form.category"
            type="text"
            class="w-full border rounded p-2"
            placeholder="e.g Furniture, Home Decor..."
          />
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
          <label class="block font-semibold mb-1">Image</label>
          <input
            type="file"
            @change="handleImage"
            class="w-full"
          />
        </div>

        <!-- Content -->
       <CkEditor
       
    v-model="form.content" 
    :config="{
    toolbar: [
      'heading', '|',
      'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
      'blockQuote', 'undo', 'redo'
    ],
    height: 600// sets height (pixels)
  }"
       
       
       />

        <!-- Submit -->
<button
  type="submit"
  class="bg-black text-white hover:bg-gray-700 px-4 py-2 mt-6 w-full rounded flex items-center justify-center gap-2 font-bold disabled:opacity-50"
  :disabled="submitting"
>
  <svg
    v-if="submitting"
    class="animate-spin h-5 w-5 text-white"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
  >
    <circle
      class="opacity-25"
      cx="12"
      cy="12"
      r="10"
      stroke="currentColor"
      stroke-width="4"
    ></circle>
    <path
      class="opacity-75"
      fill="currentColor"
      d="M4 12a8 8 0 018-8v8H4z"
    ></path>
  </svg>

  <span>  {{ submitting ? "Saving..." : isEditMode ? "Update Blog" : "Publish Blog" }}</span>
</button>


      </form>
    </div>
  </div>





        <!-- Delete Confirmation Modal -->
        <!-- Delete Confirmation Modal -->
<div 
  v-if="showDeleteModal" 
  class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
>
  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">

    <h2 class="text-xl font-bold mb-4">Delete Blog</h2>

    <p class="text-gray-700 mb-6">
      Are you sure you want to delete this blog? This action cannot be undone.
    </p>

    <div class="flex justify-end gap-4">
      <button 
        class="px-4 py-2 bg-gray-300 rounded"
        @click="showDeleteModal = false"
        :disabled="deleting"
      >
        Cancel
      </button>

      <button 
        class="px-4 py-2 bg-red-600 text-white rounded"
        @click="deleteBlog"
        :disabled="deleting"
      >
        <span v-if="!deleting">Delete</span>
        <span v-else>Deleting...</span>
      </button>
    </div>

  </div>
</div>












    </template>
  </AdminLayout>
</template>

<script setup>
import { computed } from "vue";
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref, reactive, watch } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import CkEditor from "@/Components/CkEditor.vue";

// Heroicons (outline) — import only what you use
import { CloudArrowUpIcon, XMarkIcon, } from '@heroicons/vue/24/outline';

// page props / flash
const page = usePage();
const showFlash = ref(false);
const editingId = ref(null);
const isEditMode = ref(false);
const showDeleteModal = ref(false);
const deletingId = ref(null);
const deleting = ref(false);

watch(
  () => page.props.flash?.success,
  (val) => {
    if (val) {
      showFlash.value = true;
      setTimeout(() => (showFlash.value = false), 4000);
    }
  }
);




// modal state
const showModal = ref(false);
const submitting = ref(false);

// form state
const form = reactive({
  title: '',
  content: '',
  category: '',
  image: null
});

// validation errors
const errors = reactive({});

// open modal and reset form
function openModal() {

 isEditMode.value = false;

  form.title = '';
  form.content = '';
  form.category = '';
  form.image = null;
  Object.keys(errors).forEach(key => errors[key] = null);
  showModal.value = true;
}

// close modal
function closeModal() {
  showModal.value = false;
}

// handle image input
function handleImage(event) {
  const file = event.target.files[0];
  form.image = file || null;
}

// submit form to Laravel backend
function submit() {
  submitting.value = true;
  
  Object.keys(errors).forEach(key => errors[key] = null);

  const formData = new FormData();
  formData.append('title', form.title);
  formData.append('content', form.content);
  formData.append('category', form.category);
  if (form.image) formData.append('image', form.image);

  router.post('admin/blogs', formData, {
    preserveScroll: true,
    onSuccess: () => {
      submitting.value = false;
      showModal.value = false;
    },
    onError: (serverErrors) => {
      submitting.value = false;
      Object.assign(errors, serverErrors);
    }
  });
}



const posts = computed(() => page.props.posts);




function openEditModal(blog) {
  isEditMode.value = true;   // we are updating
  editingId.value = blog.id;

  form.title = blog.title;
  form.content = blog.content;
  form.category = blog.category;
  form.image = null; // only change if user uploads

  showModal.value = true;
}




function updateBlog() {
  submitting.value = true;

  const formData = new FormData();
  formData.append("title", form.title);
  formData.append("content", form.content);
  formData.append("category", form.category);

  // If user selects a new image
  if (form.image) {
    formData.append("image", form.image);
  }

  // VERY IMPORTANT → ensures Laravel treats this as PUT!
  formData.append("_method", "put");

  router.post(`/admin/blogs/${editingId.value}`, formData, {
    forceFormData: true,
    onSuccess: () => {
      submitting.value = false;
      showModal.value = false;
      editingId.value = null;
      isEditMode.value = false;
    },
    onError: (serverErrors) => {
      submitting.value = false;
      Object.assign(errors, serverErrors);
    }
  });
}



function handleSubmit() {
  if (isEditMode.value) {
    updateBlog();
  } else {
    submit();
  }
}





function openDeleteModal(id) {
  deletingId.value = id;
  showDeleteModal.value = true;
}




function deleteBlog() {
  deleting.value = true;

  router.delete(`/admin/blogs/${deletingId.value}`, {
    onSuccess: () => {
      deleting.value = false;
      showDeleteModal.value = false;
      deletingId.value = null;
    },
    onError: () => {
      deleting.value = false;
    }
  });
}






</script>



