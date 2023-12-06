<script setup>
import { ref } from "vue";
import store from "../../store";
import { useRouter } from "vue-router";

let loading = ref(false);
let errorMsg = ref("");
const router = useRouter();

const user = {
    name: "",
    email: "",
    password: "",
};

function register() {
    loading.value = true;
    store
        .dispatch("register", user)
        .then(() => {
            loading.value = false;
            router.push("/login");
        })
        .catch(({ response }) => {
            loading.value = false;
            errorMsg.value = response.data.errors;
        });
}
</script>

<template>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol :md="5">
                    <CCardGroup>
                        <CCard class="p-4">
                            <CCardBody>
                                <div
                                    v-if="Object.keys(errorMsg).length > 0"
                                    class="alert alert-danger d-flex justify-content-between align-items-center py-3 px-5 rounded"
                                >
                                    <ul>
                                        <li
                                            v-for="(errors, field) in errorMsg"
                                            :key="field"
                                        >
                                            <strong>{{ field }}</strong
                                            >: {{ errors.join(", ") }}
                                        </li>
                                    </ul>
                                </div>

                                <CForm method="POST" @submit.prevent="register">
                                    <h1>Registration</h1>
                                    <p class="text-body-secondary">
                                        Sign Up to your account
                                    </p>
                                    <CInputGroup class="mb-3">
                                        <CInputGroupText>
                                            <CIcon icon="cil-user" />
                                        </CInputGroupText>
                                        <CFormInput
                                            v-model="user.name"
                                            placeholder="Name"
                                            autocomplete="name"
                                            type="text"
                                            required
                                        />
                                    </CInputGroup>
                                    <CInputGroup class="mb-3">
                                        <CInputGroupText>
                                            <CIcon icon="cil-mail" />
                                        </CInputGroupText>
                                        <CFormInput
                                            v-model="user.email"
                                            placeholder="Email"
                                            autocomplete="email"
                                            type="email"
                                            required
                                        />
                                    </CInputGroup>
                                    <CInputGroup class="mb-4">
                                        <CInputGroupText>
                                            <CIcon icon="cil-lock-locked" />
                                        </CInputGroupText>
                                        <CFormInput
                                            type="password"
                                            v-model="user.password"
                                            placeholder="Password"
                                            autocomplete="current-password"
                                            required
                                        />
                                    </CInputGroup>
                                    <CRow>
                                        <CCol :xs="6">
                                            <CButton
                                                color="primary"
                                                class="px-4"
                                                type="submit"
                                                :disabled="loading"
                                            >
                                                {{
                                                    loading
                                                        ? "Loading..."
                                                        : "Register"
                                                }}
                                            </CButton>
                                        </CCol>
                                        <CCol :xs="6" class="text-right">
                                            <CButton
                                                @click="
                                                    () => $router.push('/login')
                                                "
                                                color="link"
                                                class="px-0"
                                            >
                                                Already register. Login
                                            </CButton>
                                        </CCol>
                                    </CRow>
                                </CForm>
                            </CCardBody>
                        </CCard>
                    </CCardGroup>
                </CCol>
            </CRow>
        </CContainer>
    </div>
</template>
