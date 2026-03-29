<template>
    <!-- Main Content -->
    <AdminLayouts>
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Add New Seats</h2>

            <form class="space-y-4" @submit.prevent="submitForm()">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700"
                        >Schedule</label
                    >
                    <select
                        name=""
                        id=""
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option
                            v-for="schedule in schedules"
                            :key="schedule.id"
                            :value="schedule.id"
                        >
                            {{ schedule.event.title }} -
                            {{ schedule.start_time }} to {{ schedule.end_time }}
                        </option>
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700"
                        >Total Seats</label
                    >
                    <input
                        name="seat_number"
                        type="number"
                        v-model="form.seat_number"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-sm font-medium text-gray-700"
                        >Status</label
                    >
                    <select
                        name="location"
                        v-model="form.location"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option value="available">Available</option>
                        <option value="locked">Locked</option>
                        <option value="booked">Booked</option>
                    </select>
                </div>

                <!-- Event Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700"
                        >Event Date</label
                    >
                    <input
                        type="date"
                        name="event_date"
                        v-model="form.event_date"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />
                </div>

                <!-- Event Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700"
                        >Event Price</label
                    >
                    <input
                        type="number"
                        name="event_price"
                        v-model="form.event_price"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Save Event
                    </button>
                </div>
            </form>
        </div>
    </AdminLayouts>
</template>

<script setup>
defineProps({
    schedules: Array,
});
import { Link, useForm } from "@inertiajs/vue3";
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
const form = useForm({
    title: "",
    description: "",
    location: "",
    event_date: "",
    event_price: "",
});

function submitForm() {
    form.post("/admin/events");
}
</script>

<style></style>
