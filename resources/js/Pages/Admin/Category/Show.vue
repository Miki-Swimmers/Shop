<template>
    <div>
        <div class="mb-4">
            <Link :href="route('admin.categories.create')"
                  class="d-inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">
                Добавить
            </Link>
        </div>

        <div>
            <table class="border-collapse table-auto w-full text-sm">
                <tbody class="bg-white dark:bg-slate-800">
                <tr>
                    <td class="border-b bg-white border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">ID</td>
                    <td class="border-b bg-white border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ category.id }}</td>
                </tr>
                <tr>
                    <td class="border-b bg-white border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Заголовок</td>
                    <td class="border-b bg-white border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ category.title}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineOptions({ name: "CategoryShow", layout: AdminLayout });

defineProps({
    category: { type: Object, required: true },
});
</script>


<style scoped>
</style>
