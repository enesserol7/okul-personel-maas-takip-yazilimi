<div class="widget widget-07 has-shadow">
	<!-- Begin Widget Header -->
	<div class="widget-header bordered d-flex align-items-center">
		<h2>Personeller Ödemeleri Kontrol Listesi</h2>
		<div class="widget-options">
			<div class="btn-group" role="group">
			</div>
		</div>
	</div>
	<!-- End Widget Header -->
	<!-- Begin Widget Body -->
	<br>
	<div class="col-lg-9 pull-right">
		<form class="needs-validation " novalidate action="<?php echo base_url("personnel_payments/salary_accrual_institution_date_list"); ?>" method="post">
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
	<div class="widget-body">
		<div class="table-responsive table-scroll padding-right-10" style=" overflow: hidden; outline: none;" tabindex="5">
			<?php if (empty($institutions)) { ?>
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
							<th>Kurum</th>
							<th>Toplam Maaş</th>
							<th>Hakediş</th>
							<th>Yapılan Ödeme</th>
							<th>Kalan Ödeme</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($this->session->userdata("user")) { ?>
							<?php $itemss = array_unique($items,SORT_REGULAR); ?>
							<?php foreach ($institutions as $institution) { ?>
								<?php 
								$item1 = $this->personnel_payment_model->get_all(
									array(
										"institution_id" => $institution->id,
										"year_month" => $payment_date
									),"personnel_name ASC"
								);
								$total = 0;
								$receivable_total = 0;
								$paymentMade_total = 0;
								$remaining_total = 0;
								foreach ($item1 as $item) {
									$total += floatval($item->net_salary);
								}
								foreach ($item1 as $item) {
									$receivable_total += floatval($item->receivable_amount);
								}
								foreach ($item1 as $item) {
									$paymentMade_total += floatval($item->payment_made);
								}
								foreach ($item1 as $item) {
									$remaining_total += floatval($item->remaining_payment);
								}
								?>
								<tr>
									<td><?php echo $institution->title; ?></td>
									<td><?php $net_salary = floatval($total); echo number_format($net_salary, 2, ',', '.'); ?></td>
									<td><?php $receivable_total = floatval($receivable_total); echo number_format($receivable_total, 2, ',', '.'); ?></td>
									<td><?php $paymentMade_total = floatval($paymentMade_total); echo number_format($paymentMade_total, 2, ',', '.'); ?></td>
									<td><?php $remaining_total = floatval($remaining_total); echo number_format($remaining_total, 2, ',', '.'); ?></td>
									<td class="td-actions">
										<form class="needs-validation" novalidate action="<?php echo base_url("personnel_payments/salary_accrual_list"); ?>" method="post">
											<input type="hidden" class="form-control" name="institution_id" value="<?php echo $institution->id; ?>">
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
							<?php }else{ ?>
								<?php $itemss = array_unique($items,SORT_REGULAR); ?>
								<?php foreach ($institutions as $institution) { ?>
									<?php if (isAllowedViewInstitution($institution->id)) { ?>
										<?php 
										$item1 = $this->personnel_payment_model->get_all(
											array(
												"institution_id" => $institution->id
											),"personnel_name ASC"
										);
										$total = 0;
										$receivable_total = 0;
										$paymentMade_total = 0;
										$remaining_total = 0;
										foreach ($item1 as $item) {
											$total += floatval($item->net_salary);
										}
										foreach ($item1 as $item) {
											$receivable_total += floatval($item->receivable_amount);
										}
										foreach ($item1 as $item) {
											$paymentMade_total += floatval($item->payment_made);
										}
										foreach ($item1 as $item) {
											$remaining_total += floatval($item->remaining_payment);
										}
										?>
										<tr>
											<td><?php echo $institution->title; ?></td>
											<td><?php $net_salary = floatval($total); echo number_format($net_salary, 2, ',', '.'); ?></td>
											<td><?php $receivable_total = floatval($receivable_total); echo number_format($receivable_total, 2, ',', '.'); ?></td>
											<td><?php $paymentMade_total = floatval($paymentMade_total); echo number_format($paymentMade_total, 2, ',', '.'); ?></td>
											<td><?php $remaining_total = floatval($remaining_total); echo number_format($remaining_total, 2, ',', '.'); ?></td>
											<td class="td-actions">						
												<form class="needs-validation" novalidate action="<?php echo base_url("personnel_payments/salary_accrual_list"); ?>" method="post">
													<input type="hidden" class="form-control" name="institution_id" value="<?php echo $institution->id; ?>">
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
							<?php } ?>
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