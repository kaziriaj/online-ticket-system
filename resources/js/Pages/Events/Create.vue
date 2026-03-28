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
                    href="/admin/events"
                    class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 text-gray-700"
                >
                    <UserIcon class="w-5 h-5 mr-2 text-indigo-600" /> Events
                </Link>
                <Link
                    href="/profile"
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
            <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Add New Event</h2>

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
        </main>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";

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
