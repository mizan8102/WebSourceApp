<template>
    <CDropdown placement="bottom-end" variant="nav-item">
        <CDropdownToggle class="py-0 pe-0" :caret="false">
            <CAvatar :src="avatar" size="md" />
        </CDropdownToggle>
        <CDropdownMenu class="pt-0">
            <CDropdownItem @click="logout" style="cursor: pointer">
                <CIcon icon="cil-lock-locked" /> Logout
            </CDropdownItem>
        </CDropdownMenu>
    </CDropdown>
</template>

<script setup>
import avatar from "../assets/images/avatars/8.jpg";
import store from "../store";
import { ref } from "vue";
import { useRouter } from "vue-router";

const itemsCount = ref(42);
const router = useRouter();

function logout() {
    store.dispatch("logout").then(() => {
        router.push({ name: "login" });
    });
}
</script>
