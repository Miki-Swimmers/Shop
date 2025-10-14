<template>
    <div>
        <div class="mb-4">
            <Link :href="route('admin.categories.index')" class="d-inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">Назад</Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="category.title" class="border border-gray-200 p-2 w-1/4" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <select v-model="category.parent_id" class="border border-gray-200 p-2 w-1/4">
                    <option :value="null" disabled selected>Выберите категорию</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
            </div>
            <div class="mb-4">
                <a href="#" @click.prevent="storeCategory" class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">Обновить</a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    name: "CategoryEdit",
    layout: AdminLayout,

    props: {
        category: Object,
        categories: Array
    },

    components: {
        Link
    },

    methods: {
        storeCategory() {
            axios.patch(route('admin.categories.update', this.category), this.category)
                .then((res) => {
                });
        }
    }
};
</script>

<style scoped>
</style>


