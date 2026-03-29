<template>
    <AdminLayouts>
        <div class="p-6 bg-gray-100 min-h-screen">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Event Seat Scheduleing</h1>
                <!-- Add New schedule Button -->
                <Link
                    href="/admin/seats/create"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    <!-- Heroicon Plus -->
                    <svg
                        class="w-5 h-5 mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>
                    Add Seats
                </Link>
            </div>

            <!-- schedule Table -->
            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                Event Name
                            </th>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                Schedule
                            </th>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                Total Seat
                            </th>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                Status
                            </th>
                            <th
                                class="px-6 py-3 text-left text-sm font-semibold"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-gray-200"
                        v-if="schedules && schedules.length > 0"
                    >
                        <tr
                            class="hover:bg-gray-50"
                            v-for="(schedule, index) in schedules"
                            :key="schedule.id"
                        >
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ index + 1 }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm text-gray-900 font-medium"
                            >
                                {{ schedule.event.title }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm text-gray-900 font-medium"
                            >
                                {{ schedule.start_time }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ schedule.end_time }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700"></td>

                            <td class="px-4 py-2">
                                <Link
                                    :href="`/admin/schedule/${schedule.id}/edit`"
                                    class="text-indigo-600 hover:text-indigo-800 font-medium mr-2"
                                >
                                    Edit
                                </Link>
                                |
                                <Link
                                    :href="`/admin/schedule/${schedule.id}`"
                                    method="delete"
                                    as="button"
                                    class="text-red-600 hover:text-red-800 font-medium ml-2"
                                >
                                    Delete
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="divide-y divide-gray-200" v-else>
                        <tr>
                            <td
                                colspan="7"
                                class="px-6 py-4 text-center text-gray-500"
                            >
                                No schedules found
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayouts>
</template>

<script setup>
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    schedules: Array,
});
</script>

<style></style>
