<script setup>
import { ref } from "vue";
import axiosClient from "../../../axios";
import CityTable from "../../../components/core/table/CityTable.vue";
import { useRouter } from "vue-router";

const validated = ref(null);
const file = ref();
const isLoading = ref(false);
const cities = ref([]);
const resMsg = ref();
const router = useRouter();

// save
const handleSave = () => {
    isLoading.value = true;
    axiosClient
        .post("/city", {
            cities: cities.value,
        })
        .then((result) => {
            console.log(result);
            resMsg.value = result.data.data;
            // router.push("/admin/cityHome");
            cities.value = [];
        })
        .catch((err) => {
            console.error(err);
        })
        .finally(() => {
            isLoading.value = false;
        });
};

function populate(event) {
    const form = event.currentTarget;
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        return;
    }
    validated.value = true;
    let formData = new FormData();
    formData.append("excel", file.value);
    isLoading.value = true;
    axiosClient
        .post("/cityFileUpload", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        })
        .then((res) => {
            cities.value = res.data.data;
            isLoading.value = false;
        })
        .catch((err) => {
            resMsg.value = err;
            isLoading.value = false;
        });
}

const uploadFile = (event) => {
    file.value = event.target.files[0];
};
</script>

<template>
    <CRow>
        <CCol :xs="12">
            <CCard class="mb-4">
                <CCardHeader>
                    <strong>Import City Data</strong>
                </CCardHeader>
                <CCardBody>
                    <CForm
                        class="row g-3 needs-validation"
                        novalidate
                        :validated="validated"
                        @submit.prevent="populate"
                    >
                        <CCol :md="4">
                            <div class="mb-3">
                                <CFormInput
                                    accept=".xlsx, .csv"
                                    id="validationTextarea"
                                    type="file"
                                    aria-label="file example"
                                    @change="uploadFile"
                                    required
                                />
                                <CFormFeedback invalid
                                    >Select a valid xlsx/csv file</CFormFeedback
                                >
                            </div>
                        </CCol>

                        <CCol :md="4" class="position-relative">
                            <CButton
                                color="success"
                                v-if="cities.length"
                                :disbaled="isLoading"
                                @click="handleSave"
                                type="button"
                                >{{ isLoading ? "saving..." : "Save" }}</CButton
                            >
                            <CButton
                                v-else
                                color="primary"
                                :disbaled="isLoading"
                                type="submit"
                                >{{
                                    isLoading ? "uploading..." : "Populate"
                                }}</CButton
                            >

                            <div
                                v-if="isLoading"
                                class="spinner-border ms-3 mt-0"
                                role="status"
                            >
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </CCol>

                        <div
                            v-if="resMsg"
                            class="alert alert-success d-flex justify-content-between align-items-center py-3 px-5 rounded"
                        >
                            {{ resMsg }}
                        </div>
                    </CForm>
                </CCardBody>
            </CCard>

            <CityTable v-if="cities.length" :cities="cities" />
        </CCol>
    </CRow>
</template>
