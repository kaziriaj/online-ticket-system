<template>
    <AdminLayouts>
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Edit Event Schedule</h2>

                <form class="space-y-4" @submit.prevent="submitForm()">
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Event Name</label
                        >
                        <select
                            name="event_id"
                            v-model="form.event_id"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                            <option value="">Select Event</option>
                            <option
                                v-for="event in events"
                                :key="event.id"
                                :value="event.id"
                            >
                                {{ event.title }}
                            </option>
                        </select>
                    </div>

                    <!-- Schedule Start Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Schedule Start Time</label
                        >
                        <input
                            type="time"
                            name="start_time"
                            v-model="form.start_time"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                    </div>
                    <!-- Schedule End Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Schedule End Time</label
                        >
                        <input
                            type="time"
                            name="end_time"
                            v-model="form.end_time"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                    </div>
                    &nbsp;
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Update Schedule
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </AdminLayouts>
</template>

<script setup>
const props = defineProps({
    schedule: Object,
    events: Array,
});
import { Link, useForm } from "@inertiajs/vue3";
import AdminLayouts from "@/Layouts/AdminLayouts.vue";

const form = useForm({
    event_id: props.schedule.event_id ?? "",
    start_time: props.schedule.start_time?.slice(0, 5),
    end_time: props.schedule.end_time?.slice(0, 5),
});

function submitForm() {
    // form.put(`/admin/schedule/${props.schedule.id}`);
    form.put(route("schedule.update", props.schedule.id));
}
</script>

<style></style>
