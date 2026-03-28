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
            <div class="p-6 bg-gray-100 min-h-screen">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold">Event List</h1>
                    <!-- Add New Event Button -->
                    <Link
                        href="/admin/events/create"
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
                        Add New Event
                    </Link>
                </div>

                <!-- Event Table -->
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
                                    Event Description
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold"
                                >
                                    Date
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold"
                                >
                                    Location
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold"
                                >
                                    Created By
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
                            v-if="events && events.length > 0"
                        >
                            <tr
                                class="hover:bg-gray-50"
                                v-for="(event, index) in events"
                                :key="event.id"
                            >
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ index + 1 }}
                                </td>
                                <td
                                    class="px-6 py-4 text-sm text-gray-900 font-medium"
                                >
                                    {{ event.title }}
                                </td>
                                <td
                                    class="px-6 py-4 text-sm text-gray-900 font-medium"
                                >
                                    {{ event.description }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{
                                        new Date(
                                            event.event_date,
                                        ).toLocaleDateString("en-GB", {
                                            day: "numeric",
                                            month: "long",
                                            year: "numeric",
                                        })
                                    }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ event.location }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ event.user?.name ?? "N/A" }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 text-xs rounded bg-green-100 text-green-700"
                                    >
                                        {{ getStatus(event.event_date) }}</span
                                    >
                                </td>
                                <td class="px-4 py-2">
                                    <Link
                                        href="/edit"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium mr-2"
                                    >
                                        Edit
                                    </Link>
                                    |
                                    <Link
                                        href="/delete"
                                        class="text-red-600 hover:text-red-800 font-medium ml-2"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                            <!-- আরও event row এখানে যাবে -->
                        </tbody>
                        <tbody class="divide-y divide-gray-200" v-else>
                            <tr>
                                <td
                                    colspan="7"
                                    class="px-6 py-4 text-center text-gray-500"
                                >
                                    No events found
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    events: {
        type: Array,
    },
});

function getStatus(eventDate) {
    const today = new Date();
    const target = new Date(eventDate);

    if (target < today) {
        return "Expired";
    }

    //calculate remaning date
    const diffTime = target - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    return `Upcoming (${diffDays} days remaining)`;
}
</script>

<style></style>
