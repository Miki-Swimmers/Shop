<template>
    <div>
        <div class="mb-4">
            <!-- было: product-groups.index -->
            <Link :href="route('admin.product-groups.index')"
                  class="d-inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">
                Назад
            </Link>
        </div>
        <div>
            <div class="mb-4">
                <input type="text" v-model="productGroup.title"
                       class="border border-gray-200 p-2 w-1/4" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <a href="#" @click.prevent="storeProductGroup"
                   class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">
                    Создать
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import axios from "axios";

export default {
    name: "ProductGroupCreate",
    layout: AdminLayout,
    components: { Link },

    data() {
        return {
            productGroup: {
                title: "",
                filter_type: null,
            }
        };
    },

    methods: {
        storeProductGroup() {
            // было: product-groups.store
            axios.post(route("admin.product-groups.store"), this.productGroup)
                .then(() => {
                    // сбрасываем Оба поля, чтобы v-model не ругался
                    this.productGroup = { title: "", filter_type: null };
                    // и сразу возвращаемся к списку
                    router.visit(route("admin.product-groups.index"));
                });
        }
    }
};
</script>

<style scoped>
</style>


