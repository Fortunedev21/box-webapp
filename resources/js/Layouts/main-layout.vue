<script setup>

import navbar from '@/components/navbar.vue';
import sidebar from '@/components/sidebar.vue';
import { onMounted, ref } from "vue";

const animate = ref(false);

onMounted(() => {
    animate.value = true;
})

</script>

<template>
    <div id="layout-wrapper">

        <navbar />

        <sidebar />

        <div class="main-content">

            <div class="page-content">
                <!-- Start Content-->

                <Transition appear name="page" mode="out-in" :key="$page.component">
                    <b-container fluid>

                        <div v-if="animate">
                            <slot />
                        </div>
                    </b-container>
                </Transition>

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <b-container fluid>
                    <b-row>
                        <b-col col sm="6">
                            © Dge | Finance.
                        </b-col>
                        <b-col col sm="6">
                            <div class="text-sm-end d-none d-sm-block">
                                {{ new Date().getFullYear() }} - Tout droit réservés
                            </div>
                        </b-col>
                    </b-row>
                </b-container>
            </footer>

        </div>


    </div>
</template>

<style>
.page-enter-active,
.page-leave-active {
    transition: all .2s;
}

.page-leave-to,
.page-enter-from {
    opacity: 0;
    transform: translateY(20px);
}

.page-leave-from,
.page-enter-to {
    opacity: 1;
    transform: translateY(0);
}
</style>
