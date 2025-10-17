<template>
    <div>
        <div class="mb-4">
            <Link :href="route('admin.product-groups.index')"
                  class="d-inline-block py-2 px-3 bg-sky-600 border border-sky-700 text-white">
                Назад
            </Link>
        </div>

        <div v-if="success" class="p-4 bg-green-100 mb-4">
            Успешно сохранено!
        </div>

        <div>
            <div class="mb-4">
                <input type="text" v-model="form.title"
                       class="border border-gray-200 p-2 w-1/4" placeholder="Заголовок">
            </div>
            <div class="mb-4">
                <a href="#" @click.prevent="updateProductGroup"
                   class="inline-block py-2 px-3 bg-indigo-600 border border-indigo-700 text-white">
                    Обновить
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import axios from "axios";

export default {
    name: "ProductGroupEdit",
    layout: AdminLayout,
    components: { Link },

    props: {
        productGroup: { type: Object, required: true },
        filterTypes: Array
    },

    data() {
        return {
            success: false,
            form: {
                title: this.productGroup?.title ?? ""
            }
        };
    },

    methods: {
        updateProductGroup() {
            axios
                .patch(route("admin.product-groups.update", this.productGroup.id), this.form)
                .then(() => {
                    this.success = true;
                });
        }
    },

    watch: {
        productGroup: {
            deep: true,
            handler() {
                this.form.title = this.productGroup?.title ?? "";
                this.success = false;
            }
        }
    }
};
</script>

<style scoped></style>
