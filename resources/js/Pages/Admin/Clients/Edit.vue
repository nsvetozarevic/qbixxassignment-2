<template>
    <AdminLayout>
        <Head title="Edit Client" />

        <div class="w-full py-8 flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-1/3">

                <form @submit.prevent="form.put(`/admin/clients/${client.id}/update`)">
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

                    <h2 class="text-2xl font-bold mb-4 mt-10">Client Items</h2>

                    <div v-for="(item, index) in form.items">

                        <h3 class="text-xl font-bold border-b-2 border-gray-500 mb-6 mt-6">Item {{ index + 1 }}</h3>
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                    <li v-for="(localeName, localeCode) in locales" class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal cursor-pointer"
                                           @click="toggleTabs(localeCode)"
                                           :class="{'text-blue-600 bg-white': openTab !== localeCode, 'text-white bg-blue-600': openTab === localeCode}"
                                        >
                                            {{ localeName }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="px-4 py-5 flex-auto">
                                        <div class="tab-content tab-space">
                                            <div v-for="(localeName, localeCode) in locales" :class="{'hidden': openTab !== localeCode, 'block': openTab === localeCode}">
                                                <FormGroup label="Type" :error="form.errors[`items.${index}.type`]">
                                                    <ModelSelect :options="formattedTypes" v-model="item.type" />
                                                </FormGroup>

                                                <FormGroup label="Title" :error="form.errors[`items.${index}.title.${localeCode}`]">
                                                    <input
                                                        type="text"
                                                        v-model="item.title[localeCode]"
                                                        placeholder="Enter client name"
                                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    >
                                                </FormGroup>

                                                <FormGroup label="Paragraph" :error="form.errors[`items.${index}.paragraph.${localeCode}`]">
                                                    <textarea
                                                        v-model="item.paragraph[localeCode]"
                                                        placeholder="Enter client name"
                                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    ></textarea>
                                                </FormGroup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex items-end justify-end space-x-8 mt-10">
                        <Link
                            href="/admin/clients"
                            title="Return to index"
                            class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        >
                            Cancel
                        </Link>

                        <ButtonPrimary :disabled="form.processing">
                            Update Client
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
    import {ModelSelect} from 'vue-search-select'
    import 'vue-search-select/dist/VueSearchSelect.css'
    import ButtonPrimary from '@/js/Shared/ButtonPrimary.vue'
    import FormGroup from '@/js/Shared/FormGroup.vue'

    export default {
        components: {
            AdminLayout,
            ModelSelect,
            ButtonPrimary,
            FormGroup,
        },
        props: {
            locales: Object,
            types: Array,
            client: Object,
            items: Object,
        },
        setup(props) {
            const form = useForm({
                name: props.client.name,
                items: props.items,
            })

            return {form}
        },
        data() {
            return {
                openTab: 'en'
            }
        },
        computed: {
            formattedTypes: (props) => {
                return props.types.map(function(type) {
                    return { value: type, text: type.charAt(0).toUpperCase() + type.slice(1) }
                })
            }
        },
        methods: {
            toggleTabs: function(tabNumber) {
                this.openTab = tabNumber
            },
        },
    }
</script>
