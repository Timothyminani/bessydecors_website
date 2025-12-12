<template>
  <div class="min-h-screen flex bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-4">
       
        <span    class="w-full flex justify-center mb-4">
            <ShieldCheckIcon class="w-7 h-7" />
      <h2 class="text-2xl font-bold mb-6">Admin</h2>
        </span>


      <nav class="flex flex-col space-y-6 text-gray-800 font-semibold">

       <span :class="isActive('/admin/dashboard') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
      <HomeIcon class="w-5 h-5" />
       <Link href="/admin/dashboard" class="block">Dashboard</Link>
        </span>

        <span :class="isActive('/admin/users') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
             <UserIcon class="w-5 h-5" />
        <Link href="/admin/users" class="block hover:text-blue-600">Users</Link>
        </span>

        <span :class="isActive('/admin/products') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
             <ShoppingCartIcon class="w-5 h-5" />
        <Link href="/admin/products" class="block hover:text-blue-600">Products</Link>
       </span>

        

<span :class="isActive('/admin/settings') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
             <ShoppingBagIcon class="w-5 h-5" />
        <Link href="/admin/settings" class="block hover:text-blue-600">Orders</Link>

        </span>



      <span :class="isActive('/admin/settings') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
             <NewspaperIcon class="w-5 h-5" />
        <Link href="/admin/blog" class="block hover:text-blue-600">Blogs</Link>

        </span>
      

<span :class="isActive('/admin/settings') ? 'text-green-600 font-bold' : ''" class="flex gap-1  hover:text-blue-600">
             <Cog6ToothIcon class="w-5 h-5" />
        <Link href="/admin/settings" class="block hover:text-blue-600">Settings</Link>

        </span>

<button type="button" @click="logout" class="flex gap-1 hover:text-blue-600 w-full cursor-pointer">
  <ArrowRightOnRectangleIcon class="w-5 h-5" />
  Logout
</button>




      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-x-scroll overflow-y-hidden">
        <nav class="w-full border-b mb-6 pb-4">
        <slot name="nav"></slot>

        </nav>


      <slot name="main"></slot>
    </main>

  </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { HomeIcon, UserIcon, Cog6ToothIcon, ShoppingCartIcon, UserCircleIcon, ShieldCheckIcon, TruckIcon, ClipboardDocumentListIcon, ShoppingBagIcon, ArrowRightOnRectangleIcon,  DocumentTextIcon,NewspaperIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

import { router } from '@inertiajs/vue3'



const logout = () => {
  router.post('/admin/logout')
}





const page = usePage();

const isActive = (url) => {
  return page.props.url === url;
};






</script>
