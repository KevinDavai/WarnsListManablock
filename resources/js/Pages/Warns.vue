<template>
    <Head title="Avertissement" />
    <breeze-authenticated-layout>
        <Preloader> </Preloader>
        <div class="row w-100">
            <div class="col-12">
                <div class="page-title-box w-100">
                    <h4 class="page-title text-white">Avertissements</h4>
                </div>
            </div>
        </div>
        <a
            v-if="$page.props.auth.user.role_id != 1"
            as="button"
            class="add-btn"
            data-bs-toggle="modal"
            data-bs-target="#addWarnModal"
            ><i class="fas fa-plus"></i
        ></a>

        <div class="container mt-2">
            <!-- Search form -->
            <div class="row justify-content-around px-4">
                <div
                    class="d-flex pt-4 pt-md-0 d-md-block justify-content-center col-sm-8 col-md-4 col-lg-3 md-form active-pink active-pink-2 mb-3 mt-0"
                >
                    <div class="form-label-group mb-3">
                        <Datepicker
                            id="floatingLabelDate"
                            :position="null"
                            :range="true"
                            lang="fr"
                            :circle="true"
                            v-model="this.date"
                            :date-format="dateFormat"
                            showClearButton="true"
                            @reset="test"
                        />
                    </div>
                </div>
                <div
                    class="d-sm-flex pt-4 pt-sm-0 d-md-block justify-content-center col-sm-8 col-md-4 col-lg-3 md-form active-pink active-pink-2 mb-3 mt-0"
                >
                    <div class="form-label-group mb-3">
                        <input
                            class="form-control form-control-lg"
                            type="text"
                            placeholder="Search"
                            id="floatingInput"
                            aria-label="Search"
                            v-model="this.keyword"
                        />
                        <label class="floatingLabelSearch" for="floatingInput"
                            >Recherche</label
                        >
                    </div>
                </div>
            </div>

            <div class="table-responsive-xl">
                <table
                    class="table table-dark bg-19191d table-borderless card-1 p-4 table-striped table-hover"
                >
                    <thead>
                        <tr>
                            <th class="col-1 p-top-table">
                                <span class="ms-2">Pseudo joueur</span>
                            </th>
                            <th class="col-1 p-top-table">
                                <span class="ms-2">Averti par</span>
                            </th>
                            <th class="col-2 p-top-table">
                                <span class="ms-2">Raison</span>
                            </th>
                            <th class="col-4 p-top-table">
                                <span class="ms-2">Description</span>
                            </th>
                            <th class="col-1 p-top-table">
                                <span class="ms-2">Date</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(warn, index) in computedWarns.slice(
                                index,
                                index + 7
                            )"
                        >
                            <td class="vertical-align-td">
                                <div class="d-flex align-items-center">
                                    <div class="profile-head me-2">
                                        <img
                                            class="avatar-head"
                                            :src="
                                                'https://mc-heads.net/avatar/' +
                                                warn.pseudo +
                                                '/32'
                                            "
                                        />
                                    </div>
                                    {{ warn.pseudo }}
                                </div>
                            </td>
                            <td class="vertical-align-td">
                                <div class="d-flex align-items-center">
                                    <div class="profile-head me-2">
                                        <img
                                            class="avatar-head"
                                            :src="
                                                'https://mc-heads.net/avatar/' +
                                                warn.moderator +
                                                '/32'
                                            "
                                        />
                                    </div>
                                    {{ warn.moderator }}
                                </div>
                            </td>
                            <td class="vertical-align-td">
                                <div class="p-2 d-flex flex-column">
                                    <span>{{ warn.warn_name }}</span>
                                </div>
                            </td>
                            <td class="vertical-align-td">
                                <div class="p-2 d-flex flex-column">
                                    <span>{{ warn.description }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">{{
                                        warn.created_at
                                    }}</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav class="px-0 px-sm-4 pb-0 pb-sm-4 pb-3">
                <ul
                    class="p-0"
                    style="
                        display: flex;
                        margin: 0px;
                        justify-content: space-between;
                    "
                >
                    <li>
                        <button
                            @click="setPreviousPage"
                            v-if="this.index != 0"
                            type="button"
                            class="left-page-btn"
                        >
                            <i class="fas fa-angle-left"></i>
                        </button>
                    </li>
                    <li>
                        <button
                            @click="setNextPage"
                            v-if="this.index < this.computedWarns.length - 5"
                            type="button"
                            class="right-page-btn"
                        >
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="addWarnModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content text-center no-border">
                    <warnForm />
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Preloader from "@/Components/Preloader.vue";
import Pagination from "v-pagination-3";
import MyPagination from "@/Components/Pagination.vue";
import VueDatepickerUi from "vue-datepicker-ui";
import "vue-datepicker-ui/lib/vuedatepickerui.css";
import warnForm from "@/Components/warnForm.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Preloader,
        Pagination,
        MyPagination,
        Datepicker: VueDatepickerUi,
        warnForm,
    },
    props: {
        status: String,
    },
    data() {
        return {
            date: [],
            startDate: "",
            endDate: "",
            btn_add: true,
            keyword: "",
            warnListe: [],
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            page: 1,
            index: 0,
            dateFormat: {
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
            },
        };
    },
    watch: {
        date: function (val) {
            if (val[1] != undefined) {
                this.startDate = this.date[0];
                this.endDate = this.date[1];
            }
        },
    },
    computed: {
        computedWarns: function () {
            this.index = 0;

            return this.warnListe.filter((item) => {
                let dateSliced = item.created_at.slice(6);
                console.log(dateSliced);
                var dateMomentObject = moment(dateSliced, "DD/MM/YYYY"); // 1st argument - string, 2nd argument - format
                var dateObject = dateMomentObject.toDate(); // convert moment.js object to Date object
                var keywordLowwer = this.keyword.toLowerCase();
                var pseudo = item.pseudo.toLowerCase();
                return (
                    (this.startDate === "" ||
                        (dateObject >= this.startDate &&
                            dateObject <= this.endDate)) &&
                    (this.keyword.length === 0 ||
                        pseudo.includes(keywordLowwer))
                );
            });
        },
    },
    created() {
        this.fetchWarnList();
    },
    methods: {
        fetchWarnList() {
            axios.get(route("getListWarn")).then((res) => {
                this.warnListe = res.data;
            });
        },
        test() {
            this.date = [];
            this.startDate = "";
            this.endDate = "";
        },

        list(page) {
            axios
                .get(`/warnList?page=${page}`)
                .then(({ data }) => {
                    this.warnListe = data;
                })
                .catch(({ response }) => {
                    console.error(response);
                });
        },
        setPreviousPage() {
            if (this.index != 0) {
                this.index = this.index - 7;
            }
        },
        setNextPage() {
            if (this.index < this.computedWarns.length - 7) {
                this.index = this.index + 7;
            }
        },
    },
    mounted() {
        document
            .querySelector(".input-field")
            .insertAdjacentHTML(
                "beforeend",
                `<label class="floatingLabelDate" for="floatingLabelDate">Debut - Fin</label>`
            );

        Pusher.logToConsole = true;
        var vm = this;
        var pusher = new Pusher("f6e2c5eefed30ef289a8", {
            cluster: "eu",
        });
        var channel = pusher.subscribe("warns");
        channel.bind("addWarn", function (data) {
            console.log(data);
            vm.list(vm.page);
        });
    },
};
</script>
