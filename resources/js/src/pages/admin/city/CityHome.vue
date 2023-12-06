<script setup>
import { ref } from "vue";
import axiosClient from "../../../axios";
import CustomModal from "../../../components/core/Model/Model.vue";

const data = ref([]);
const links = ref([]);
const name = ref("");
const state = ref("");
const country = ref("");
const loading = ref(false);
const perPage = ref(10);
const currentUrl = ref(null);
const fromPagi = ref(0);
const toPagi = ref(0);
const totalPagi = ref(0);
const visible = ref(false);
const model = ref({});

dataGet(null, name.value, state.value, country.value, perPage.value);
async function dataGet(url, name, state, country, perPage) {
    url = url || "city";
    loading.value = true;
    await axiosClient
        .get(url, {
            params: {
                perPage,
                name,
                state,
                country,
            },
        })
        .then((res) => {
            data.value = res.data.data.data;
            links.value = res.data.data.links;
            toPagi.value = res.data.data.to;
            fromPagi.value = res.data.data.from;
            totalPagi.value = res.data.data.total;
            loading.value = false;
        })
        .catch((err) => {
            loading.value = false;
            return err;
        })
        .finally(() => {
            loading.value = false;
        });
}

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }
    currentUrl.value = link.url;
    dataGet(link.url, name.value, state.value, country.value, perPage.value);
}

function showData(data) {
    console.log(data);
    visible.value = true;
    model.value = data;
}
</script>

<template>
    <CRow>
        <CCol :xs="12">
            <CCard class="mb-5">
                <CCardBody>
                    <CRow class="mb-2">
                        <CCol :md="3">
                            <CButton
                                @click="() => $router.push('/admin/city')"
                                color="info"
                                class="px-4"
                                type="button"
                                >Import</CButton
                            >
                        </CCol>
                        <CCol :md="3">
                            <CFormInput
                                type="text"
                                @keyup="
                                    dataGet(null, name, state, country, perPage)
                                "
                                v-model="name"
                                id="exampleFormControlInput1"
                                placeholder="City"
                                aria-describedby="exampleFormControlInputHelpInline"
                            />
                        </CCol>
                        <CCol :md="3">
                            <CFormInput
                                type="text"
                                @keyup="
                                    dataGet(null, name, state, country, perPage)
                                "
                                id="exampleFormControlInput1"
                                placeholder="State"
                                v-model="state"
                                aria-describedby="exampleFormControlInputHelpInline"
                            />
                        </CCol>
                        <CCol :md="3">
                            <CFormInput
                                type="text"
                                @keyup="
                                    dataGet(null, name, state, country, perPage)
                                "
                                v-model="country"
                                id="exampleFormControlInput1"
                                placeholder="Country"
                                aria-describedby="exampleFormControlInputHelpInline"
                            />
                        </CCol>
                    </CRow>
                    <CRow>
                        <CCol :xs="12">
                            <div class="table-container">
                                <table class="table table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">City</th>
                                            <th scope="col">State</th>
                                            <th scope="col">County</th>
                                            <th scope="col">Population</th>
                                            <th scope="col">Density</th>

                                            <th scope="col">Ranking</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="loading || !data.length">
                                        <tr>
                                            <td colspan="9">
                                                <div
                                                    v-if="loading"
                                                    class="d-flex justify-content-center"
                                                >
                                                    <div
                                                        class="spinner-border"
                                                        role="status"
                                                    >
                                                        <span
                                                            class="visually-hidden"
                                                            >Loading...</span
                                                        >
                                                    </div>
                                                </div>
                                                <p
                                                    v-else
                                                    class="text-center py-8 text-gray-700"
                                                >
                                                    data not found
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr
                                            v-for="(city, index) in data"
                                            :key="index"
                                        >
                                            <th scope="row">
                                                {{ index + fromPagi }}
                                            </th>
                                            <td>{{ city.city }}</td>
                                            <td>{{ city.state_name }}</td>
                                            <td>{{ city.county_name }}</td>
                                            <td>{{ city.population }}</td>
                                            <td>{{ city.density }}</td>
                                            <td>{{ city.ranking }}</td>
                                            <td>
                                                <CButton
                                                    @click="showData(city)"
                                                    color="primary"
                                                    class="px-4 btn btn-sm"
                                                    type="button"
                                                    >show</CButton
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </CCol>
                    </CRow>

                    <CRow>
                        <CCol :xs="12">
                            <div
                                class="Page view-table-pagination d-flex justify-content-between align-items-center"
                            >
                                <div class="d-flex">
                                    <div class="parPage">
                                        <select
                                            @change="
                                                dataGet(
                                                    null,
                                                    name,
                                                    state,
                                                    country,
                                                    perPage
                                                )
                                            "
                                            v-model="perPage"
                                            class="form-select form-select-sm"
                                        >
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <p class="mb-0 ms-2">
                                        Showing {{ fromPagi }} to
                                        {{ toPagi }} of {{ totalPagi }} entries
                                    </p>
                                </div>
                                <ul class="pagination pagination-sm">
                                    <li
                                        v-for="page in links"
                                        class="page-item"
                                        :key="page"
                                        :class="[page.url ? '' : 'disabled']"
                                    >
                                        <a
                                            class="page-link custom-pointer"
                                            style="cursor: pointer"
                                            :class="[
                                                page.active ? 'active' : '',
                                            ]"
                                            @click="getForPage($event, page)"
                                            v-html="page.label"
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </CCol>
                    </CRow>
                    <CustomModal
                        :visible="visible"
                        @closeModel="() => (visible = false)"
                        :model="model"
                    ></CustomModal>
                </CCardBody>
            </CCard>
        </CCol>
    </CRow>
</template>

<style scoped>
.table-container {
    width: 100%;

    overflow-x: auto;
    overflow-y: auto;
}
.table {
    width: 100%;
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
