<template>
  <AdminLayout>

    <!-- Navigation -->
    <template #nav>
      <h1 class="text-3xl font-bold">User Dashboard</h1>
    </template>

    <!-- Main Content -->
    <template #main>
      <div class="space-y-6">

        <!-- 1️⃣ User Info Card -->
        <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
          <div>
            <p class="text-gray-500">Welcome back,</p>
            <p class="text-2xl font-bold">{{ user.name }}</p>
            <p class="text-sm text-gray-400">{{ user.email }}</p>
          </div>
        </div>

        <!-- 2️⃣ Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Your Orders</p>
              <p class="text-2xl font-bold">{{ ordersCount }}</p>
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Your Products</p>
              <p class="text-2xl font-bold">{{ productsCount }}</p>
            </div>
          </div>

          <div class="bg-white shadow rounded-lg p-5 flex items-center justify-between">
            <div>
              <p class="text-gray-500">Your Blog Posts</p>
              <p class="text-2xl font-bold">{{ blogsCount }}</p>
            </div>
          </div>
        </div>

        <!-- 3️⃣ Recent Activity Table -->
        <div class="bg-white shadow rounded-lg p-5">
          <h2 class="text-xl font-bold mb-4">Your Recent Activity</h2>
          <table class="w-full text-left table-auto border-collapse">
            <thead>
              <tr class="border-b">
                <th class="py-2">Action</th>
                <th class="py-2">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b" v-for="(activity, index) in recentActivity" :key="index">
                <td class="py-2">{{ activity.action }}</td>
                <td class="py-2">{{ activity.date }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- 4️⃣ Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <button class="bg-blue-500 text-white rounded-lg p-4 hover:bg-blue-600 font-semibold">View Orders</button>
          <button class="bg-green-500 text-white rounded-lg p-4 hover:bg-green-600 font-semibold">View Products</button>
          <button class="bg-yellow-500 text-white rounded-lg p-4 hover:bg-yellow-600 font-semibold">View Blog Posts</button>
        </div>

      </div>
    </template>

  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'

// Sample reactive data (replace with actual backend data)
const user = {
  name: 'John Doe',
  email: 'john@example.com'
}

const ordersCount = 5
const productsCount = 3
const blogsCount = 2

const recentActivity = [
  { action: 'Placed an order', date: '2025-12-09' },
  { action: 'Added a product to wishlist', date: '2025-12-08' },
  { action: 'Commented on a blog', date: '2025-12-07' },
]
</script>
