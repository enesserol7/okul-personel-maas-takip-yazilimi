<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>Onay Bekleyen Personeller Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
         <a href="<?php echo base_url("personnel/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
       <?php } ?>
       <a href="<?php echo base_url("personnel"); ?>" class="btn btn-shadow btn btn-gradient-04">Onaylanan Personelleri Gör</a>
       <a href="<?php echo base_url("personnel/denied_list"); ?>" class="btn btn-shadow btn btn-gradient-01">Reddedilen Personelleri Gör</a>
     </div>
   </div>
 </div>
 <!-- End Widget Header -->
 <!-- Begin Widget Body -->
 <div class="widget-body">
  <div class="table-responsive table-scroll padding-right-10" style="overflow: hidden; outline: none;" tabindex="5">
    <?php if (empty($items)) { ?>
      <div class="alert alert-info text-center">
       <h5 class="alert-title">Kayıt Bulunamadı</h5>
       <?php if (isAllowedWriteModule()) { ?>
         <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("personnel/new_form"); ?>">tıklayınız...</a></p>
       <?php } ?>
     </div>
   <?php }else { ?>
    <table id="export-table" class="table table-hover mb-0 content-container">
      <thead>
        <tr>
          <th>İsim & Soyisim</th>
          <th>TC</th>
          <th>Cinsiyet</th>
          <th>Kurum</th>
          <th>Telefon</th>
          <th>Çalışan</th>
          <th>Branş</th>
          <th>Net Maaş</th>
          <th>Sigorta Durumu</th>
          <th><span>Durum</span></th>
          <th><span>Aktif/Pasif</span></th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody class="sortable" data-url="<?php echo base_url("personnel/rankSetter"); ?>">
        <?php $itemss = array_unique($items,SORT_REGULAR); ?>
        <?php foreach ($itemss as $item) { ?>
          <tr id="ord-<?php echo $item->id; ?>">
            <td><?php echo $item->personnel_name; ?></td>
            <td><?php echo $item->tc; ?></td>
            <td><?php echo $item->gender; ?></td>
            <td><?php echo $item->institution_name; ?></td>
            <td><?php echo $item->personnel_phone; ?></td>
            <td><?php echo $item->branch; ?></td>
            <td><?php echo $item->sub_branch; ?></td>
            <td><?php $net_salary = floatval($item->net_salary); echo number_format($net_salary, 2, ',', '.'); ?></td>
            <td><?php echo ($item->insurance_status == 1) ? "Sigortalı" : "Sigortasız"; ?></td>
            <td><?php if($item->isActive == 1){ ?><?php echo "<b style='color:green'>Onaylandı</b>" ?><?php }else if($item->isActive == 2) { ?><?php echo "<b style='color:orange'>Onay Bekliyor...</b>" ?> <?php }else{ ?> <?php echo "<b style='color:red'>Onaylanmadı!</b>" ?><?php } ?></td>
            <td>
              <div class="media">
                <div class="media-right align-self-center">
                  <label>
                    <input class="toggle-checkbox isActive"
                    type="checkbox"
                    data-url="<?php echo base_url("personnel/isActivePersonnelSetter/$item->id"); ?>"
                    <?php echo ($item->isActivePersonnel) ? "checked" : ""; ?> 
                    >
                    <span>
                      <span></span>
                    </span>
                  </label>
                </div>
              </div>
            </td>
            <td class="td-actions">
              <?php if($this->session->userdata("user")){ ?>
                <?php if (isAllowedDeleteModule()) { ?>
                  <a href="#" data-url="<?php echo base_url("personnel/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
                <?php } ?>
                <?php if (isAllowedUpdateModule()) { ?>
                  <a href="<?php echo base_url("personnel/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
                <?php } ?>
              <?php } ?>
              <?php if (isAllowedViewModule()) { ?>
                <a href="<?php echo base_url("personnel/document_form/$item->id"); ?>"><i class="la la-paste"></i></a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
        <tr>
          <td></td>
          <td><?php $full = 0; $null = 0; ?>
          <?php foreach ($itemss as $item) { ?>
            <?php if ($item->tc != "") { ?>
              <?php $full += 1; ?>
            <?php }else{ ?>
              <?php $null += 1; ?>
            <?php } ?>
          <?php } ?>
          <span><b>TC Var: </b> <b><?php echo $full; ?> </b></span> / <span><b>TC Yok : </b> <b><?php echo $null; ?> </b></span></td>
          <td><?php $male = 0; $famale = 0; ?>
          <?php foreach ($itemss as $item) { ?>
            <?php if ($item->gender == "erkek") { ?>
              <?php $male += 1; ?>
            <?php }else if($item->gender == "kadın"){ ?>
              <?php $famale += 1; ?>
            <?php } ?>
          <?php } ?>
          <span><b>Erkek: </b> <b><?php echo $male; ?> </b></span> / <span><b>Kadın : </b> <b><?php echo $famale; ?> </b></span></td>
          <td></td>
          <td><?php $phone = 0; $phoneNull = 0; ?>
          <?php foreach ($itemss as $item) { ?>
            <?php if ($item->personnel_phone != "") { ?>
              <?php $phone += 1; ?>
            <?php }else{ ?>
              <?php $phoneNull += 1; ?>
            <?php } ?>
          <?php } ?>
          <span><b>Telefon Var: </b> <b><?php echo $phone; ?> </b></span> / <span><b>Telefon Yok : </b> <b><?php echo $phoneNull; ?> </b></span></td>
          <td></td>
          <td></td>
          <td><?php $total =  0;?>
          <?php foreach ($itemss as $item) { ?>
            <?php $total += floatval($item->net_salary); ?>
          <?php } ?>
          <span><b>Toplam Maaş: </b> <b><?php echo number_format($total, 2, ',', '.'); ?> </b></span></td>
          <td><?php $insured = 0; $uninsured = 0; ?>
          <?php foreach ($itemss as $item) { ?>
            <?php if ($item->insurance_status == "1") { ?>
              <?php $insured += 1; ?>
            <?php }else if($item->insurance_status == "0"){ ?>
              <?php $uninsured += 1; ?>
            <?php } ?>
          <?php } ?>
          <span><b>Sigortalı: </b> <b><?php echo $insured; ?> </b></span> / <span><b>Sigortasız : </b> <b><?php echo $uninsured; ?> </b></span></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
</div>
</div>
<!-- End Widget Body -->
<!-- Begin Widget Footer -->

<!-- End Widget Footer -->
</div>