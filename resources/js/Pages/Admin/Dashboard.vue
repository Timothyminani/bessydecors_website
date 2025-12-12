<template>
  <AdminLayout>

    <!-- Navigation -->
    <template #nav>
      <h1 class="text-3xl font-bold">Admin Dashboard</h1>
    </template>

    <!-- Main Content -->
    <template #main>
      <div class="space-y-6">

        <!-- 1️⃣ Metric Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Total Users</p>
              <p class="text-2xl font-bold">150</p>
            </div>
            <div class="text-blue-500">
              <UserIcon class="w-8 h-8" />
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Total Products</p>
              <p class="text-2xl font-bold">320</p>
            </div>
            <div class="text-green-500">
              <ShoppingCartIcon class="w-8 h-8" />
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Total Orders</p>
              <p class="text-2xl font-bold">120</p>
            </div>
            <div class="text-yellow-500">
              <ClipboardDocumentListIcon class="w-8 h-8" />
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Total Blogs</p>
              <p class="text-2xl font-bold">45</p>
            </div>
            <div class="text-purple-500">
              <NewspaperIcon class="w-8 h-8" />
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Active Sessions</p>
              <p class="text-2xl font-bold">12</p>
            </div>
            <div class="text-red-500">
              <ShieldCheckIcon class="w-8 h-8" />
            </div>
          </div>
        </div>

        <!-- 2️⃣ Recent Activity Table -->
        <div class="bg-white shadow rounded-lg p-5">
          <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
          <table class="w-full text-left table-auto border-collapse">
            <thead>
              <tr class="border-b">
                <th class="py-2">User</th>
                <th class="py-2">Action</th>
                <th class="py-2">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="py-2">John Doe</td>
                <td class="py-2">Added new product</td>
                <td class="py-2">2025-12-09</td>
              </tr>
              <tr class="border-b">
                <td class="py-2">Jane Smith</td>
                <td class="py-2">Published blog post</td>
                <td class="py-2">2025-12-08</td>
              </tr>
              <!-- Add more dynamic rows here -->
            </tbody>
          </table>
        </div>

        <!-- 3️⃣ Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <button class="bg-blue-500 text-white rounded-lg p-4 hover:bg-blue-600 font-semibold">Add Product</button>
          <button class="bg-green-500 text-white rounded-lg p-4 hover:bg-green-600 font-semibold">Add Blog</button>
          <button class="bg-yellow-500 text-white rounded-lg p-4 hover:bg-yellow-600 font-semibold">View Users</button>
        </div>

      </div>
    </template>

  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { UserIcon, ShoppingCartIcon, ClipboardDocumentListIcon, NewspaperIcon, ShieldCheckIcon } from '@heroicons/vue/24/outline'
</script>
