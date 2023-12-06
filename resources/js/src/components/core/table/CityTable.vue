<script setup>
import { ref } from "vue";

const props = defineProps({
    cities: {
        default: [],
        type: Array,
    },
});
</script>

<template>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">City</th>
                    <th scope="col">City Asci</th>
                    <th scope="col">State id</th>
                    <th scope="col">State</th>
                    <th scope="col">County fips</th>
                    <th scope="col">County</th>
                    <th scope="col">lat</th>
                    <th scope="col">lng</th>
                    <th scope="col">Population</th>
                    <th scope="col">Density</th>
                    <th scope="col">Source</th>
                    <th scope="col">Military</th>
                    <th scope="col">Incorporated</th>
                    <th scope="col">Timezone</th>
                    <th scope="col">Ranking</th>
                    <th scope="col">Zips</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(city, index) in cities" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ city.city }}</td>
                    <td>{{ city.city_ascii }}</td>
                    <td>{{ city.state_id }}</td>
                    <td>{{ city.state_name }}</td>
                    <td>{{ city.county_fips }}</td>
                    <td>{{ city.county_name }}</td>
                    <td>{{ city.lat }}</td>
                    <td>{{ city.lng }}</td>
                    <td>{{ city.population }}</td>
                    <td>{{ city.density }}</td>
                    <td>{{ city.source }}</td>
                    <td>{{ city.military }}</td>
                    <td>{{ city.incorporated }}</td>
                    <td>{{ city.timezone }}</td>
                    <td>{{ city.ranking }}</td>
                    <td>{{ city.zips }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.table-container {
    width: 100%;

    overflow-x: auto;
    overflow-y: auto;
}
.table {
    width: max-content;
    white-space: nowrap;
    height: 300px;
    border-collapse: collapse;
    margin-bottom: 1rem;
    color: #212529;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>
