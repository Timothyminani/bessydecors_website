<template>
    <PublicLayout>


  <div class="py-12 px-6 lg:px-20 bg-gray-50 text-gray-800">

    <!-- Page Heading -->
    <div class="max-w-3xl mx-auto text-center mb-14">
      <h1 class="text-4xl font-bold mb-3">Contact Us</h1>
      <p class="text-lg text-gray-600">
        We'd love to hear from you. Reach out through any of the channels below.
      </p>
    </div>

    <!-- Contact Information -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8 mb-12">
      <h2 class="text-2xl font-semibold mb-6">Get in Touch</h2>

      <div class="space-y-6">

        <!-- Phone -->
        <div class="flex items-start gap-4">
          <span class="text-blue-600 text-2xl">📞</span>
          <div>
            <h3 class="text-lg font-semibold">Phone</h3>
            <p class="text-gray-700">+254 716 635 598</p>
          </div>
        </div>

        <!-- WhatsApp -->
        <div class="flex items-start gap-4">
          <span class="text-green-600 text-2xl">💬</span>
          <div>
            <h3 class="text-lg font-semibold">WhatsApp</h3>
            <p class="text-gray-700">+254 716 635 598</p>
          </div>
        </div>

        <!-- Email -->
        <div class="flex items-start gap-4">
          <span class="text-red-600 text-2xl">📧</span>
          <div>
            <h3 class="text-lg font-semibold">Email</h3>
            <p class="text-gray-700">bessydecors@gmail.com</p>
          </div>
        </div>

        <!-- Location -->
        <div class="flex items-start gap-4">
          <span class="text-purple-600 text-2xl">📍</span>
          <div>
            <h3 class="text-lg font-semibold">Showroom Location</h3>
            <p class="text-gray-700">Nairobi, Thika Road, near TRM</p>
          </div>
        </div>

        <!-- Working Hours -->
        <div class="flex items-start gap-4">
          <span class="text-yellow-600 text-2xl">⏰</span>
          <div>
            <h3 class="text-lg font-semibold">Working Hours</h3>
            <p class="text-gray-700 leading-relaxed">
              Monday – Friday: 8:30 AM – 6:00 PM <br>
              Saturday: 9:00 AM – 4:00 PM <br>
              Sunday & Public Holidays: By Appointment Only.
            </p>
          </div>
        </div>

      </div>
    </section>

    <!-- Social Media -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
      <h2 class="text-2xl font-semibold mb-6">Connect With Us</h2>

      <div class="space-y-5">

        <!-- Facebook -->
        <a
          href="https://www.facebook.com/profile.php?id=100084963074004"
          target="_blank"
          class="flex items-center gap-4 p-4 border rounded-xl hover:bg-gray-50 hover:shadow transition"
        >
          <span class="text-blue-600 text-2xl">📘</span>
          <span class="font-medium text-gray-800">Facebook</span>
        </a>

        <!-- Instagram -->
        <a
          href="https://www.instagram.com/bessy_decors_furniture/"
          target="_blank"
          class="flex items-center gap-4 p-4 border rounded-xl hover:bg-gray-50 hover:shadow transition"
        >
          <span class="text-pink-600 text-2xl">📸</span>
          <span class="font-medium text-gray-800">Instagram</span>
        </a>

        <!-- TikTok (Nil) -->
        <div
          class="flex items-center gap-4 p-4 border rounded-xl bg-gray-100 text-gray-500 cursor-not-allowed"
        >
          <span class="text-black text-2xl">🎵</span>
          <span>No TikTok account</span>
        </div>

      </div>
    </section>
  </div>







    </PublicLayout>
</template>


<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'




</script>
