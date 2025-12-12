<template>
  <PublicLayout>
    <div class="max-w-6xl mx-auto px-6 md:px-10 py-12">
      
      <!-- Blog Title -->
      <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ blog.title }}</h1>

      <!-- Blog Category & Date -->
      <div class="flex gap-4 text-gray-500 mb-8">
        <span>{{ blog.category || 'Uncategorized' }}</span>
        <span>•</span>
        <span>{{ formatDate(blog.created_at) }}</span>
      </div>

      <!-- Blog Image -->
      <div v-if="blog.image" class="mb-8">
        <img
          :src="'/storage/' + blog.image"
          :alt="blog.title"
          class="w-full h-96 object-cover rounded-lg shadow-lg"
        />
      </div>

      <!-- Blog Content -->
      <div class="prose  max-w-full text-gray-700 text-lg font-semibold leading-relaxed space-y-6">
        <div v-html="blog.content"></div>
      </div>

      <!-- Back Button -->
      <div class="mt-12">
        <router-link href="/blog" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-3 rounded-lg transition">
          ← Back to Blog
        </router-link>
      </div>
    </div>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const blog = page.props.post;

// Format date nicely
function formatDate(date) {
  return new Date(date).toLocaleDateString(undefined, {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
}
</script>

<style>
/* Optional: Tailwind Typography plugin improves the content styling */
</style>
