<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Yeni Personel Ekle</h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("personnel/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <?php if ($this->session->userdata("user")) { ?>
                                  <div class="select">
                                    <select name="institution_id" class="form-control">
                                        <?php $institutionss = array_unique($institutions,SORT_REGULAR); ?>
                                        <?php foreach($institutionss as $institution) { ?>
                                            <option value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                      <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                                  <?php } ?>
                              </div>
                          <?php }elseif ($this->session->userdata("institution_user")) { ?>
                              <div class="select">
                                <select name="institution_id" class="form-control">
                                    <?php $institutionss = array_unique($institutions,SORT_REGULAR); ?>
                                    <?php foreach($institutionss as $institution) { ?>
                                        <?php if (isAllowedViewInstitution($institution->id)) { ?>
                                          <option value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                      <?php } ?>
                                  <?php } ?>
                              </select>
                              <?php if(isset($form_error)){ ?>
                                  <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                              <?php } ?>
                          </div>
                      <?php } ?>
                  </div>
              </div>
              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İsim *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="İsim" name="personnel_name" value="<?php echo isset($form_error) ? set_value("personnel_name") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_name"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Soyisim *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="Soyisim" name="personnel_surname" value="<?php echo isset($form_error) ? set_value("personnel_surname") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_surname"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">TC No *</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" placeholder="TC No" name="tc" value="<?php echo isset($form_error) ? set_value("tc") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("tc"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sicil No * </label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" placeholder="Sicil No" name="registration_number" value="<?php echo isset($form_error) ? set_value("registration_number") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("registration_number"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefon *</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" placeholder="Telefon" name="personnel_phone" value="<?php echo isset($form_error) ? set_value("personnel_phone") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_phone"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İban *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="İban" name="iban" value="<?php echo isset($form_error) ? set_value("iban") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("iban"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Doğum Tarihi *</label>
                <div class="col-lg-5">
                    <input type="date" class="form-control" placeholder="Doğum Tarihi: DD/MM/YYYY" name="date_of_birth" value="<?php echo isset($form_error) ? set_value("date_of_birth") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("date_of_birth"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Cinsiyet *</label>
                <div class="col-lg-5">
                    <div class="select">
                        <select name="gender" class="form-control">
                            <option value="erkek">Erkek</option>
                            <option value="kadın">Kadın</option>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("gender"); ?></small>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Çalışan *</label>
                <div class="col-lg-5">
                    <div class="select">
                        <select name="branch" class="form-control">
                            <option value="İdari Personel">İdari Personel</option>
                            <option value="Personel">Personel</option>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("branch"); ?></small>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Branş *</label>
                <div class="col-lg-5">
                    <div class="select">
                        <select name="sub_branch" class="form-control">
                            <?php foreach ($branch as $branch) { ?>
                                <option value="<?php echo $branch->id; ?>"><?php echo $branch->title; ?></option>
                            <?php } ?>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("sub_branch"); ?></small>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sigorta Durumu *</label>
                <div class="col-lg-5">
                    <div class="select">
                        <select name="insurance_status" class="form-control">
                            <option value="1">Sigortalı</option>
                            <option value="0">Sigortasız</option>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("insurance_status"); ?></small>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Net Maaş * </label>
                <div class="col-lg-5">
                    <input class="form-control" type="number" placeholder="Net Maaş" name="net_salary" value="<?php echo isset($form_error) ? set_value("net_salary") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("net_salary"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İşe Giriş Tarihi *</label>
                <div class="col-lg-5">
                    <input type="date" class="form-control" placeholder="İşe Giriş Tarihi: DD/MM/YYY" name="entry_date" value="<?php echo isset($form_error) ? set_value("entry_date") : ""; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("entry_date"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Personel Resmi Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="img_url" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kimlik Fotokopisi Seçiniz * <span style="color:red;" >Bu Alan Zorunludur!</span></label>
                <div class="col-lg-5">
                    <input type="file" name="copy_of_identity_card" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sabıka Kaydı Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="criminal_record" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İkametgah Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="place_of_residence" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sağlık Raporu Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="health_report" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sözleşme Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="contract" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Diploma Seçiniz *</label>
                <div class="col-lg-5">
                    <input type="file" name="diploma" class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                <a href="<?php echo base_url("personnel"); ?>" class="btn btn-shadow">İptal</a>
            </div>
        </form>
    </div>
</div>
<!-- End Form -->
</div>
</div>
<!-- End Row -->
</div>