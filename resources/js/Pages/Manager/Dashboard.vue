<template>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div
                class="p-4 text-xl font-bold border-b flex items-center space-x-2"
            >
                <svg
                    class="w-6 h-6 text-indigo-600"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 7h18M3 12h18M3 17h18"
                    />
                </svg>
                <span>My Dashboard</span>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <Link
                    href="/dashboard"
                    class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 text-gray-700"
                >
                    <HomeIcon class="w-5 h-5 mr-2 text-indigo-600" /> Dashboard
                </Link>
                <Link
                    href="/users"
                    class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 text-gray-700"
                >
                    <UserIcon class="w-5 h-5 mr-2 text-indigo-600" /> Users
                </Link>
                <Link
                    href="/settings"
                    class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 text-gray-700"
                >
                    <Cog6ToothIcon class="w-5 h-5 mr-2 text-indigo-600" />
                    Settings
                </Link>
                <Link
                    href="/logout"
                    method="post"
                    as="button"
                    class="flex items-center px-3 py-2 rounded hover:bg-red-100 text-red-600"
                >
                    <ArrowRightOnRectangleIcon class="w-5 h-5 mr-2" /> Logout
                </Link>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-semibold mb-4 flex items-center">
                <HomeIcon class="w-6 h-6 mr-2 text-indigo-600" /> Welcome to the
                Dashboard
            </h1>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-medium flex items-center">
                        <ChartBarIcon class="w-5 h-5 mr-2 text-indigo-600" />
                        Analytics
                    </h2>
                    <p class="text-gray-600">Some content here...</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-medium flex items-center">
                        <UsersIcon class="w-5 h-5 mr-2 text-indigo-600" /> Team
                    </h2>
                    <p class="text-gray-600">Some content here...</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-medium flex items-center">
                        <Cog6ToothIcon class="w-5 h-5 mr-2 text-indigo-600" />
                        Settings
                    </h2>
                    <p class="text-gray-600">Some content here...</p>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import {
    HomeIcon,
    UserIcon,
    Cog6ToothIcon,
    ArrowRightOnRectangleIcon,
    ChartBarIcon,
    UsersIcon,
} from "@heroicons/vue/24/outline";
</script>
