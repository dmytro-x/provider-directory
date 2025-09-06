<template>
    <div>
        <label class="block mb-2">Filter by category:</label>
        <select v-model="selectedCategory" @change="fetchProviders" class="border bg-white p-2 mb-4">
            <option value="">-- All Categories --</option>
            <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                {{ cat.name }}
            </option>
        </select>

        <div v-if="loading">Loading...</div>

        <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div v-for="provider in providers" :key="provider.id" class="border p-4 bg-white rounded shadow">
                <img :src="provider.logo_url" :alt="provider.name + ' logo'"
                     class="h-32 w-full object-contain mb-4"
                     loading="lazy">
                <h2 class="text-xl font-semibold">{{ provider.name }}</h2>
                <p class="text-sm text-gray-700">{{ provider.short_description }}</p>
                <p class="text-xs text-gray-500 mt-2">Category: {{ provider.category }}</p>

                <a
                    :href="`/providers/${provider.id}`"
                    class="inline-block mt-3 text-blue-600 underline text-sm"
                >
                    View Profile
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const providers = ref([])
const categories = ref([])
const selectedCategory = ref('')
const loading = ref(false)

const safeExtractData = (json, endpointName = '') => {
    if (!json || typeof json !== 'object' || !Array.isArray(json.data)) {
        console.error(`Unexpected API response structure from "${endpointName}"`);
        return [];
    }
    return json.data;
};

const fetchProviders = async () => {
    loading.value = true;
    try {
        const res = await fetch(`/api/providers?category=${selectedCategory.value}`);
        const json = await res.json();
        providers.value = safeExtractData(json, '/api/providers');
    } catch (e) {
        console.error('Failed to load providers:', e);
    } finally {
        loading.value = false;
    }
};

const fetchCategories = async () => {
    try {
        const res = await fetch('/api/categories');
        const json = await res.json();
        categories.value = safeExtractData(json, '/api/categories');
    } catch (e) {
        console.error('Failed to load categories:', e);
    }
};

onMounted(async () => {
    await fetchCategories()
    await fetchProviders()
})
</script>
