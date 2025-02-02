<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    festivalDay:{
        type: Object,
    },
    availableStatuses: {
        type:Array
    },
});

const id = props.festivalDay.id != undefined ? props.festivalDay.id : 0;

const form = useForm({
    date: props.festivalDay.date,
    description: props.festivalDay.description,
    status: props.festivalDay.status,
});


</script>

<template>
    <authenticated-layout>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Update Festival Day Information
            </h2>
        </header>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div
                    class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                    <form
                        @submit.prevent="form.put('/festival_days/' + id)"
                        class="mt-6 space-y-6"
                    >

                        <div>
                            <InputLabel for="date" value="Date" />

                            <VueDatePicker v-model="form.date" :enable-time-picker="false" :format="format"></VueDatePicker>
                        </div>

                        <div>
                            <InputLabel for="description" value="Description" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                required
                                autofocus
                                autocomplete="description"
                            />

                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div>
                            <InputLabel for="status" value="Status" />

                            <select
                                id="status"
                                class="mt-1 block w-full"
                                v-model="form.status"
                                required
                            >
                                <option v-for="availableStatus in availableStatuses" :key="status" :value="availableStatus">
                                {{ availableStatus }} 
                                </option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.status" />
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
    </authenticated-layout>
</template>

