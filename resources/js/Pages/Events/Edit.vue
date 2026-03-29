<template>
    <AdminLayouts>
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Edit Event</h2>

                <form class="space-y-4" @submit.prevent="submitForm()">
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Title</label
                        >
                        <input
                            type="text"
                            name="title"
                            v-model="form.title"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Description</label
                        >
                        <textarea
                            name="description"
                            rows="3"
                            v-model="form.description"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        ></textarea>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Location</label
                        >
                        <input
                            type="text"
                            name="location"
                            v-model="form.location"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
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
                            step="0.01"
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
                            Update Event
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </AdminLayouts>
</template>

<script setup>
const props = defineProps({
    event: Object,
});

import { Link, useForm } from "@inertiajs/vue3";
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
const form = useForm({
    title: props.event.title,
    description: props.event.description,
    location: props.event.location,
    event_date: props.event.event_date,
    event_price: props.event.event_price,
});

function submitForm() {
    form.put(`/admin/events/${props.event.id}`);
}
</script>

<style></style>
