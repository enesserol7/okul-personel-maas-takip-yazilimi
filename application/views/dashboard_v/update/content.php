<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydını Görüntülüyorsunuz..." ?></h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("dashboard/personnel_confirmation/$item->id"); ?>" method="post">
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
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">TC No *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="TC No" name="tc" disabled value="<?php echo isset($form_error) ? set_value("tc") : "$item->tc"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("tc"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İban *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="İban" name="iban" disabled value="<?php echo isset($form_error) ? set_value("iban") : "$item->iban"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("iban"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Doğum Tarihi *</label>
                            <div class="col-lg-5">
                                <input type="date" class="form-control" placeholder="Doğum Tarihi: DD/MM/YYY" name="date_of_birth" disabled value="<?php echo isset($form_error) ? set_value("date_of_birth") : "$item->date_of_birth"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("date_of_birth"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Branş *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="Branş" name="branch" disabled value="<?php echo isset($form_error) ? set_value("branch") : "$item->branch"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("branch"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Giriş Tarihi *</label>
                            <div class="col-lg-5">
                                <input type="date" class="form-control" placeholder="Giriş Tarihi: DD/MM/YYY" name="entry_date" disabled value="<?php echo isset($form_error) ? set_value("entry_date") : "$item->entry_date"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("entry_date"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sigorta Durumu *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="insurance_status" disabled class="form-control">
                                            <option <?php echo ($item->insurance_status == 1) ? "selected" : ""; ?> value="1">Sigortalı</option>
                                            <option <?php echo ($item->insurance_status == 0) ? "selected" : ""; ?> value="0">Sigortasız</option>
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
                                <input class="form-control" placeholder="Net Maaş" name="net_salary" disabled value="<?php echo isset($form_error) ? set_value("net_salary") : "$item->net_salary"; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("net_salary"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Resmi </label>
                            <div class="col-lg-3">
                                <div class="col-md-3 image_upload_container">
                                    <img src="<?php echo get_picture("personnel_v", $item->image, "271x200"); ?>" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Kimlik Fotokopisi </label>
                            <?php if (get_file_ext($item->copy_of_identity_card) == "pdf" || get_file_ext($item->copy_of_identity_card) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->copy_of_identity_card"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->copy_of_identity_card) == "png" || get_file_ext($item->copy_of_identity_card) == "jpg" || get_file_ext($item->copy_of_identity_card) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->copy_of_identity_card"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->copy_of_identity_card == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->copy_of_identity_card"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sabıka Kaydı </label>
                            <?php if (get_file_ext($item->criminal_record) == "pdf" || get_file_ext($item->criminal_record) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->criminal_record"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->criminal_record) == "png" || get_file_ext($item->criminal_record) == "jpg" || get_file_ext($item->criminal_record) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->criminal_record"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->criminal_record == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1"><button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->criminal_record"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">İkametgah </label>
                            <?php if (get_file_ext($item->place_of_residence) == "pdf" || get_file_ext($item->place_of_residence) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->place_of_residence"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->place_of_residence) == "png" || get_file_ext($item->place_of_residence) == "jpg" || get_file_ext($item->place_of_residence) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->place_of_residence"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->place_of_residence == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->place_of_residence"); ?>">İndirmek için Tıklayınız</a></button>
                                    </div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sağlık Raporu </label>
                            <?php if (get_file_ext($item->health_report) == "pdf" || get_file_ext($item->health_report) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->health_report"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->health_report) == "png" || get_file_ext($item->health_report) == "jpg" || get_file_ext($item->health_report) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->health_report"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->health_report == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                   <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->health_report"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sözleşme </label>
                            <?php if (get_file_ext($item->contract) == "pdf" || get_file_ext($item->contract) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->contract"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->contract) == "png" || get_file_ext($item->contract) == "jpg" || get_file_ext($item->contract) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->contract"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->contract == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                    <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->contract"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Diploma </label>
                            <?php if (get_file_ext($item->diploma) == "pdf" || get_file_ext($item->diploma) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/personnel_v/files/$item->diploma"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->diploma) == "png" || get_file_ext($item->diploma) == "jpg" || get_file_ext($item->diploma) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/personnel_v/files/$item->diploma"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->diploma == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/personnel_v/files/$item->diploma"); ?>">İndirmek için Tıklayınız</a></button></div></center>
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
                            <a href="<?php echo base_url("dashboard/personnel_claim_list"); ?>" class="btn btn-shadow">Geri Dön</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>