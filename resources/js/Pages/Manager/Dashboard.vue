<template>
    <div>
        i am Manager

        <Link :href="route('logout')" method="post" as="button">Logout</Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<style></style>
