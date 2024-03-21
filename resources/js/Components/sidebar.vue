<script setup>

import simplebar from 'simplebar-vue';
import { reactive } from 'vue';
// import dgelogo from '../../../images/logo_dge_benin.png'
import dynamicMenu from "@/components/dynamic-menu.vue";
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const menuItems = reactive([
    {
        type: 'title',
        text: 'Menu',
        permissions: ['liste actualites', 'creer actualites', 'liste categories actualites'],
    },
    // {
    //     submenu: false,
    //     text: 'Tableau de bord',
    //     iconClass: 'mdi mdi-speedometer',
    //     permissions: ['voir tableau de bord'],
    //     link: route('dge.admin.dashboard'),
    // },
    // {
    //     submenu: true,
    //     text: 'Actualités',
    //     iconClass: 'mdi mdi-newspaper',
    //     permissions: ['liste actualites', 'creer actualites', 'liste categories actualites'],
    //     submenuItems: [
    //         {
    //             text: 'Liste des actualités',
    //             permissions: ['liste actualites'],
    //             link: route('dge.admin.actualites.index'),
    //         },
    //         {
    //             text: 'Nouvelle actualité',
    //             permissions: ['creer actualites'],
    //             link: route('dge.admin.actualites.create'),
    //         },

    //         {
    //             text: 'Catégories d\'actualités',
    //             permissions: ['liste categories actualites'],
    //             link: route('dge.admin.categories-actualites.index'),
    //         },
    //     ],
    // },

    // {
    //     submenu: false,
    //     text: 'Flash Infos',
    //     iconClass: 'mdi mdi-google-analytics',
    //     permissions: ['liste indicateurs cles'],
    //     link: route('dge.admin.videos.index'),
    // },

    // {
    //     type: 'title',
    //     text: 'Présentation',
    //     permissions: ['liste directions', 'creer directions', 'liste directeurs', 'creer directeurs'],
    // },
    // {
    //     submenu: true,
    //     text: 'Directeurs',
    //     iconClass: 'mdi mdi-home',
    //     permissions: ['liste directeurs', 'creer directeurs'],
    //     submenuItems: [
    //         {
    //             text: 'Liste des directeurs',
    //             permissions: ['liste directeurs'],
    //             link: route('dge.admin.directeurs.index'),
    //         },
    //         {
    //             text: 'Nouveau directeur',
    //             permissions: ['creer directeurs'],
    //             link: route('dge.admin.directeurs.create'),
    //         },
    //     ],
    // },

    // {
    //     submenu: true,
    //     text: 'Directions',
    //     permissions: ['liste directions', 'creer directions'],
    //     iconClass: 'mdi mdi-view-grid-plus-outline',
    //     submenuItems: [
    //         {
    //             text: 'Liste des directions',
    //             permissions: ['liste directions'],
    //             link: route('dge.admin.directions.index'),
    //         },
    //         {
    //             text: 'Nouvelle direction',
    //             permissions: ['creer directions'],
    //             link: route('dge.admin.directions.create'),
    //         },

    //         {
    //             text: 'Membres de direction',
    //             permissions: ['liste membres direction'],
    //             link: route('dge.admin.membres-direction.index'),
    //         },
    //     ],
    // },

    // {
    //     submenu: false,
    //     text: 'Mission Générale',
    //     iconClass: 'mdi mdi-target',
    //     permissions: ['modifier missions generales'],
    //     link: route('dge.admin.mission-generale.create'),
    // },

    // // {
    // //   submenu: false,
    // //   text: 'Organigramme',
    // //   iconClass: 'mdi mdi-file-tree',
    // //   link: route('dge.admin.organigramme.create'),
    // // },

    // {
    //     type: 'title',
    //     text: 'Documents',
    //     permissions: ['liste type publications', 'creer publications', 'liste publications'],
    // },
    // {
    //     submenu: true,
    //     text: 'Publications',
    //     iconClass: 'mdi mdi-file-document-multiple-outline',
    //     permissions: ['liste type publications', 'creer publications', 'liste publications'],
    //     submenuItems: [
    //         {
    //             text: 'Type de publications',
    //             permissions: ['liste type publications'],
    //             link: route('dge.admin.categories-publications.index'),
    //         },
    //         {
    //             text: 'Nouvelle publications',
    //             permissions: ['creer publications'],
    //             link: route('dge.admin.publications.create'),
    //         },
    //         {
    //             text: 'Liste des publications',
    //             permissions: ['liste publications'],
    //             link: route('dge.admin.publications.index'),
    //         },
    //     ],
    // },
    // {
    //     submenu: true,
    //     text: 'Conférences',
    //     iconClass: 'mdi mdi-view-grid-plus-outline',
    //     permissions: ['liste conferences periodiques', 'liste communications conferences'],
    //     submenuItems: [
    //         {
    //             text: 'Conférences périodiques',
    //             permissions: ['liste conferences periodiques'],
    //             link: route('dge.admin.conferences-periodiques.index'),
    //         },

    //         {
    //             text: 'Communications',
    //             permissions: ['liste communications conferences'],
    //             link: route('dge.admin.communications-conferences.index'),
    //         },

    //     ],
    // },

    // {
    //     submenu: false,
    //     text: 'Séminaires',
    //     iconClass: 'mdi mdi-handshake',
    //     permissions: ['liste seminaires recherches'],
    //     link: route('dge.admin.seminaires-recherches.index'),
    // },

    // {
    //     type: 'title',
    //     text: 'JSEB',
    //     permissions: ['liste jseb', 'creer jseb', 'liste articles jseb'],
    // },
    // {
    //     submenu: true,
    //     text: 'JSEB',
    //     iconClass: 'mdi mdi-view-grid-plus-outline',
    //     permissions: ['liste jseb', 'creer jseb', 'liste articles jseb'],
    //     submenuItems: [
    //         {
    //             text: 'Liste des journées',
    //             permissions: ['liste jseb'],
    //             link: route('dge.admin.jseb.index'),
    //         },
    //         {
    //             text: 'Nouvel journée',
    //             permissions: ['creer jseb'],
    //             link: route('dge.admin.jseb.create'),
    //         },
    //         {
    //             text: 'Articles & actes',
    //             permissions: ['liste articles jseb'],
    //             link: route('dge.admin.articles-jseb.index'),
    //         },
    //     ],
    // },
    // {
    //     type: 'title',
    //     text: 'RAPEF',
    //     permissions: ['modifer informations rapef', 'liste numeros rapef', 'creer numeros rapef'],
    // },
    // {
    //     submenu: false,
    //     text: 'Information RAPEF',
    //     iconClass: 'mdi mdi-book-open-variant',
    //     permissions: ['modifer informations rapef'],
    //     link: route('dge.admin.rapef.show'),
    // },
    // {
    //     submenu: true,
    //     text: 'Numéros RAPEF',
    //     permissions: ['liste numeros rapef', 'creer numeros rapef'],
    //     iconClass: 'mdi mdi-newspaper-variant-outline',
    //     submenuItems: [
    //         {
    //             text: 'Liste des Numéros',
    //             permissions: ['liste numeros rapef'],
    //             link: route('dge.admin.numeros-rapef.index'),
    //         },
    //         {
    //             text: 'Nouveau Numéro',
    //             permissions: ['creer numeros rapef'],
    //             link: route('dge.admin.numeros-rapef.create'),
    //         },
    //     ],
    // },

    // {
    //     type: 'title',
    //     text: 'Sécurité',
    //     permissions: ['liste utilisateurs', 'liste roles', 'liste permissions'],
    // },
    // {
    //     submenu: false,
    //     text: 'Utilisateurs',
    //     iconClass: 'mdi mdi-account-lock-open',
    //     permissions: ['liste utilisateurs'],
    //     link: route('dge.admin.utilisateurs.index'),
    // },
    // {
    //     submenu: false,
    //     text: 'Roles & permissions',
    //     iconClass: 'mdi mdi-account-lock-open',
    //     permissions: ['liste roles'],
    //     link: route('dge.admin.roles.index'),
    // },

    // {
    //     type: 'title',
    //     text: 'Autres',
    //     permissions: ['liste indicateurs cles', 'liste annees', 'liste partenaires', 'modifer parametres'],
    // },
    // {
    //     submenu: false,
    //     text: 'Indicateurs clés',
    //     iconClass: 'mdi mdi-google-analytics',
    //     permissions: ['liste indicateurs cles'],
    //     link: route('dge.admin.indicateurs-cle.index'),
    // },

    // {
    //     submenu: false,
    //     text: 'Vidéothèque',
    //     iconClass: 'mdi mdi-google-analytics',
    //     permissions: ['liste indicateurs cles'],
    //     link: route('dge.admin.videos.index'),
    // },

    // {
    //     submenu: false,
    //     text: 'Années',
    //     iconClass: 'mdi mdi-dns-outline',
    //     permissions: ['liste annees'],
    //     link: route('dge.admin.annee.index'),
    // },
    // {
    //     submenu: false,
    //     text: 'Partenaires',
    //     iconClass: 'mdi mdi-handshake',
    //     permissions: ['liste partenaires'],
    //     link: route('dge.admin.partenaires.index'),
    // },

    // {
    //     submenu: false,
    //     text: 'Parametres',
    //     iconClass: 'mdi mdi-handshake',
    //     permissions: ['modifer parametres'],
    //     link: route('dge.admin.settings'),
    // },

    // {
    //     submenu: false,
    //     text: 'Allez vers le site',
    //     iconClass: 'mdi mdi-link',
    //     external: true,
    //     permissions: ['vers le site'],
    //     link: route('dge.accueil'),
    // },

    // {
    //   submenu: false,
    //   text: 'Documentation',
    //   iconClass: 'mdi mdi-book-cog-outline',
    //   link: ''
    // },

]);


</script>

<template>
    <div class="app-menu navbar-menu">

        <div class="navbar-brand-box">

            <a href="#" class="">
                <span class="">
                    <img src="" alt="" class="py-3 text-white bg-white w-100" />
                </span>
            </a>

            <button type="button" class="p-0 btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>

        </div>

        <simplebar class="h-100">

            <dynamicMenu :menu-items="menuItems" />

        </simplebar>


    </div>

    <div class="vertical-overlay"></div>
</template>

<style></style>
