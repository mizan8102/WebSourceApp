<script setup>
import { ref } from "vue";
const props = defineProps({
    visible: {
        type: Boolean,
        default: false,
    },
    model: {
        type: Object,
        default: {},
    },
});
</script>

<template>
    <CModal size="lg" :visible="visible" @close="$emit('closeModel')">
        <CModalHeader>
            <CModalTitle>Show </CModalTitle>
        </CModalHeader>
        <CModalBody>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">City</label>
                        <input
                            type="text"
                            :value="model.city"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">City</label>
                        <input
                            type="text"
                            value="ljsdf"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">City Ascii</label>
                        <input
                            type="text"
                            :value="model.city_ascii"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">State Id</label>
                        <input
                            type="text"
                            :value="model.state_id"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">State Name</label>
                        <input
                            type="text"
                            :value="model.state_name"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">County fips</label>
                        <input
                            type="text"
                            :value="model.county_fips"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">County Name</label>
                        <input
                            type="text"
                            :value="model.county_name"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Lat</label>
                        <input
                            type="text"
                            :value="model.lat"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">population</label>
                        <input
                            type="text"
                            :value="model.population"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">density</label>
                        <input
                            type="text"
                            :value="model.density"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">density</label>
                        <input
                            type="text"
                            :value="model.density"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">source</label>
                        <input
                            type="text"
                            :value="model.source"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <CFormCheck
                            v-if="model.military == 'TRUE'"
                            id="flexCheckDefault"
                            class="mt-4"
                            disabled
                            checked
                            label="Military"
                        />
                        <CFormCheck
                            v-else
                            id="flexCheckDefault"
                            class="mt-4"
                            disabled
                            label="Military"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <CFormCheck
                            v-if="model.incorporated == 'TRUE'"
                            id="flexCheckDefault"
                            class="mt-4"
                            checked
                            disabled
                            label="Incorporated"
                        />
                        <CFormCheck
                            v-else
                            disabled
                            id="flexCheckDefault"
                            class="mt-4"
                            label="Incorporated"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">timezone</label>
                        <input
                            type="text"
                            :value="model.timezone"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ranking</label>
                        <input
                            type="text"
                            :value="model.ranking"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">zips</label>
                        <input
                            type="text"
                            :value="model.zips"
                            disabled
                            class="form-control"
                        />
                    </div>
                </div>
            </div>
        </CModalBody>
        <CModalFooter>
            <CButton color="secondary" @click="$emit('closeModel')">
                Close
            </CButton>
        </CModalFooter>
    </CModal>
</template>
