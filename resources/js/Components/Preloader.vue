<template>
    <div class="vld-parent">
        <loading
            v-model:active="isLoading"
            :can-cancel="false"
            :is-full-page="fullPage"
        />
    </div>
</template>

<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
    data() {
        return {
            isLoading: false,
            fullPage: true,
        };
    },
    components: {
        Loading,
    },
    mounted() {
        this.isLoading = true;
        var vm = this;
        var someElement = document.getElementsByClassName("vld-icon");
        someElement.className += " animation__shake"; //add "newclass" to element (space in front is important)
        function first(callback) {
            setTimeout(function () {
                const note = document.querySelector(".vld-background");
                note.style.cssText += "height:0px;";
                const logo = document.querySelector(".vld-icon");
                logo.style.cssText += "display:none;";
                callback();
            }, 1000);
        }

        function second() {
            setTimeout(function () {
                vm.isLoading = false;
            }, 300);
        }

        first(function () {
            second();
        });
    },
};
</script>
