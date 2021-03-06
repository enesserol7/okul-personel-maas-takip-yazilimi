<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydını Görüntülüyorsunuz.." ?></h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("dashboard/personnel_exit_confirmation/$item->id"); ?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="İsim & Soyisim" name="institution_name" disabled value="<?php echo isset($form_error) ? set_value("institution_name") : "$item->institution_name"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("institution_name"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İsim & Soyisim *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="İsim & Soyisim" name="personnel_name" disabled value="<?php echo isset($form_error) ? set_value("personnel_name") : "$item->personnel_name"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("personnel_name"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Branş *</label>
                            <div class="col-lg-5">
                                <?php $branch = get_personnel_branch($item->personnel_id); ?>
                                <input class="form-control" placeholder="Branş" name="branch" disabled value="<?php echo isset($form_error) ? set_value("branch") : "$branch"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("branch"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sigorta Durumu *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="insurance_status" disabled class="form-control">
                                            <?php $insurance_status = get_personnel_insuranceStatus($item->personnel_id); ?>
                                            <option <?php echo ($insurance_status == 1) ? "selected" : ""; ?> value="1">Sigortalı</option>
                                            <option <?php echo ($insurance_status == 0) ? "selected" : ""; ?> value="0">Sigortasız</option>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                        <small class="pull-right input-form-error"> <?php echo form_error("insurance_status"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Net Maaş *</label>
                            <div class="col-lg-5">
                                <?php $net_salary = get_personnel_netSalary($item->personnel_id); ?>
                                <input class="form-control" placeholder="Net Maaş" name="net_salary" disabled value="<?php echo isset($form_error) ? set_value("net_salary") : "$net_salary"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("net_salary"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Çıkış Nedeni</font></font></label>
                            <div class="col-lg-5">
                                <select name="output_reason" disabled class="form-control">
                                    <option>Seçiniz</option>
                                    <option <?php echo ($item->output_reason == "istifa") ? "selected" : ""; ?> value="istifa">İstifa</option>
                                    <option <?php echo ($item->output_reason == "Sözleşme Feshi") ? "selected" : ""; ?> value="Sözleşme Feshi">Sözleşme Feshi</option>
                                    <option <?php echo ($item->output_reason == "Devamsızlık") ? "selected" : ""; ?> value="Devamsızlık">Devamsızlık</option>
                                    <option <?php echo ($item->output_reason == "Diğer Nedenler") ? "selected" : ""; ?> value="Diğer Nedenler">Diğer Nedenler</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Çıkış Tarihi *</label>
                            <div class="col-lg-5">
                                <input type="date" class="form-control" placeholder="Çıkış Tarihi: DD/MM/YYY" name="exit_date" disabled value="<?php echo isset($form_error) ? set_value("exit_date") : "$item->exit_date"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("exit_date"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $image = get_personnel_image($item->personnel_id);
                        $image = get_picture("personnel_v", $image, "271x200");
                        ?>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Resmi </label>
                            <div class="col-lg-3">
                                <div class="col-md-3 image_upload_container">
                                    <img src="<?php echo $image; ?>" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Çıkışına ait Evrak </label>
                            <?php if (get_file_ext($item->document) == "pdf" || get_file_ext($item->document) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_exit_v/files/$item->document"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->document) == "png" || get_file_ext($item->document) == "jpg" || get_file_ext($item->document) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo get_picture("uploads/personnel_exit_v/files", $item->document, "271x200"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->document == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_exit_v/files/$item->document"); ?>">İndirmek için Tıklayınız</a></button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reddedilme Nedeni</font></font><span style="color: red;">Onay durumunda boş bırakınız!!! *</span></label>
                            <div class="col-lg-5">
                                <textarea class="form-control" placeholder="Reddedilme Nedeni ..." required="" name="reason_for_rejection" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("reason_for_rejection") : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Onay Durumu *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="confirmation" class="form-control">
                                        <option value="1" style="color: green;">Onayla</option>
                                        <option value="0" style="color: red;">Reddet</option>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                        <small class="pull-right input-form-error"> <?php echo form_error("confirmation"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Gönder</button>
                            <a href="<?php echo base_url("dashboard/personnel_exit_claim_list"); ?>" class="btn btn-shadow">Geri Dön</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>