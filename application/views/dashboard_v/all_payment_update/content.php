<div class="widget widget-07 has-shadow">
    <!-- Begin Widget Header -->
    <div class="widget-header bordered d-flex align-items-center">
        <h2>Personel Ödeme İstekleri Listesi</h2>
        <div class="widget-options">
            <div class="btn-group" role="group">
                <?php if ($item) { ?>
                    <a href="<?php echo base_url("dashboard/all_payment_confirmation/$item->institution_id"); ?>" class="btn btn-shadow btn btn-gradient-04" title="Ödenecek Tutarda Değişiklik Olmayacak ise Alttaki Formu Kullanmanıza Gerek Yoktur!! Toplu Onay Vermek için Butona Tıklayınız...">Toplu Onay Ver</a>
                <?php } ?>
                <?php if ($item2) { ?>
                    <a href="<?php echo base_url("dashboard/all_remaining_payment_confirmation/$item2->institution_id"); ?>" class="btn btn-shadow btn btn-gradient-04" title="Ödenecek Tutarda Değişiklik Olmayacak ise Alttaki Formu Kullanmanıza Gerek Yoktur!! Toplu Onay Vermek için Butona Tıklayınız...">Kalan Ödemeleri Toplu Onayla</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Widget Header -->
    <!-- Begin Widget Body -->
    <div class="widget-body">
        <div class="table-responsive table-scroll padding-right-10" style=" overflow: hidden; outline: none;" tabindex="5">
            <?php if (empty($items) && empty($items2)) { ?>
                <div class="alert alert-info text-center">
                    <h5 class="alert-title">Kayıt Bulunamadı</h5>
                    <?php if (isAllowedWriteModule()) { ?>
                        <p>Burada herhangi bir veri bulunmamaktadır.</p>
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
                            <th>Sigorta Durumu</th>
                            <th>Net Maaş</th>
                            <!--<th>Çalıştığı Gün</th>-->
                            <th>Alacağı Ödeme</th>
                            <th>Yapılan Ödeme</th>
                            <th>Kalan Ödeme</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $itemss = array_unique($items,SORT_REGULAR); ?>
                        <?php foreach ($itemss as $item) { ?>
                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><?php echo $item->personnel_name; ?></td>
                                <td><?php echo get_personnel_tc($item->personnel_id); ?></td>
                                <td><?php echo get_personnel_gender($item->personnel_id); ?></td>
                                <td><?php echo $item->institution_name; ?></td>
                                <td><?php echo get_personnel_insuranceStatus($item->personnel_id); ?></td>
                                <td><?php $net_salary = floatval($item->net_salary); echo number_format($net_salary, 2, ',', '.'); ?></td>
                                <!--<td><?php //echo $item->working_day; ?></td>-->
                                <td><?php echo $item->receivable_amount; ?></td>
                                <td><?php echo $item->payment_made; ?></td>
                                <td><?php echo $item->remaining_payment; ?></td>
                                <td class="td-actions">                     
                                    <?php if (isAllowedUpdateModule()) { ?>
                                        <form action="<?php echo base_url("dashboard/personnel_payment_confirmation/$item->id"); ?>" method="post">
                                            <div>
                                                <input type="text" placeholder="Ödeme Yapmak İstediğniz Tutar" name="<?php echo $item->id; ?>" class="form-control">
                                                <button type="submit" class="btn-primary pull-right" title="Ödeme Yap"><i class="la la-try documentList"></i></button>
                                            </div>
                                            <!--<a href="#" data-url="<?php //echo base_url("personnel_payments/payment_confirmation/$item->id"); ?>" class="payment-btn" title="Ödeme Yap"><i class="la la-try documentList"></i></a>-->
                                        </form>
                                        
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php $itemss2 = array_unique($items2,SORT_REGULAR); ?>
                        <?php foreach ($itemss2 as $item) { ?>
                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><?php echo $item->personnel_name; ?></td>
                                <td><?php echo get_personnel_tc($item->personnel_id); ?></td>
                                <td><?php echo get_personnel_gender($item->personnel_id); ?></td>
                                <td><?php echo $item->institution_name; ?></td>
                                <td><?php echo get_personnel_insuranceStatus($item->personnel_id); ?></td>
                                <td><?php $net_salary = floatval($item->net_salary); echo number_format($net_salary, 2, ',', '.'); ?></td>
                                <td><?php echo $item->working_day; ?></td>
                                <td><?php echo $item->receivable_amount; ?></td>
                                <td><?php echo $item->payment_made; ?></td>
                                <td><?php echo $item->remaining_payment; ?></td>
                                <td class="td-actions">                     
                                    <?php if (isAllowedUpdateModule()) { ?>
                                        <form action="<?php echo base_url("dashboard/personnel_payment_confirmation/$item->id"); ?>" method="post">
                                            <div>
                                                <input type="text" placeholder="Ödeme Yapmak İstediğniz Tutar" name="<?php echo $item->id; ?>" class="form-control">
                                                <button type="submit" class="btn-primary pull-right" title="Ödeme Yap"><i class="la la-try documentList"></i></button>
                                            </div>
                                            <!--<a href="#" data-url="<?php //echo base_url("personnel_payments/payment_confirmation/$item->id"); ?>" class="payment-btn" title="Ödeme Yap"><i class="la la-try documentList"></i></a>-->
                                        </form>
                                        
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