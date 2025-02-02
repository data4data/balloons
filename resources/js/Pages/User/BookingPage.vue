<template>
    <div class="min-h-screen bg-green-50">
      <Navbar />
      <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Booking Page</h1>
        <p>Select a flight and make your booking here!</p>
  
        <form @submit.prevent="submitBooking" class="space-y-4">
          <div>
            <label for="date" class="block font-medium">Date</label>
            <input
              id="date"
              type="date"
              v-model="form.date"
              class="border border-gray-300 p-2 rounded w-full"
            />
          </div>
  
          <div>
            <label for="flight" class="block font-medium">Flight</label>
            <select
              id="flight"
              v-model="form.flight"
              class="border border-gray-300 p-2 rounded w-full"
            >
              <option value="" disabled>Select a flight</option>
              <option v-for="flight in flights" :key="flight.id" :value="flight.id">
                {{ flight.name }}
              </option>
            </select>
          </div>
  
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Book Now
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from '@/Components/Navbar.vue';
  
  export default {
    components: {
      Navbar,
    },
    data() {
      return {
        form: {
          date: '',
          flight: '',
        },
        flights: [
          { id: 1, name: 'Morning Flight' },
          { id: 2, name: 'Evening Flight' },
        ],
      };
    },
    methods: {
      submitBooking() {
        console.log('Booking submitted:', this.form);
      },
    },
  };
  </script>
  