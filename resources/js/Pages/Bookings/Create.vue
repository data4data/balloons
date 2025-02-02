<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    booking:{
        type: Object,
    },
    availableBalloons: {
        type: Array,
    },
    availableFestivalDays: {
        type: Array,
    }
});

const form = useForm({
    name: null,
    email: null,
    password: null,
    balloon_id: null,
    festival_day_id: null,
    special_requests: null,
    people_count: null
});

</script>

<template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Book Your Experience
                    </h2>
                </header>
                    <form
                        @submit.prevent="form.put('/booking')"
                       class="mt-6 space-y-6"
                    >


                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <InputLabel for="name" value="Name" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.name"
                                            required
                                        />
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="sm:col-span-3">
                                    <InputLabel for="email" value="Email" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <TextInput
                                            id="email"
                                            type="text"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.email"
                                            required
                                        />
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="sm:col-span-6">
                                    <InputLabel for="password" value="Password" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <TextInput
                                            id="password"
                                            type="password"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.password"
                                            required
                                        />
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Booking Information</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <InputLabel for="balloon_id" value="Ballon" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <select
                                            id="balloon_id"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.balloon_id"
                                            required
                                        >
                                            <option v-for="(value, id) in availableBalloons" :key="balloon_id" :value="id">
                                            {{ value }} 
                                            </option>
                                        </select>
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="sm:col-span-3">
                                    <InputLabel for="festival_day_id" value="Festival day" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <select
                                            id="festival_day_id"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.festival_day_id"
                                            required
                                        >
                                            <option v-for="(value, id) in  availableFestivalDays" :key="festival_day_id" :value="id">
                                            {{ value }} 
                                            </option>
                                        </select>
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="sm:col-span-3">
                                    <InputLabel for="special_requests" value="Comments" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <TextInput
                                            id="special_requests"
                                            type="text"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.special_requests"
                                        />
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <InputLabel for="people_count" value="Number of passengers" class="block text-sm/6 font-medium text-gray-900"/>
                                    <div class="mt-2">
                                        <TextInput
                                            id="people_count"
                                            type="number"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            v-model="form.people_count"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p
                                    v-if="form.recentlySuccessful"
                                    class="text-sm text-gray-600"
                                >
                                    Saved.
                                </p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

