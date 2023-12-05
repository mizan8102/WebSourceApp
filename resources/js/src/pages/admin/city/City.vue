<script setup>
import { ref } from 'vue';
const validatedCustom01 = ref(null)
</script>


<template>
    <CRow>
        <CCol :xs="12">
            <CCard class="mb-4">
                <CCardHeader>
                    <strong>Vue Form Control</strong>
                </CCardHeader>
                <CCardBody>
                    <CForm class="row g-3 needs-validation" novalidate :validated="validatedCustom01"
                        @submit="handleSubmitCustom01">
                        <CCol :md="4">
                            <div class="mb-3">
                                <CFormInput id="validationTextarea" type="file" aria-label="file example" required />
                                <CFormFeedback invalid>Example invalid form file feedback</CFormFeedback>
                            </div>
                        </CCol>
                    </CForm>

                </CCardBody>
            </CCard>
        </CCol>
    </CRow>
</template>