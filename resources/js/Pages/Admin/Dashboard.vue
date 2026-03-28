<template>
    <AdminLayouts>
        <h1 class="text-2xl font-semibold mb-4 flex items-center">
            <HomeIcon class="w-6 h-6 mr-2 text-indigo-600" /> Welcome to the
            Admin Dashboard
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Events</p>
                        <h2 class="text-3xl font-bold mt-2">
                            {{ totalEvents }}
                        </h2>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Upcoming Events</p>
                        <h2 class="text-3xl font-bold mt-2">
                            {{ upcomingEvents }}
                        </h2>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div
                class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Upcoming Events</p>
                        <h2 class="text-3xl font-bold mt-2">
                            {{ completedEvents }}
                        </h2>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Tickets</p>
                        <h2 class="text-3xl font-bold mt-2">540</h2>
                    </div>
                    <div class="bg-green-100 text-green-600 p-3 rounded-xl">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6M7 4h10l2 4v12H5V8l2-4z"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Users</p>
                        <h2 class="text-3xl font-bold mt-2">89</h2>
                    </div>
                    <div class="bg-purple-100 text-purple-600 p-3 rounded-xl">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.12 17.804z"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayouts>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayouts from "@/Layouts/AdminLayouts.vue";
import {
    HomeIcon,
    UserIcon,
    Cog6ToothIcon,
    ArrowRightOnRectangleIcon,
    ChartBarIcon,
    UsersIcon,
} from "@heroicons/vue/24/outline";

defineProps({
    totalEvents: {
        type: Number,
        required: true,
    },
    upcomingEvents: {
        type: Number,
        required: true,
    },
    completedEvents: {
        type: Number,
        required: true,
    },
});
</script>
