<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Personel Ödemesi Ekle</h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("personnel_payments/save"); ?>" method="post" enctype="multipart/form-data">
                        <?php if ($this->session->userdata("user")) { ?>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select name="institution_id" class="form-control">
                                            <?php foreach($institutions as $institution) { ?>
                                                <option value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Personel *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="personnel_id" class="form-control">
                                        <?php foreach($personnels as $personnel) { ?>
                                            <option value="<?php echo $personnel->id; ?>"><?php echo $personnel->personnel_name; ?> / <?php echo $personnel->institution_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                        <small class="pull-right input-form-error"> <?php echo form_error("personnel_id"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Yapılan Ödeme *</label>
                            <div class="col-lg-5">
                                <input class="form-control" type="number" placeholder="Yapılan Ödeme" name="payment_made" value="<?php echo isset($form_error) ? set_value("payment_made") : ""; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("payment_made"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Açıklama</font></font></label>
                            <div class="col-lg-5">
                                <textarea class="form-control" placeholder="Açıklama ..." required="" name="description" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("description") : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                            <a href="<?php echo base_url("personnel_payments"); ?>" class="btn btn-shadow">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>