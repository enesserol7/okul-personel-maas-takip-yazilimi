<div class="widget widget-07 has-shadow">
	<!-- Begin Widget Header -->
	<div class="widget-header bordered d-flex align-items-center">
		<h2>Personeller Ödemeleri Listesi</h2>
		<div class="widget-options">
			<div class="btn-group" role="group">
				<?php if ($item) { ?>
					<a href="<?php echo base_url("personnel_payments/institution_all_payment_confirmation/$item->id"); ?>" class="btn btn-shadow btn btn-gradient-04" title="Personeller Ay Boyunca Eksiksiz Çalıştı ise Alttaki Formu Kullanmanıza Gerek Yoktur!! Toplu Ödeme Yapmak için Butona Tıklayınız...">Toplu Ödeme Yap</a>
				<?php }else{ ?>
					<a href="<?php echo base_url("personnel_payments/all_payment_confirmation"); ?>" class="btn btn-shadow btn btn-gradient-04" title="Personeller Ay Boyunca Eksiksiz Çalıştı ise Alttaki Formu Kullanmanıza Gerek Yoktur!! Toplu Ödeme Yapmak için Butona Tıklayınız...">Toplu Ödeme Yap</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- End Widget Header -->
	<!-- Begin Widget Body -->
	<br>
	<center><div class="col-lg-5">
		<form class="needs-validation" novalidate action="<?php echo base_url("personnel_payments/institution_personnel_list"); ?>" method="post">
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
				<button class="btn btn-gradient-01 pull-right" type="submit">Görüntüle</button>
			</div>
		</form>
	</div></center>
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
							<th>İsim & Soyisim</th>
							<th>TC</th>
							<th>Cinsiyet</th>
							<th>Kurum</th>
							<th>Net Maaş</th>
							<th>Aldığı Avans</th>
							<th>Hakediş</th>
							<th>Sigorta Durumu</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("personnel/rankSetter"); ?>">
						<?php $sayac = 1; ?>
						<?php $totalRemainingPayment = 0; ?>
						<?php $itemss = array_unique($items,SORT_REGULAR); ?>
						<?php $payment_date = date("Y-m");
						$payment_date = $payment_date . "-01"; ?>
						<?php foreach ($itemss as $item) { ?>
							<?php
							$advance_payments = $this->advance_payment_model->get(
								array(
									"personnel_id" => $item->id,
									"isActive" => 1,
									"year_month" => $payment_date
								)
							);
							if (!empty($advance_payments)) {
								$advance_payment = floatval($advance_payments->payment_made);
								$netSalary = floatval($item->net_salary);
								$remainingPayment = $netSalary-$advance_payment;
								$totalRemainingPayment += floatval($remainingPayment);
							}else{
								$advance_payment = 0;
								$remainingPayment = $item->net_salary;
								$totalRemainingPayment += floatval($remainingPayment);
							}
							?>
							<tr id="ord-<?php echo $item->id; ?>">
								<td><?php echo $item->personnel_name; ?></td>
								<td><?php echo $item->tc; ?></td>
								<td><?php echo $item->gender; ?></td>
								<td><?php echo $item->institution_name; ?></td>
								<td><?php $net_salary = floatval($item->net_salary); echo number_format($net_salary, 2, ',', '.'); ?></td>
								<td><?php $advance_payment = floatval($advance_payment); echo number_format($advance_payment, 2, ',', '.'); ?></td>
								<td><?php $remainingPayment = floatval($remainingPayment); echo number_format($remainingPayment, 2, ',', '.'); ?></td>
								<td><?php echo ($item->insurance_status == 1) ? "Sigortalı" : "Sigortasız"; ?></td>
								<td class="td-actions">						
									<?php if (isAllowedUpdateModule()) { ?>
										<form action="<?php echo base_url("personnel_payments/payment_confirmation/$item->id"); ?>" method="post">
											<div class="mb-9">
												<input type="text" placeholder="Bankaya Yap. Öd." name="<?php echo $item->id; ?>" class="form-control">
												<input type="text" placeholder="Elden Yap. Öd." name="manuel_payment_<?php echo $item->id; ?>" class="form-control">
												<input type="text" placeholder="BES Ödeme" name="bes_payment_<?php echo $item->id; ?>" class="form-control">
												<input type="text" placeholder="İcra" name="executive_payment_<?php echo $item->id; ?>" class="form-control">
											</div>
											<br>
											<div>
												<label class="form-control-label">Personel Çalışmadı ise İşaretleyiniz</label>
												<div class="mb-3">
													<div class="styled-checkbox">
														<input type="checkbox" name="working_status" id="check-<?php echo $sayac; ?>">
														<label for="check-<?php echo $sayac; ?>">Çalışmadı</label>
													</div>
												</div>
												
												<button type="submit" class="btn-primary pull-right" title="Ödeme Yap"><i class="la la-try documentList"></i></button>
											</div>
											<!--<a href="#" data-url="<?php //echo base_url("personnel_payments/payment_confirmation/$item->id"); ?>" class="payment-btn" title="Ödeme Yap"><i class="la la-try documentList"></i></a>-->
										</form>
										
									<?php } ?>
								</td>
							</tr>
							<?php $sayac++; ?>
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
							<td><?php $total =  0;?>
							<?php foreach ($itemss as $item) { ?>
								<?php $total += floatval($item->net_salary); ?>
							<?php } ?>
							<span><b>Toplam Maaş: </b> <b><?php echo number_format($total, 2, ',', '.'); ?> </b></span></td>
							<?php
							$advance_payments = $this->advance_payment_model->get_all(
								array(
									"isActive" => 1,
									"year_month" => $payment_date
								)
							);
							?>
							<td><?php $advance_total =  0;?>
							<?php foreach ($advance_payments as $advance_payment) { ?>
								<?php $advance_total += floatval($advance_payment->payment_made); ?>
							<?php } ?>
							<span><b>Toplam Avans: </b> <b><?php echo number_format($advance_total, 2, ',', '.'); ?> </b></span></td>
							<td><?php $totalRemainingPayments = floatval($totalRemainingPayment); ?>
							<span><b>Toplam Hakediş: </b> <b><?php echo number_format($totalRemainingPayments, 2, ',', '.'); ?> </b></span></td>
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