<div class="widget widget-07 has-shadow">
	<!-- Begin Widget Header -->
	<div class="widget-header bordered d-flex align-items-center">
		<h2>Personeller Ödemeleri Kontrol Listesi</h2>
		<div class="widget-options">
			<div class="btn-group" role="group">
				<?php if($this->session->userdata("user")){ ?>
					<a class="pull-right btn btn-outline btn-danger btn-sm payment_item_filter a-class-filter"><i class="la la-close"></i>Seçili Olanları Sil</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- End Widget Header -->
	<!-- Begin Widget Body -->
	<br>
	<div class="col-lg-9 pull-right">
		<form class="needs-validation " novalidate action="<?php echo base_url("personnel_payments/salary_accrual_date_list"); ?>" method="post">
			<div class="form-group row d-flex align-items-center mb-5">
				<label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Tarih *</label>
				<div class="col-lg-3">
					<input type="month" class="form-control" name="date" value="<?php echo isset($form_error) ? set_value("date") : ""; ?>">
					<input type="hidden" class="form-control" name="institution_id" value="<?php echo $institution_id; ?>">
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
	<div class="widget-body">
		<div class="table-responsive table-scroll padding-right-10" style=" overflow: hidden; outline: none;" tabindex="5">
			<?php if (empty($items)) { ?>
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
							<?php if($this->session->userdata("user")){ ?>
								<th>Seç</th>
							<?php } ?>
							<th>İsim & Soyisim</th>
							<th>TC</th>
							<th>Cinsiyet</th>
							<th>Kurum</th>
							<th>Sigorta Durumu</th>
							<th>Net Maaş</th>
							<!--<th>Çalıştığı Gün</th>-->
							<th>Yapılan Ödeme</th>
							<th>Bankadan Ödeme</th>
							<th>Elden Ödeme</th>
							<th>BES Ödeme</th>
							<th>İcra</th>
							<th>Tarih</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("personnel/rankSetter"); ?>">
						<?php $itemss = array_unique($items,SORT_REGULAR); ?>
						<?php foreach ($itemss as $item) { ?>
							<tr id="ord-<?php echo $item->id; ?>">
								<?php if($this->session->userdata("user")){ ?>
									<td><input class="checkbox-spin personnelID" type="checkbox" id="<?php echo $item->personnel_id; ?>" name="personnelID" value="<?php echo $item->personnel_id; ?>" /></td>
								<?php } ?>
								<td><?php echo $item->personnel_name; ?></td>
								<td><?php echo get_personnel_tc($item->personnel_id); ?></td>
								<td><?php echo get_personnel_gender($item->personnel_id); ?></td>
								<td><?php echo $item->institution_name; ?></td>
								<td><?php echo get_personnel_insuranceStatus($item->personnel_id); ?></td>
								<td><?php $net_salary = floatval($item->net_salary); echo number_format($net_salary, 2, ',', '.'); ?></td>
								<!--<td><?php //echo ($item->working_day != 0) ? $item->working_day : $item->description; ?></td>-->
								<td><?php echo $item->payment_made; ?></td>
								<td><?php echo $item->bank_payment; ?></td>
								<td><?php echo $item->manuel_payment; ?></td>
								<td><?php echo $item->bes_payment; ?></td>
								<td><?php echo $item->executive_payment; ?></td>
								<td><?php echo $item->date; ?></td>
								<td class="td-actions">						
									<form class="needs-validation" novalidate action="<?php echo base_url("personnel_payments/salary_accrual_personnel"); ?>" method="post">
										<input type="hidden" class="form-control" name="personnel_id" value="<?php echo $item->personnel_id; ?>">
										<button class="btn btn-gradient-01 pull-right" type="submit">Görüntüle</button>
									</form>
										<!--<form action="<?php //echo base_url("personnel_payments/control_payment_confirmation/$item->id"); ?>" method="post">
											<div>
												<input type="text" placeholder="Çalıştığı Gün" name="<?php //echo $item->id; ?>" class="form-control">
												<input type="hidden"  name="personnel_id" class="form-control" value="<?php //echo $item->personnel_id; ?>">
												<button type="submit" class="btn-primary pull-right" title="Ödeme Yap"><i class="la la-try documentList"></i></button>
											</div>
											<--<a href="#" data-url="<?php //echo base_url("personnel_payments/payment_confirmation/$item->id"); ?>" class="payment-btn" title="Ödeme Yap"><i class="la la-try documentList"></i></a>-->
											<!--</form>-->

										</td>
									</tr>
								<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td><?php $full = 0; $null = 0; ?>
									<?php foreach ($itemss as $item) { ?>
										<?php if (get_personnel_tc($item->id) != "") { ?>
											<?php $full += 1; ?>
										<?php }else{ ?>
											<?php $null += 1; ?>
										<?php } ?>
									<?php } ?>
									<span><b>TC Var: </b> <b><?php echo $full; ?> </b></span> / <span><b>TC Yok : </b> <b><?php echo $null; ?> </b></span></td>
									<td><?php $male = 0; $famale = 0; ?>
									<?php foreach ($itemss as $item) { ?>
										<?php if (get_personnel_gender($item->personnel_id) == "erkek") { ?>
											<?php $male += 1; ?>
										<?php }else if(get_personnel_gender($item->personnel_id) == "kadın"){ ?>
											<?php $famale += 1; ?>
										<?php } ?>
									<?php } ?>
									<span><b>Erkek: </b> <b><?php echo $male; ?> </b></span> / <span><b>Kadın : </b> <b><?php echo $famale; ?> </b></span></td>
									<td></td>
									<td><?php $insured = 0; $uninsured = 0; ?>
									<?php foreach ($itemss as $item) { ?>
										<?php if (get_personnel_insuranceStatus($item->personnel_id) == "Sigortalı") { ?>
											<?php $insured += 1; ?>
										<?php }else if(get_personnel_insuranceStatus($item->personnel_id) == "Sigortasız"){ ?>
											<?php $uninsured += 1; ?>
										<?php } ?>
									<?php } ?>
									<span><b>Sigortalı: </b> <b><?php echo $insured; ?> </b></span> / <span><b>Sigortasız : </b> <b><?php echo $uninsured; ?> </b></span></td>
									<td><?php $total =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $total += floatval($item->net_salary); ?>
									<?php } ?>
									<span><b>Toplam Maaş: </b> <b><?php echo number_format($total, 2, ',', '.'); ?> </b></span></td>
									<td><?php $receivableAmountTotal =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $receivableAmountTotal += floatval($item->receivable_amount); ?>
									<?php } ?>
									<span><b>Ödenen Toplam Maaş: </b> <b><?php echo number_format($receivableAmountTotal, 2, ',', '.'); ?> </b></span></td>
									<td><?php $bankPaymentTotal =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $bankPaymentTotal += floatval($item->bank_payment); ?>
									<?php } ?>
									<span><b>Bankaya Ödenecek Toplam Maaş: </b> <b><?php echo number_format($bankPaymentTotal, 2, ',', '.'); ?> </b></span></td>
									<td><?php $manuelPaymentTotal =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $manuelPaymentTotal += floatval($item->manuel_payment); ?>
									<?php } ?>
									<span><b>Elden Ödenecek Toplam Maaş: </b> <b><?php echo number_format($manuelPaymentTotal, 2, ',', '.'); ?> </b></span></td>
									<td><?php $besPaymentTotal =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $besPaymentTotal += floatval($item->bes_payment); ?>
									<?php } ?>
									<span><b>BES Toplam: </b> <b><?php echo number_format($besPaymentTotal, 2, ',', '.'); ?> </b></span></td>
									<td><?php $executivePaymentTotal =  0;?>
									<?php foreach ($itemss as $item) { ?>
										<?php $executivePaymentTotal += floatval($item->executive_payment); ?>
									<?php } ?>
									<span><b>İcra Toplam: </b> <b><?php echo number_format($executivePaymentTotal, 2, ',', '.'); ?> </b></span></td>
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