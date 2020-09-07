<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Yeni Kullanıcı Rolü Ekle</h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("user_roles/save"); ?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Başlık *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="Başlık" name="title">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                            <a href="<?php echo base_url("user_roles"); ?>" class="btn btn-shadow">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>