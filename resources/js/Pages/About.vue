<template>
    <PublicLayout>


<div class="py-12 px-6 lg:px-20 bg-gray-50 text-gray-800 ">

    <!-- Heading -->
    <div class="max-w-3xl mx-auto text-center mb-16">
      <h1 class="text-4xl font-bold mb-4">About Bessy Decors</h1>
      <p class="text-lg text-gray-600">
        Crafting furniture that enhances your everyday living and brings comfort to every corner of your home.
      </p>
    </div>

    <!-- Origin Story -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8 mb-12">
      <h2 class="text-2xl font-semibold mb-4">How We Started</h2>
      <p class="leading-relaxed text-gray-700">
       Bessy Decors was born from the desire to build furniture you enjoy living with — not just furniture that fills space.
We believe that every home deserves pieces that bring comfort, personality, and lasting quality.
Our journey began with a passion for craftsmanship and a commitment to designing items that feel uniquely yours.
From timeless styles to modern elegance, each piece is created with care, intention, and the vision of transforming your space into a place you truly love.
      </p>
    </section>

    <!-- Services -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8 mb-12">
      <h2 class="text-2xl font-semibold mb-6">What We Offer</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div
          v-for="(item, index) in services"
          :key="index"
          class="flex items-start gap-3 bg-gray-50 border border-gray-200
                 rounded-xl p-4 hover:shadow transition"
        >
          <span class="text-blue-600 text-xl">•</span>
          <p class="font-medium text-gray-700">{{ item }}</p>
        </div>
      </div>
    </section>

    <!-- Mission -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8 mb-12">
      <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>

      <p class="mb-6 leading-relaxed text-gray-700">
        At Bessy Decors, our mission is to transform living spaces into places of
        comfort and calm beauty.
      </p>

      <ul class="space-y-3 mb-6">
        <li class="flex items-center gap-3" v-for="point in missionPoints" :key="point">
          <span class="text-blue-600 text-xl">✓</span>
          {{ point }}
        </li>
      </ul>

      <p class="leading-relaxed text-gray-700">
        We focus on personalized craftsmanship, thoughtful design, and materials
        that stand the test of time. Our goal is not just to fill homes — but to
        enrich lifestyles.
      </p>
    </section>

    <!-- Special Message -->
    <section class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
      <h2 class="text-2xl font-semibold mb-4">What Makes Us Different</h2>
      <p class="leading-relaxed text-gray-700">
        We don’t rush. We don’t compromise.  
        We build furniture you will be proud to live with for years.
      </p>
    </section>

  </div>


    </PublicLayout>
</template>


<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'

const services = [
  "Comfort",
  "Aesthetics / Style",
  "Functionality",
  "Durability / Strength",
  "Space Optimization",
  "Identity / Lifestyle Expression"
];

const missionPoints = [
  "Comfortable to live in",
  "Elegantly designed",
  "Structurally strong",
  "Made to last"
];

</script>
