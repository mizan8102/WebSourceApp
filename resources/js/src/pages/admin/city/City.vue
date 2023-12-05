<script setup>
import { ref } from 'vue';
import axiosClient from '../../../axios';
import axios from 'axios'
const validated = ref(null)
const file = ref();


function handleSubmit(event) {
    const form = event.currentTarget
    if (form.checkValidity() === false) {
        event.preventDefault()
        event.stopPropagation()
    }
    validated.value = true;
    let formData = new FormData();
    formData.append("excel", file.value);
    axios.post('api/city', formData, {
        headers: 
            {
                "Content-Type": "multipart/form-data",
            }
        })
    .then((res) => {
        console.log(res)
    }).catch((err) => {
        console.log(err)
    })
}


const uploadFile = (event) => {
    file.value = event.target.files[0];
}

</script>


<template>
    <CRow>
        <CCol :xs="12">
            <CCard class="mb-4">
                <CCardHeader>
                    <strong>Import City Data</strong>
                </CCardHeader>
                <CCardBody>
                    <CForm class="row g-3 needs-validation" novalidate :validated="validated" @submit="handleSubmit">
                        <CCol :md="4">
                            <div class="mb-3">
                                <CFormInput accept=".xlsx, .csv" id="validationTextarea" type="file"
                                    aria-label="file example" @change="uploadFile" required />
                                <CFormFeedback invalid>Select a valid xlsx/csv file</CFormFeedback>
                            </div>
                        </CCol>

                        <CCol :md="4" class="position-relative">
                            <CButton color="primary" type="submit">Submit</CButton>
                        </CCol>
                    </CForm>

                </CCardBody>
            </CCard>
        </CCol>
    </CRow>
</template>