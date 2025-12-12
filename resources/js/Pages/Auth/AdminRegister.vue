<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">

      <h1 class="text-2xl font-bold text-center mb-6">Create an Account (Admin)</h1>

      <!-- SUCCESS MESSAGE -->
      <div
        v-if="$page.props.flash.success"
        class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm"
      >
        {{ $page.props.flash.success }}
      </div>

      <!-- FORM -->
      <form @submit.prevent="submit">

        <!-- NAME -->
        <div class="mb-4">
          <label class="block text-gray-700 mb-1">Name</label>
          <input
            v-model="form.name"
            type="text"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
            placeholder="Enter your name"
          />
          <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">
            {{ form.errors.name }}
          </div>
        </div>

        <!-- EMAIL -->
        <div class="mb-4">
          <label class="block text-gray-700 mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
            placeholder="Enter your email"
          />
          <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">
            {{ form.errors.email }}
          </div>
        </div>

        <!-- PASSWORD -->
        <div class="mb-4">
          <label class="block text-gray-700 mb-1">Password</label>
          <input
            v-model="form.password"
            type="password"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
            placeholder="Enter a password"
          />
          <div v-if="form.errors.password" class="text-red-500 text-sm mt-1">
            {{ form.errors.password }}
          </div>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="mb-4">
          <label class="block text-gray-700 mb-1">Confirm Password</label>
          <input
            v-model="form.password_confirmation"
            type="password"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
            placeholder="Confirm your password"
          />
        </div>

        <!-- SUBMIT BUTTON -->
        <button
          type="submit"
          class="w-full font-semibold bg-black text-white py-2 rounded hover:bg-gray-600 transition"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {

  form.post('/admin/register', {
  preserveScroll: true,
  onSuccess: () => form.reset(),
  
})
}
</script>
