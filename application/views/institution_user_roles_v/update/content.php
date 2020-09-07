<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?></h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("institution_user_roles/update/$item->id"); ?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Başlık *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <?php if ($this->session->userdata("user")) { ?>
                                        <select name="institution_id" class="form-control">
                                            <?php foreach($institutions as $institution) { ?>
                                                <option <?php echo ($institution->id == $item->institution_id) ? "selected" : ""; ?> value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                                        <?php } ?>
                                    <?php }elseif ($this->session->userdata("institution_user")) { ?>
                                        <select name="institution_id" class="form-control">
                                            <?php foreach($institutions as $institution) { ?>
                                                <?php if (isAllowedViewInstitution($institution->id)) { ?>
                                                    <option <?php echo ($institution->id == $item->institution_id) ? "selected" : ""; ?> value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Güncelle</button>
                            <a href="<?php echo base_url("institution_user_roles"); ?>" class="btn btn-shadow">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>