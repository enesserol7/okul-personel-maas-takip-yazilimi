<div class="container-fluid h-100 overflow-y">
    <div class="row flex-row h-100">
        <div class="col-12 my-auto">
            <div class="password-form mx-auto">
                <div class="logo-centered">
                    <a href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url("assets/"); ?>img/logo.png" alt="logo">
                    </a>
                </div>
                <h3>Şifrenizi mi unuttunuz ?</h3>
                <form action="<?php echo base_url("reset-password"); ?>" method="post">
                    <div class="group material-input">
                        <input type="email" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>" required>
                        <?php if(isset($form_error)){ ?><small class="input-form-error pull-right"><?php echo form_error("email"); ?></small> <?php } ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-Posta</label>
                    </div>
                    <div class="button text-center">
                        <button type="submit" class="btn btn-lg btn-gradient-01">Şifremi Sıfırla</button>
                    </div>
                </form>
                
                <div class="back">
                    <a href="<?php echo base_url(); ?>">Giriş Yap</a>
                </div>
            </div>        
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>  