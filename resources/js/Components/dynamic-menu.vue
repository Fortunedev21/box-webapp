<script setup>
import _ from 'lodash';

defineProps({
    menuItems: Array,
})

</script>

<template>
    <div>
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li v-for="(menuItem, index) in menuItems" :key="index">
                        <template v-if="menuItem.type === 'title'">
                    <li class="menu-title">
                        <span>{{ menuItem.text }}</span>
                    </li>
                    </template>
                    <template v-else>

                        <template>

                            <a v-if="menuItem.submenu" class="nav-link menu-link" :href="`#${_.kebabCase(menuItem.text)}`"
                                data-bs-toggle="collapse" role="button" :aria-expanded="false"
                                :aria-controls="menuItem.text.toLowerCase()">
                                <i :class="menuItem.iconClass"></i>
                                <span>{{ menuItem.text }}</span>
                            </a>
                            <a v-else-if="menuItem.external" target="_blank" :href="menuItem.link"
                                class="nav-link menu-link">
                                <i :class="menuItem.iconClass"></i>
                                <span>{{ menuItem.text }}</span>
                            </a>

                            <Link v-else :href="menuItem.link" class="nav-link menu-link">
                            <i :class="menuItem.iconClass"></i>
                            <span>{{ menuItem.text }}</span>
                            </Link>

                            <div v-if="menuItem.submenu" class="collapse menu-dropdown" :id="_.kebabCase(menuItem.text)">
                                <ul class="nav nav-sm flex-column">
                                    <li v-for="(subItem, subIndex) in menuItem.submenuItems" :key="subIndex">
                                        <Link class="nav-link" :data-key="`t-${_.kebabCase(menuItem.text)}`">{{
                                            subItem.text }}
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                        </template>


                    </template>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>
