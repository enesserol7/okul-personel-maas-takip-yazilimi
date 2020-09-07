<div class="container-fluid">
	<!-- Begin Page Header-->
	<!-- End Page Header -->
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4>Yeni Kurum Ekle</h4>
				</div>
				<div class="widget-body">
					<form class="needs-validation" novalidate action="<?php echo base_url("institutions/save"); ?>" method="post">
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum Adı *</label>
							<div class="col-lg-5">
								<input class="form-control" placeholder="Kurum Adı" name="title" value="<?php echo isset($form_error) ? set_value("title") : ""; ?>">
								<?php if (isset($form_error)) { ?>
									<small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefon 1 *</label>
							<div class="col-lg-5">
								<input class="form-control" placeholder="Telefon 1" name="phone_1" value="<?php echo isset($form_error) ? set_value("phone_1") : ""; ?>">
								<?php if (isset($form_error)) { ?>
									<small class="input-form-error pull-right"><?php echo form_error("phone_1"); ?></small>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefon 2</label>
							<div class="col-lg-5">
								<input class="form-control" placeholder="Telefon 2" name="phone_2" value="<?php echo isset($form_error) ? set_value("phone_2") : ""; ?>">
								<?php if (isset($form_error)) { ?>
									<small class="input-form-error pull-right"><?php echo form_error("phone_2"); ?></small>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">E-Posta Adresi *</label>
							<div class="col-lg-5">
								<div class="input-group">
									<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
									<?php if (isset($form_error)) { ?>
										<small class="input-form-error pull-right"><?php echo form_error("email"); ?></small>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum Yetkilisi Adı</label>
							<div class="col-lg-5">
								<input class="form-control" placeholder="Kurum Yetkilisi Adı" name="administrator_name" value="<?php echo isset($form_error) ? set_value("administrator_name") : ""; ?>">
								<?php if (isset($form_error)) { ?>
									<small class="input-form-error pull-right"><?php echo form_error("administrator_name"); ?></small>
								<?php } ?>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adres</font></font></label>
							<div class="col-lg-5">
								<textarea class="form-control" placeholder="Kurum Adresi ..." required="" name="address" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("address") : ""; ?></textarea>
							</div>
						</div>
						<div class="form-group row d-flex align-items-center mb-5">
							<label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Açıklama</font></font></label>
							<div class="col-lg-5">
								<textarea class="form-control" placeholder="Açıklama ..." required="" name="description" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("description") : ""; ?></textarea>
							</div>
						</div>
						<div class="text-right">
							<button class="btn btn-gradient-01" type="submit">Kaydet</button>
							<a href="<?php echo base_url("institutions"); ?>" class="btn btn-shadow">İptal</a>
						</div>
					</form>
				</div>
			</div>
			<!-- End Form -->
		</div>
	</div>
	<!-- End Row -->
</div>