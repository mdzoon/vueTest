<template>
    <div class="info-wrapper">
        <Badge :name="badge.name" :image="badge.image" @open="openPanel" aria-label="Open panel"/>
        <transition name="panel-fade">
            <Panel :name="panel.name" :pi_panel="panel.hero_information" :hero_information="panel.hero_information" :hero_basic_details="panel.hero_basic_details" v-if="isVisible" @close="closePanel"/>
        </transition>
    </div>
</template>

<script>
import Badge from './info/Badge.vue'
import Panel from './info/Panel.vue'
export default {
    name: 'Info',
    components: {
        Badge,
        Panel
    },
    data() {
        return {
            isVisible: false
        }
    },
    props: {
        badge: Object,
        panel: Object
    },
    methods: {
        openPanel() {
            this.isVisible = true
        },
        closePanel() {
            this.isVisible = false
        }
    },
}
</script>

<style>
.panel-fade-enter,
.panel-fade-leave-active {
  opacity: 0;
}
.panel-fade-enter-active,
.panel-fade-leave-active {
  transition: opacity .7s ease
}
/* .info-wrapper {
    position: relative;
} */
</style>