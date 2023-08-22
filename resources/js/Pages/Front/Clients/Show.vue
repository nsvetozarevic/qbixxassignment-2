<template>
    <FrontLayout>
        <Head :title="client.name" />

        <nav class="w-full bg-white py-3 px-6 flex justify-between items-center">
            <div class="text-black font-montserrat font-normal text-xl">
                {{ client.name }}
            </div>
            <div>
                <button class="text-white font-montserrat font-bold text-sm bg-custom-blue px-4 py-1 rounded-full flex items-center" @click="openLangDropdown = !openLangDropdown">
                    {{ __('Language')}}
                    <svg :class="{'w-5 h-5 ml-1 mt-1': true, 'rotate-180': openLangDropdown}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                    </svg>
                </button>
                <div v-show="openLangDropdown" class="absolute right-6 z-10 mt-2 w-32 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        <Link v-for="(localeName, localeCode) in locales" :href="`?locale=${localeCode}`" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                            {{ localeName }}
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <section class="p-6 flex flex-col space-y-6 md:flex-row md:space-y-0 md:space-x-6 md:items-stretch">
            <div v-for="item in items" class="bg-white rounded-xl md:w-1/3 flex flex-col">
                <div class="flex-grow">
                    <div :class="{
                            'text-center font-bold text-sm uppercase p-3 mt-10': true,
                            'bg-cyan-100 text-cyan-600': item.type === 'wisdom',
                            'bg-yellow-100 text-yellow-600': item.type === 'philosophy',
                            'bg-pink-100 text-pink-600': item.type === 'design',
                        }"
                    >
                        {{ __(item.type)}}
                    </div>
                    <h1 class="line-clamp-2 text-black font-montserrat font-bold text-3xl px-6 mt-6 mb-6 xl:text-50px">
                        {{ item.title }}
                    </h1>
                    <p class="text-black font-montserrat font-normal text-xl px-6 mt-6 mb-6">
                        {{ item.paragraph }}
                    </p>
                </div>
                <div class="p-6">
                    <Link href="#" class="text-white font-montserrat font-bold text-base bg-custom-blue px-6 py-3 rounded-full">
                        {{ __('Just a button')}}
                    </Link>
                </div>
            </div>
        </section>
    </FrontLayout>
</template>

<script>
    import FrontLayout from '@/js/Layouts/FrontLayout.vue'

    export default {
        components: {
            FrontLayout,
        },
        props: {
            locales: Object,
            types: Array,
            client: Object,
            items: Object,
            translations: Object,
        },
        data() {
            return {
                openLangDropdown: false,
            }
        },
        setup(props) {
            window._translations = JSON.parse(JSON.stringify(props.translations))
        },
    }
</script>
