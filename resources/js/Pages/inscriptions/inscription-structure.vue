<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';


// defineOptions({
//     inheritAttrs: false,
//     layout: "default",
// })

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};


</script>

<template>
    <Head title="Inscription" />

    <div class="col-lg-12">
        <div class="bg-white">
            <div class="row g-0">


                <div class="col-lg-4">
                    <div class="p-lg-5 p-4 bg-dark min-vh-100 d-flex flex-column justify-content-center">
                        <div class="bg-overlay"></div>
                        <div class="position-relative d-flex flex-column align-items-center h-100">
                            <!-- <img :src="boxLogo" class="mb-4 mx-auto" alt="" srcset=""> -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="container">

                        <div class="min-vh-100 p-lg-5 p-4 d-flex flex-column justify-content-center">

                            <a href="mb-4" class="">
                                <span class="mb-4">
                                    <img alt="" class="w-50 mb-4" />
                                </span>

                            </a>


                            <div>
                                <h3 class="text-primary"> Informations sur la structure </h3>
                                <p class="text-muted">Entrez vos les informations pour accedez à votre espace
                                    administrateur.
                                </p>

                            </div>

                            <div class="mt-3">

                                <form @submit.prevent="submit" class="" novalidate>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" v-model="form.email" class="form-control"
                                            :class="{ 'is-invalid': form.errors.email }" id="email"
                                            placeholder="admin-box@support.com" aria-describedby="invalid-feedback-email">
                                        <div class="invalid-feedback" id="invalid-feedback-email"
                                            v-text="form.errors.email">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" v-model="form.email" class="form-control"
                                            :class="{ 'is-invalid': form.errors.email }" id="email"
                                            placeholder="admin-box@support.com" aria-describedby="invalid-feedback-email">
                                        <div class="invalid-feedback" id="invalid-feedback-email"
                                            v-text="form.errors.email">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-cover.html" class="text-muted">
                                                Mot de passe oublié ?
                                            </a>
                                        </div>
                                        <label class="form-label" for="password-input">Mot de passe </label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" v-model="form.password"
                                                class="form-control pe-5 password-input"
                                                :class="{ 'is-invalid': form.errors.password }" id="password-input"
                                                aria-describedby="invalid-feedback-pwd">
                                            <div class="invalid-feedback" id="invalid-feedback-pwd"
                                                v-text="form.errors.password"></div>

                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon"
                                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="form.remember_me"
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Se souvenir de moi ?</label>
                                    </div> -->

                                    <div class="mt-4 d-flex justify-content-between">
                                        <button class="btn btn-dark d-flex align-items-center gap-2"
                                            :disabled="form.processing" type="submit">
                                            <div v-if="form.processing" class="spinner-border spinner-border-sm "
                                                role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <span class=""> Précédent </span>
                                        </button>

                                        <button class="btn btn-primary d-flex align-items-center gap-2"
                                            :disabled="form.processing" type="submit">
                                            <div v-if="form.processing" class="spinner-border spinner-border-sm "
                                                role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <span class=""> Suivant </span>
                                        </button>
                                    </div>

                                </form>

                            </div>

                            <div class="mt-5 text-center">
                                <p class="mb-0">
                                    <span class="fw-semibold text-primary">
                                        BOX | Caisse Mobile 2024 - Tout droits réservés
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- end row -->
        </div>
        <!-- end card -->
    </div>
</template>

<style></style>
