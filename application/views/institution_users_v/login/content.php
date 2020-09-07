<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="<?php echo base_url("assets/"); ?>img/logo.png" alt="logo" class="loader-logo">
        <div class="spinner"></div>   
    </div>
</div>
<!-- End Preloader -->
<!-- Begin Container -->
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
            <div class="elisyam-bg background-01">
                <div class="elisyam-overlay overlay-01"></div>
                <div class="authentication-col-content mx-auto">
                    <h1 class="gradient-text-01">
                        Personel Takip Sistemi
                    </h1>
                    <span class="description">

                    </span>
                </div>
            </div>
        </div>
        <!-- End Left Content -->
        <!-- Begin Right Content -->
        <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
            <!-- Begin Form -->
            <div class="authentication-form mx-auto">
                <div class="logo-centered">
                    <a href="db-default.html">
                        <img src="<?php echo base_url("assets/"); ?>img/logo.png" alt="logo">
                    </a>
                </div>
                <h3>Giriş Yap</h3>
                <form action="<?php echo base_url("login"); ?>" method="post">
                    <div class="group material-input">
                        <input type="text" required name="user_email">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-Posta</label>
                    </div>
                    <div class="group material-input">
                        <input type="password" required name="user_password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Şifre</label>
                    </div>
                    <div class="">
                        <label>Kurum</label>
                        <select name="institution_id" class="form-control">
                            <option>Seçiniz</option>
                            <option value="system_admin">Sistem Yöneticisi</option>
                            <?php foreach($institutions as $institution) { ?>
                                <option value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="sign-btn text-center">
                        <button type="submit" class="btn btn-lg btn-gradient-01">Giriş Yap</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col text-left">
                    </div>
                    <div class="col text-right">
                        <a href="pages-forgot-password.html">Şifremi Unuttum ?</a>
                    </div>
                </div>
            </div>
            <!-- End Form -->                        
        </div>
        <!-- End Right Content -->
    </div>
    <!-- End Row -->
</div>