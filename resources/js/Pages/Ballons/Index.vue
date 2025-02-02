<template>
    <authenticated-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a :href="route('ballons.create')" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >Add balloon</a
                >
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Capacity</th>
                            <th v-if="user.role=='admin'" scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pilot id</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created at</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        <tr v-for="ballon in ballons" :key="ballon.id">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ ballon.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ballon.description }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ballon.capacity }}</td>
                            <td v-if="user.role=='admin'"  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ballon.pilot_id }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ballon.created_at }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-0">
                                <a :href="'ballons/' + ballon.id" class="text-indigo-600 hover:text-indigo-900"
                                >Edit<span class="sr-only">, {{ ballon.id }}</span></a
                                >
                                <button class="pl-10" type="button" @click="onDeleteConfirmSend(ballon.id)">Delete
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </authenticated-layout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {router} from "@inertiajs/vue3";
const props = defineProps({
    ballons: Array,
    user: Object
})
function onDeleteConfirmSend(id){
    router.delete('/ballons/' + id)
}
</script>
