<header class="header">
    <nav class="navbar fixed-top">         
        <!-- Begin Search Box-->
        <?php $this->load->view("includes/navbar-search"); ?>
        <!-- End Search Box-->
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">
                    <div class="brand-image brand-big">
                        <img src="<?php echo base_url("assets/"); ?>img/Enser-Logo1.png" alt="logo" class="logo-big">
                    </div>
                    <div class="brand-image brand-small">
                        <img src="<?php echo base_url("assets/"); ?>img/Enser-Logo.png" alt="logo" class="logo-small">
                    </div>
                </a>
                <!-- Toggle Button -->
                <a id="toggle-btn" href="#" class="menu-btn active">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <!-- End Toggle -->
            </div>
            <!-- End Logo -->
            <!-- Begin Navbar Menu -->
            <?php $this->load->view("includes/right-aside"); ?>
            <!-- End Navbar Menu -->
        </div>
        <!-- End Topbar -->
    </nav>
</header>