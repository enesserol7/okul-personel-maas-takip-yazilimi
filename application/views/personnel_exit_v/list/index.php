<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head"); ?>
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <?php $this->load->view("includes/preloader"); ?>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <?php $this->load->view("includes/navbar"); ?>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <?php $this->load->view("includes/aside"); ?>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
                    <!-- Begin Page Footer-->
                    <?php $this->load->view("includes/footer"); ?>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    
                    <!-- End Offcanvas Sidebar -->
                </div>
                <!-- End Container -->
            </div>
            <!-- End Content -->
        </div>
        <!-- End Page Content -->
        <!-- Begin Success Modal -->
        <?php $this->load->view("includes/success_modal"); ?>
        <!-- End Success Modal -->
        <!-- Begin Modal -->
        <?php $this->load->view("includes/begin_modal"); ?>
        <!-- End Modal -->
        <!-- Begin Vendor Js -->
        <?php $this->load->view("includes/include_script"); ?>
        <!-- End Page Snippets -->
    </body>
    </html>