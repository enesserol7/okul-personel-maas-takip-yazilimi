<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>İşten Ayrılan Personeller Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
         <a href="<?php echo base_url("personnel_exit/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
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
         <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("personnel_exit/new_form"); ?>">tıklayınız...</a></p>
       <?php } ?>
     </div>
   <?php }else { ?>
    <table id="export-table" class="table table-hover mb-0 content-container">
      <thead>
        <tr>
          <th>İsim & Soyisim</th>
          <th>Kurum</th>
          <th>Branş</th>
          <th>Net Maaş</th>
          <th>Çıkış Tarihi</th>
          <th>Sigorta Durumu</th>
          <th>Çıkış Nedeni</th>
          <th><span style="width:100px;">Durum</span></th>
          <th>Ret Sebebi</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody class="sortable" data-url="<?php echo base_url("personnel_exit/rankSetter"); ?>">
        <?php $itemss = array_unique($items,SORT_REGULAR); ?>
        <?php foreach ($itemss as $item) { ?>
          <tr id="ord-<?php echo $item->id; ?>">
            <td><?php echo $item->personnel_name; ?></td>
            <td><?php echo $item->institution_name; ?></td>
            <td><?php echo get_personnel_branch($item->personnel_id); ?></td>
            <td><?php $net_salary = floatval(get_personnel_netSalary($item->personnel_id)); echo number_format($net_salary, 2, ',', '.'); ?></td>
            <td><?php echo $item->exit_date; ?></td>
            <td><?php echo get_personnel_insuranceStatus($item->personnel_id); ?></td>
            <td><?php echo $item->output_reason; ?></td>
            <td><?php if($item->isActive == 1){ ?><?php echo "<b style='color:green'>Onaylandı</b>" ?><?php }else if($item->isActive == 2) { ?><?php echo "<b style='color:orange'>Onay Bekliyor...</b>" ?> <?php }else{ ?> <?php echo "<b style='color:red'>Onaylanmadı!</b>" ?><?php } ?></td>
            <td><?php echo $item->reason_for_rejection; ?></td>
            <td class="td-actions">
              <?php if($this->session->userdata("user")){ ?>
                <?php if (isAllowedDeleteModule()) { ?>
                  <a href="#" data-url="<?php echo base_url("personnel_exit/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
                <?php } ?>
                <?php if (isAllowedUpdateModule()) { ?>
                  <a href="<?php echo base_url("personnel_exit/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
                <?php } ?>
                <?php if (isAllowedUpdateModule()) { ?>
                  <a href="<?php echo base_url("personnel/black_list_form/$item->id"); ?>" title="Kara Listeye Al"><i class="la la-user-times blackList"></i></a>
                <?php } ?>
              <?php } ?>
              <?php if (isAllowedViewModule()) { ?>
                <a href="<?php echo base_url("personnel_exit/document_form/$item->id"); ?>"><i class="la la-paste"></i></a>
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