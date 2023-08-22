<template>
    <button type="submit" :disabled="disabled" class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        disabled: Boolean,
    },
}
</script>
