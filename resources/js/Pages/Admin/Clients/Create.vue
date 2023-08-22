<template>
    <AdminLayout>
        <Head title="New Client" />

        <div class="w-full py-8 flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-1/3">

                <form @submit.prevent="form.post('/admin/clients/create')">
                    <FormGroup label="Name" :error="form.errors.name">
                        <input
                            id="name"
                            name="name"
                            type="text"
                            v-model="form.name"
                            placeholder="Enter client name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        >
                    </FormGroup>

                    <div class="w-full flex items-end justify-end space-x-8">
                        <Link
                            href="/admin/clients"
                            title="Return to index"
                            class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        >
                            Cancel
                        </Link>

                        <ButtonPrimary :disabled="form.processing">
                            Create Client
                        </ButtonPrimary>
                    </div>
                </form>

            </div>
        </div>
    </AdminLayout>
</template>

<script>
    import {useForm} from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/js/Layouts/AdminLayout.vue'
    import ButtonPrimary from '@/js/Shared/ButtonPrimary.vue'
    import FormGroup from '@/js/Shared/FormGroup.vue'

    export default {
        components: {
            AdminLayout,
            ButtonPrimary,
            FormGroup,
        },

        setup() {
            const form = useForm({
                name: null,
            })

            return {form}
        },
    }
</script>
