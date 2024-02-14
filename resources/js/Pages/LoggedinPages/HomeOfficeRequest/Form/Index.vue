<template>
    <div class="max-w-4xl mx-auto py-10">
        <Head title="Home Office Request" />
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl mb-4 font-bold">Home Office Request Form</h2>
            <form @submit.prevent="submitForm">
                <!-- First Name -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="firstname"
                    >
                        First Name
                    </label>
                    <input
                        v-model="form.firstname"
                        type="text"
                        id="firstname"
                        placeholder="John"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="lastname"
                    >
                        Last Name
                    </label>
                    <input
                        v-model="form.lastname"
                        type="text"
                        id="lastname"
                        placeholder="Doe"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="email"
                    >
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        placeholder="john.doe@example.com"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Personal Number -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="personalnumber"
                    >
                        Personal Number
                    </label>
                    <input
                        v-model="form.personalnumber"
                        type="text"
                        id="personalnumber"
                        placeholder="123456789"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Supervisor -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="supervisor"
                    >
                        Supervisor
                    </label>
                    <select
                        v-model="form.supervisor_id"
                        id="supervisor"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                        required
                    >
                        <option disabled value="">Please select one</option>
                        <option
                            v-for="supervisor in supervisors"
                            :key="supervisor.id"
                            :value="supervisor.id"
                        >
                            {{ supervisor.name }}
                            <!-- Assuming each supervisor has an 'id' and 'name' -->
                        </option>
                    </select>
                </div>

                <!-- Date -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="date"
                    >
                        Date
                    </label>
                    <input
                        v-model="form.date"
                        type="date"
                        id="date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="address"
                    >
                        Address
                    </label>
                    <input
                        v-model="form.address"
                        type="text"
                        id="address"
                        placeholder="1234 Main St"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="phonenumber"
                    >
                        Phone Number
                    </label>
                    <input
                        v-model="form.phonenumber"
                        type="tel"
                        id="phonenumber"
                        placeholder="555-1234"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    />
                </div>

                <!-- Comments -->
                <div class="mb-6">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="comments"
                    >
                        Comments
                    </label>
                    <textarea
                        v-model="form.comments"
                        id="comments"
                        rows="3"
                        placeholder="Your comment..."
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const form = ref({
    firstname: "",
    lastname: "",
    email: "",
    personalnumber: "",
    supervisor_id: "",
    date: "",
    address: "",
    phonenumber: "",
    comments: "",
});

function resetForm() {
    form.value = {
        firstname: "",
        lastname: "",
        email: "",
        personalnumber: "",
        supervisor_id: "", // Keep this consistent
        date: "",
        address: "",
        phonenumber: "",
        comments: "",
    };
}

function submitForm() {
    Inertia.post("/home-office-requests", form.value, {
        onSuccess: () => {
            resetForm(); // Use the reset function here
        },
        onError: (errors) => {
            // Handle errors, possibly setting an 'errors' reactive property to show them in the form
        },
    });
}
</script>
