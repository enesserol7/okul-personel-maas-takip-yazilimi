<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Personel Çıkışı Yap</h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("personnel_exit/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <?php if ($this->session->userdata("user")) { ?>
                                  <div class="select">
                                    <select name="institution_id" class="form-control">
                                      <?php $institutionss = array_unique($institutions,SORT_REGULAR); ?>
                                      <?php foreach($institutions as $institution) { ?>
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
                              <?php foreach($institutions as $institution) { ?>
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
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Çıkış Nedeni</font></font></label>
        <div class="col-lg-5">
            <select name="output_reason" class="form-control">
                <option>Seçiniz</option>
                <option value="istifa">İstifa</option>
                <option value="Sözleşme Feshi">Sözleşme Feshi</option>
                <option value="Devamsızlık">Devamsızlık</option>
                <option value="Diğer Nedenler">Diğer Nedenler</option>
            </select>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Personel Çıkışına ait Evrak *</label>
        <div class="col-lg-5">
            <input type="file" name="document" class="form-control">
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-gradient-01" type="submit">Kaydet</button>
        <a href="<?php echo base_url("personnel_exit"); ?>" class="btn btn-shadow">İptal</a>
    </div>
</form>
</div>
</div>
<!-- End Form -->
</div>
</div>
<!-- End Row -->
</div>