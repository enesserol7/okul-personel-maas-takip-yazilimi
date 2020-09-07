<div class="widget widget-07 has-shadow">
	<!-- Begin Widget Header -->
	<div class="widget-header bordered d-flex align-items-center">
		<h2>Personel Avansları Listesi</h2>
		<div class="widget-options">
			<div class="btn-group" role="group">
				<?php if (isAllowedWriteModule()) { ?>
					<a href="<?php echo base_url("advance_payment/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<br>
	<?php if ($this->session->userdata("user")) { ?>
		<div class="col-lg-9 pull-right">
			<form class="needs-validation " novalidate action="<?php echo base_url("advance_payment"); ?>" method="post">
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Tarih *</label>
					<div class="col-lg-3">
						<input type="month" class="form-control" name="date" value="<?php echo isset($form_error) ? set_value("date") : ""; ?>">
						<?php if (isset($form_error)) { ?>
							<small class="input-form-error pull-right"><?php echo form_error("date"); ?></small>
						<?php } ?>
					</div>
					<div class="text-right">
						<button class="btn btn-gradient-01" type="submit">Gönder</button>
					</div>
				</div>
			</form>
		</div>
	<?php } ?>
	<!-- End Widget Header -->
	<!-- Begin Widget Body -->
	<div class="widget-body">
		<div class="table-responsive table-scroll padding-right-10" style=" overflow: hidden; outline: none;" tabindex="5">
			<?php if (empty($items)) { ?>
				<div class="alert alert-info text-center">
					<h5 class="alert-title">Kayıt Bulunamadı</h5>
					<?php if (isAllowedWriteModule()) { ?>
						<p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("advance_payment/new_form"); ?>">tıklayınız...</a></p>
					<?php } ?>
				</div>
			<?php }else { ?>
				<table id="export-table" class="table table-hover mb-0 content-container">
					<thead>
						<tr>
							<th>İsim & Soyisim</th>
							<th>Kurum</th>
							<th>Branş</th>
							<th>Ödeme Tarihi</th>
							<th>Çalışma Durumu</th>
							<th>Yapılan Ödeme</th>
							<th>Kalan Ödeme</th>
							<th>Ödeme Onayı</th>
							<th>Ret Sebebi</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("advance_payment/rankSetter"); ?>">
						<?php $itemss = array_unique($items,SORT_REGULAR); ?>
						<?php foreach ($itemss as $item) { ?>
							<tr id="ord-<?php echo $item->id; ?>">
								<td><?php echo $item->personnel_name; ?></td>
								<td><?php echo $item->institution_name; ?></td>
								<td><?php echo get_personnel_branch($item->personnel_id); ?></td>
								<td><?php echo $item->date; ?></td>
								<td><?php echo get_personnel_workStatus($item->personnel_id); ?></td>
								<td><?php $payment_made = floatval($item->payment_made); echo number_format($payment_made, 2, ',', '.'); ?></td>
								<td><?php $remaining_payment = floatval($item->remaining_payment); echo number_format($remaining_payment, 2, ',', '.'); ?></td>
								<td><?php if($item->isActive == 1){ ?><?php echo "<b style='color:green'>Ödeme Onaylandı..</b>" ?><?php }else if($item->isActive == 2) { ?><?php echo "<b style='color:orange'>Ödeme Onay Bekliyor!!</b>" ?> <?php }else{ ?> <?php echo "<b style='color:red'>Ödeme Onaylanmadı!</b>" ?><?php } ?></td>
								<td><?php echo $item->reason_for_rejection; ?></td>
								<td class="td-actions">
									<?php if($this->session->userdata("user")){ ?>
										<?php if (isAllowedUpdateModule()) { ?>
											<a href="<?php echo base_url("advance_payment/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
										<?php } ?>
										<?php if (isAllowedDeleteModule()) { ?>
											<a href="#" data-url="<?php echo base_url("advance_payment/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
										<?php } ?>
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