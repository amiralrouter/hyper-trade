<template>
    <Link class="flex items-center px-2 py-2 mx-3 text-sm rounded cursor-pointer text-slate-300 hover:text-white hover:bg-slate-600">
        <div class="flex items-center w-8 h-6">
        </div> 
        <div class="flex-1">
            <div>Disabled collapsable</div>
            <div class="text-xs opacity-60"> Manually marked as active </div>
        </div>
        <div class="flex items-center justify-center w-5 h-5 text-xs text-white rounded-full bg-rose-500">2</div>
    </Link>
</template>


<script setup>
    import {
        Link
    } from '@inertiajs/inertia-vue3' 

</script>
