<script setup>

import { useEventListener } from '@vueuse/core';
import { ref } from 'vue';

import { Link, usePage } from '@inertiajs/vue3';

const toogleMenu = ref(null);

const currentPage = usePage();

function O() {
    const e = document.documentElement.clientWidth;
    const hamburgerIcon = document.querySelector(".hamburger-icon");
    const layout = document.documentElement.getAttribute("data-layout");
    const body = document.body;
    const sidebarSize = document.documentElement.getAttribute("data-sidebar-size");
    const sidebarVisibility = document.documentElement.getAttribute("data-sidebar-visibility");

    if (767 < e) {
        hamburgerIcon.classList.toggle("open");
    }

    if ("horizontal" === layout) {
        body.classList.toggle("menu");
    }

    if ("vertical" === layout) {
        if (e <= 1025 && 767 < e) {
            body.classList.remove("vertical-sidebar-enable");
            sidebarSize === "sm" ? document.documentElement.setAttribute("data-sidebar-size", "") : document.documentElement.setAttribute("data-sidebar-size", "sm");
        } else if (1025 < e) {
            body.classList.remove("vertical-sidebar-enable");
            sidebarSize === "lg" ? document.documentElement.setAttribute("data-sidebar-size", "sm") : document.documentElement.setAttribute("data-sidebar-size", "lg");
        } else if (e <= 767) {
            body.classList.add("vertical-sidebar-enable");
            document.documentElement.setAttribute("data-sidebar-size", "lg");
        }
    }

    if ("semibox" === layout) {
        if (767 < e) {
            if (sidebarVisibility === "show") {
                sidebarSize === "lg" ? document.documentElement.setAttribute("data-sidebar-size", "sm") : document.documentElement.setAttribute("data-sidebar-size", "lg");
            } else {
                document.getElementById("sidebar-visibility-show").click();
                document.documentElement.setAttribute("data-sidebar-size", sidebarSize);
            }
        } else if (e <= 767) {
            body.classList.add("vertical-sidebar-enable");
            document.documentElement.setAttribute("data-sidebar-size", "lg");
        }
    }

    if ("twocolumn" === layout) {
        body.classList.toggle("twocolumn-panel");
    }
}


const ev = useEventListener(toogleMenu, "click", O)



</script>

<template>
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">


                    <button ref="toogleMenu" type="button"
                        class="px-3 shadow-none btn btn-sm fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Rechercher..." autocomplete="off"
                                id="search-options" value="" />
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                id="search-close-options"></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                            <div data-simplebar style="max-height: 320px">
                                <!-- item-->
                                <div class="dropdown-header">
                                    <h6 class="mb-0 text-overflow text-muted text-uppercase">
                                        Recent Searches
                                    </h6>
                                </div>

                                <div class="bg-transparent dropdown-item text-wrap">
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to
                                        setup <i class="mdi mdi-magnify ms-1"></i></a>
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons
                                        <i class="mdi mdi-magnify ms-1"></i></a>
                                </div>
                                <!-- item-->
                                <div class="mt-2 dropdown-header">
                                    <h6 class="mb-1 text-overflow text-muted text-uppercase">
                                        Pages
                                    </h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-bubble-chart-line fs-18 text-muted me-2"></i>
                                    <span>Analytics Dashboard</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-lifebuoy-line fs-18 text-muted me-2"></i>
                                    <span>Help Center</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-user-settings-line fs-18 text-muted me-2"></i>
                                    <span>My account settings</span>
                                </a>

                                <!-- item-->
                                <div class="mt-2 dropdown-header">
                                    <h6 class="mb-2 text-overflow text-muted text-uppercase">
                                        Members
                                    </h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Angela Bernier</h6>
                                                <span class="mb-0 fs-11 text-muted">Manager</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">David Grasso</h6>
                                                <span class="mb-0 fs-11 text-muted">Web Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Mike Bunch</h6>
                                                <span class="mb-0 fs-11 text-muted">React Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="pt-3 pb-1 text-center">
                                <a href="" class="btn btn-primary btn-sm">View All Results
                                    <i class="ri-arrow-right-line ms-1"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center">
                    <!--<div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                            class="shadow-none btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class="bx bx-moon fs-22"></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="shadow-none btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-bell fs-22"></i>
                            <span
                                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                                    class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 text-white fs-16 fw-semibold">
                                                Notifications
                                            </h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            <span class="badge bg-light-subtle text-body fs-13">
                                                4 New</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-2 pt-2">
                                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                        id="notificationItemsTab" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab"
                                                aria-selected="true">
                                                All (4)
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                                aria-selected="false">
                                                Messages
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                                                aria-selected="false">
                                                Alerts
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content position-relative" id="notificationItemsTabContent">
                                <div class="py-2 tab-pane fade show active ps-2" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px" class="pe-2">
                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xs me-3">
                                                    <span
                                                        class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-2 lh-base">
                                                            Your <b>Elite</b> author Graphic Optimization
                                                            <span class="text-secondary">reward</span> is
                                                            ready!
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> Just 30
                                                            sec ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="all-notification-check01" />
                                                        <label class="form-check-label"
                                                            for="all-notification-check01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="flex-shrink-0 me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            Angela Bernier
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            Answered to your comment on the cash flow
                                                            forecast's graph 🔔.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="all-notification-check02" />
                                                        <label class="form-check-label"
                                                            for="all-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xs me-3">
                                                    <span
                                                        class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                        <i class="bx bx-message-square-dots"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-2 fs-13 lh-base">
                                                            You have received
                                                            <b class="text-success">20</b> new messages in
                                                            the conversation
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="all-notification-check03" />
                                                        <label class="form-check-label"
                                                            for="all-notification-check03"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="flex-shrink-0 me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            Maureen Gibson
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            We talked about a project on linkedin.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 4 hrs
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="all-notification-check04" />
                                                        <label class="form-check-label"
                                                            for="all-notification-check04"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3 text-center view-all">
                                            <button type="button" class="btn btn-soft-success waves-effect waves-light">
                                                View All Notifications
                                                <i class="align-middle ri-arrow-right-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-2 tab-pane fade ps-2" id="messages-tab" role="tabpanel"
                                    aria-labelledby="messages-tab">
                                    <div data-simplebar style="max-height: 300px" class="pe-2">
                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            James Lemire
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            We talked about a project on linkedin.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="messages-notification-check01" />
                                                        <label class="form-check-label"
                                                            for="messages-notification-check01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            Angela Bernier
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            Answered to your comment on the cash flow
                                                            forecast's graph 🔔.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="messages-notification-check02" />
                                                        <label class="form-check-label"
                                                            for="messages-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            Kenneth Brown
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            Mentionned you in his comment on 📃 invoice
                                                            #12501.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 10 hrs
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="messages-notification-check03" />
                                                        <label class="form-check-label"
                                                            for="messages-notification-check03"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src=""
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                            Maureen Gibson
                                                        </h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">
                                                            We talked about a project on linkedin.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 3 days
                                                            ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="messages-notification-check04" />
                                                        <label class="form-check-label"
                                                            for="messages-notification-check04"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3 text-center view-all">
                                            <button type="button" class="btn btn-soft-success waves-effect waves-light">
                                                View All Messages
                                                <i class="align-middle ri-arrow-right-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 tab-pane fade" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab">
                                </div>

                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center">
                                        Select
                                        <div id="select-content" class="px-1 text-body fw-semibold">
                                            0
                                        </div>
                                        Result
                                        <button type="button" class="p-0 btn btn-link link-danger ms-3"
                                            data-bs-toggle="modal" data-bs-target="#removeNotificationModal">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="shadow-none btn" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <div class=" header-profile-user bg-success-subtle text-success rounded-circle fs-13"
                                    v-text="$page.props.auth.user?.nom.charAt(0) + $page.props.auth.user?.prenom.charAt(0)">
                                </div>
                                <!-- <img class="rounded-circle header-profile-user"
                                        src="assets/images/users/avatar-1.jpg" alt="Header Avatar" /> -->
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                        {{ $page.props.auth.user?.nom }} {{ $page.props.auth.user?.prenom }}
                                    </span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Anna!</h6>
                            <!-- <Link class="dropdown-item"
                                :href="route('dge.admin.utilisateurs.show', $page.props.auth.user?.id)"><i
                                class="align-middle mdi mdi-account-circle text-muted fs-16 me-1"></i>
                            <span class="align-middle">Mon Profile</span>
                            </Link> -->

                            <!-- <Link method="post" as="button" class="dropdown-item" :href="route('dge.admin.logout')">
                            <i class="align-middle mdi mdi-logout text-muted fs-16 me-1"></i>
                            <span class="align-middle" data-key="t-logout">Logout</span>
                            </Link> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
</template>

<style></style>
