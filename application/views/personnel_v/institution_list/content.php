<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>Kurum Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
      </div>
    </div>
  </div>
  <!-- End Widget Header -->
  <!-- Begin Widget Body -->
  <div class="widget-body">
    <div class="table-responsive table-scroll padding-right-10" style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
      <?php if (empty($institutions)) { ?>
        <div class="alert alert-info text-center">
         <h5 class="alert-title">Kayıt Bulunamadı</h5>
       </div>
     <?php }else { ?>
      <form class="needs-validation" novalidate action="<?php echo base_url("institution_personnel/institution_personnel_list"); ?>" method="post">
        <div class="form-group row d-flex align-items-center mb-5">
          <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
          <div class="col-lg-5">
            <?php if ($this->session->userdata("user")) { ?>
              <div class="select">
                <select name="institution_id" class="form-control">
                  <option value="all_personnel">Tüm Kurumlar</option>
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
        <div class="text-right">
          <button class="btn btn-gradient-01" type="submit">Görüntüle</button>
        </div>
      </form>
    <?php } ?>
  </div>
</div>
<!-- End Widget Body -->
<!-- Begin Widget Footer -->

<!-- End Widget Footer -->
</div>