<?php if ($this->session->userdata("user")) { ?>
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
<?php }else{ ?>
	<div class="widget widget-07 has-shadow">
		<!-- Begin Widget Header -->
		<div class="widget-header bordered d-flex align-items-center">
			<h2>Onaylanan Personeller Listesi</h2>
			<div class="widget-options">
				<div class="btn-group" role="group">
					<?php if (isAllowedWriteModule()) { ?>
						<a href="<?php echo base_url("personnel/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
					<?php } ?>
					<a href="<?php echo base_url("personnel/waiting_list_of_approval"); ?>" class="btn btn-shadow btn btn-gradient-03">Onay Bekleyen Personelleri Gör</a>
					<a href="<?php echo base_url("personnel/denied_list"); ?>" class="btn btn-shadow btn btn-gradient-01">Reddedilen Personelleri Gör</a>
					<?php if($this->session->userdata("user")){ ?>
						<a class="pull-right btn btn-outline btn-danger btn-sm item_filter a-class-filter"><i class="la la-close"></i>Seçili Olanları Sil</a>
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
							<p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("personnel/new_form"); ?>">tıklayınız...</a></p>
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
									<?php if($this->session->userdata("user")){ ?>
										<td><input class="checkbox-spin personnelID" type="checkbox" id="<?php echo $item->id; ?>" name="personnelID" value="<?php echo $item->id; ?>" /></td>
									<?php } ?>
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
												<a href="#" data-url="<?php echo base_url("personnel/delete/$item->id"); ?>" class="remove-btn" title="Sil"><i class="la la-close delete"></i></a>
											<?php } ?>
										<?php } ?>
										<?php if (isAllowedUpdateModule()) { ?>
											<a href="<?php echo base_url("personnel/update_form/$item->id"); ?>" title="Düzenle"><i class="la la-edit edit"></i></a>
										<?php } ?>
										<?php if (isAllowedViewModule()) { ?>
											<a href="<?php echo base_url("personnel/document_form/$item->id"); ?>" title="Dokümanlar"><i class="la la-paste documentList"></i></a>
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
							<tr>
								<td></td>
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
	<?php } ?>