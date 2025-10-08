<template>
    <div>
        <div class="mb-4">
            <Link :href="route('admin.categories.create')" class="d-inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">Добавить</Link>
        </div>
    </div>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

defineOptions({
    name: "CategoryIndex",
    layout: AdminLayout,
    components: {Link}
})
</script>

<style scoped>
</style>
