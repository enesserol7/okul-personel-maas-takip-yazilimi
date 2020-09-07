<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>Kullanıcı Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
         <a href="<?php echo base_url("users/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
       <?php } ?>
     </div>
   </div>
 </div>
 <!-- End Widget Header -->
 <!-- Begin Widget Body -->
 <div class="widget-body">
  <div class="table-responsive table-scroll padding-right-10" style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
    <?php if (empty($items)) { ?>
      <div class="alert alert-info text-center">
       <h5 class="alert-title">Kayıt Bulunamadı</h5>
       <?php if (isAllowedWriteModule()) { ?>
         <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("users/new_form"); ?>">tıklayınız...</a></p>
       <?php } ?>
     </div>
   <?php }else { ?>
    <table class="table table-hover mb-0 content-container">
      <thead>
        <tr>
          <th>Kullanıcı Adı</th>
          <th>İsim & Soyisim</th>
          <th>E-Posta</th>
          <th><span style="width:100px;">Durum</span></th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $item) { ?>
          <tr>
            <td><?php echo $item->user_name; ?></td>
            <td><?php echo $item->full_name; ?></td>
            <td><?php echo $item->email; ?></td>
            <td>
              <div class="media">
                <div class="media-right align-self-center">
                  <label>
                    <input class="toggle-checkbox isActive"
                    type="checkbox"
                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                    data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>">
                    <span>
                      <span></span>
                    </span>
                  </label>
                </div>
              </div>
            </td>
            <td class="td-actions">
              <?php if (isAllowedDeleteModule()) { ?>
                <a href="#" data-url="<?php echo base_url("users/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
              <?php } ?>
              <?php if (isAllowedUpdateModule()) { ?>
                <a href="<?php echo base_url("users/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
              <?php } ?>
              <?php if (isAllowedUpdateModule()) { ?>
                <a href="<?php echo base_url("users/update_password_form/$item->id"); ?>" class="btn btn-sm btn-purple btn-outline"><i class="la la-key"></i> Şifre Değiştir </a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
</div>
<!-- End Widget Body -->
<!-- Begin Widget Footer -->

<!-- End Widget Footer -->
</div>