<template>
    <div class="form-group mb-6">
        <label for="name" class="form-label inline-block mb-2 text-gray-700">
            {{ label }}
        </label>
        <slot />
        <div v-if="error" class="mt-2 font-semibold text-red-500">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        label: String,
        error: String,
    },
}
</script>
