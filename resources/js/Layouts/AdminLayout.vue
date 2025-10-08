<template>
    <section class="w-full p-4 border-b border-gray-100">
        <header>
            Market admin
        </header>
    </section>
    <section class="flex">
        <aside class="w-1/4 bg-gray-900 min-h-screen">
            <nav>
                <Link :href="route('dashboard')" class="block p-4 text-white border-b border-gray-200">Даш борд</Link>
                <Link :href="route('admin.product-parents.index')" class="block p-4 text-white border-b border-gray-200">Группа продуктов</Link>
                <Link :href="route('admin.products.index')" class="block p-4 text-white border-b border-gray-200">Продукты</Link>
                <Link :href="route('admin.categories.index')" class="block p-4 text-white border-b border-gray-200">Категории</Link>
                <Link :href="route('admin.params.index')" class="block p-4 text-white border-b border-gray-200">Характеристики</Link>
            </nav>
        </aside>
        <article class="w-3/4 bg-gray-50 p-4">
            <slot/>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineOptions({ name: 'AdminLayout' })
</script>

<style scoped>

</style>
