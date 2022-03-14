
<template>
       <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <SideBar/>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <TopBar/>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <slot></slot>

                </div>
                <!-- content -->

            

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


</template>

<script>
    import Footer from '@/Components/Admin/Footer'
    import NavBar from '@/Components/Admin/NavBar'
    import SideBar from '@/Components/Admin/SideBar'
    import TopBar from '@/Components/Admin/TopBar'
    export default {
        components: {
          Footer,
          NavBar,
          SideBar,
          TopBar,
        },
    }
    
</script>