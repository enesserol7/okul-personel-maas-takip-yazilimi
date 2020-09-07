<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydını düzenliyorsunuz" ?></h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("personnel_permissions/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <?php if ($this->session->userdata("user")) { ?>
                                  <div class="select">
                                    <select name="institution_id" class="form-control">
                                      <?php foreach($institutions as $institution) { ?>
                                        <option <?php echo ($institution->id == $item->institution_id) ? "selected" : ""; ?> value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                    <?php } ?>
                                </select>
                                <?php if(isset($form_error)){ ?>
                                  <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                              <?php } ?>
                          </div>
                      <?php }elseif ($this->session->userdata("institution_user")) { ?>
                          <div class="select">
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
                  </div>
              <?php } ?>
          </div>
      </div>
      <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Personel *</label>
        <div class="col-lg-5">
            <div class="select">
                <select name="personnel_id" class="form-control">
                    <?php foreach($personnels as $personnel) { ?>
                        <option <?php echo ($personnel->id == $item->personnel_id) ? "selected" : ""; ?> value="<?php echo $personnel->id; ?>">
                            <?php echo $personnel->personnel_name; ?> / <?php echo $personnel->institution_name; ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("personnel_id"); ?></small>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İzne Çıkış Tarihi *</label>
        <div class="col-lg-5">
            <input type="date" class="form-control" placeholder="İzne Çıkış Tarihi: DD/MM/YYY" name="exit_date" value="<?php echo isset($form_error) ? set_value("exit_date") : "$item->exit_date"; ?>">
            <?php if (isset($form_error)) { ?>
                <small class="input-form-error pull-right"><?php echo form_error("exit_date"); ?></small>
            <?php } ?>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İşe Başlama Tarihi *</label>
        <div class="col-lg-5">
            <input type="date" class="form-control" placeholder="İşe Başlama Tarihi: DD/MM/YYY" name="date_of_return" value="<?php echo isset($form_error) ? set_value("date_of_return") : "$item->date_of_return"; ?>">
            <?php if (isset($form_error)) { ?>
                <small class="input-form-error pull-right"><?php echo form_error("date_of_return"); ?></small>
            <?php } ?>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">İzin Durumu</font></font></label>
        <div class="col-lg-5">
            <select name="permission_status" class="form-control">
                <option>Seçiniz</option>
                <option <?php echo ($item->permission_status == "1") ? "selected" : ""; ?> value="1">Ücretli İzin</option>
                <option <?php echo ($item->permission_status == "0") ? "selected" : ""; ?> value="0">Ücretsiz İzin</option>
            </select>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Çalışma Durumu</font></font></label>
        <div class="col-lg-5">
            <select name="operating_status" class="form-control">
                <option>Seçiniz</option>
                <option <?php echo ($item->operating_status == "1") ? "selected" : ""; ?> value="1">Çalışıyor..</option>
                <option <?php echo ($item->operating_status == "0") ? "selected" : ""; ?> value="0">Çalışmıyor!!</option>
            </select>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">İzne Çıkış Nedeni</font></font></label>
        <div class="col-lg-5">
            <textarea class="form-control" placeholder="İzne Çıkış Nedeni ..." required="" name="output_reason" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("output_reason") : "$item->output_reason"; ?></textarea>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-8 form-control-label d-flex justify-content-lg-end">Evrak Güncelleme İşlemi Yapmayacaksanız Alttaki Alanları Boş Bırakınız! </label>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Personel Çıkışına ait Evrak *</label>
        <div class="col-lg-5">
            <input type="file" name="document" class="form-control">
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-gradient-01" type="submit">Kaydet</button>
        <a href="<?php echo base_url("personnel_permissions"); ?>" class="btn btn-shadow">İptal</a>
    </div>
</form>
</div>
</div>
<!-- End Form -->
</div>
</div>
<!-- End Row -->
</div>