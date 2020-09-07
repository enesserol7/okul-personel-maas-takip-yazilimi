<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>Personel İzinleri Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
         <a href="<?php echo base_url("personnel_permissions/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
       <?php } ?>
     </div>
   </div>
 </div>
 <!-- End Widget Header -->
 <!-- Begin Widget Body -->
 <div class="widget-body">
  <div class="table-responsive table-scroll padding-right-10" style=" overflow: hidden; outline: none;" tabindex="5">
    <?php if (empty($items)) { ?>
      <div class="alert alert-info text-center">
       <h5 class="alert-title">Kayıt Bulunamadı</h5>
       <?php if (isAllowedWriteModule()) { ?>
         <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("personnel_permissions/new_form"); ?>">tıklayınız...</a></p>
       <?php } ?>
     </div>
   <?php }else { ?>
    <table id="export-table" class="table table-hover mb-0 content-container">
      <thead>
        <tr>
          <th class="order"><i class="la la-reorder"></i></th>
          <th>İsim & Soyisim</th>
          <th>Kurum</th>
          <th>Branş</th>
          <th>İzne Çıkış Tarihi</th>
          <th>İşe Başlama Tarihi</th>
          <th>Çalışma Durumu</th>
          <th>Rapor Durumu</th>
          <th>İzin Durumu</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody class="sortable" data-url="<?php echo base_url("personnel_permissions/rankSetter"); ?>">
        <?php $itemss = array_unique($items,SORT_REGULAR); ?>
        <?php foreach ($itemss as $item) { ?>
          <tr id="ord-<?php echo $item->id; ?>">
            <td class="order"><i class="la la-reorder"></i></td>
            <td><?php echo $item->personnel_name; ?></td>
            <td><?php echo $item->institution_name; ?></td>
            <td><?php echo get_personnel_branch($item->personnel_id); ?></td>
            <td><?php echo $item->exit_date; ?></td>
            <td><?php echo $item->date_of_return; ?></td>
            <td><?php if($item->operating_status == 1){ ?><?php echo "<b style='color:green'>Çalışıyor..</b>" ?><?php }else if($item->operating_status == 0) { ?><?php echo "<b style='color:red'>Çalışmıyor!!</b>" ?> <?php } ?></td>
            <td><?php if($item->document_status == 1){ ?><?php echo "<b style='color:green'>Rapor İşlendi</b>" ?><?php }else if($item->document_status == 0) { ?><?php echo "<b style='color:red'>Rapor İşlenmedi!</b>" ?> <?php } ?></td>
            <td><?php if($item->permission_status == 1){ ?><?php echo "<b style='color:green'>Ücretli İzin</b>" ?><?php }else if($item->permission_status == 0) { ?><?php echo "<b style='color:orange'>Ücretsiz İzin</b>" ?> <?php } ?></td>
            <td class="td-actions">
              <?php if($this->session->userdata("user")){ ?>
                <?php if (isAllowedDeleteModule()) { ?>
                  <a href="#" data-url="<?php echo base_url("personnel_permissions/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
                <?php } ?>
                <?php if (isAllowedUpdateModule()) { ?>
                  <a href="<?php echo base_url("personnel_permissions/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
                <?php } ?>
              <?php } ?>
              <?php if (isAllowedViewModule()) { ?>
                <a href="<?php echo base_url("personnel_permissions/document_form/$item->id"); ?>"><i class="la la-paste"></i></a>
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