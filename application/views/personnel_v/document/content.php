<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydına ait evraklar" ?></h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Resmi </label>
                            <div class="col-lg-3">
                                <div class="col-md-3 image_upload_container">
                                    <img src="<?php echo get_picture($viewFolder, $item->image, "271x200"); ?>" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Kimlik Fotokopisi </label>
                            <?php if (get_file_ext($item->copy_of_identity_card) == "pdf" || get_file_ext($item->copy_of_identity_card) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->copy_of_identity_card"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->copy_of_identity_card) == "png" || get_file_ext($item->copy_of_identity_card) == "jpg" || get_file_ext($item->copy_of_identity_card) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->copy_of_identity_card"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->copy_of_identity_card == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->copy_of_identity_card"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sabıka Kaydı </label>
                            <?php if (get_file_ext($item->criminal_record) == "pdf" || get_file_ext($item->criminal_record) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->criminal_record"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->criminal_record) == "png" || get_file_ext($item->criminal_record) == "jpg" || get_file_ext($item->criminal_record) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->criminal_record"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->criminal_record == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1"><button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->criminal_record"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">İkametgah </label>
                            <?php if (get_file_ext($item->place_of_residence) == "pdf" || get_file_ext($item->place_of_residence) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->place_of_residence"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->place_of_residence) == "png" || get_file_ext($item->place_of_residence) == "jpg" || get_file_ext($item->place_of_residence) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->place_of_residence"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->place_of_residence == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->place_of_residence"); ?>">İndirmek için Tıklayınız</a></button>
                                    </div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sağlık Raporu </label>
                            <?php if (get_file_ext($item->health_report) == "pdf" || get_file_ext($item->health_report) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->health_report"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->health_report) == "png" || get_file_ext($item->health_report) == "jpg" || get_file_ext($item->health_report) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->health_report"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->health_report == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                   <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->health_report"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Sözleşme </label>
                            <?php if (get_file_ext($item->contract) == "pdf" || get_file_ext($item->contract) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->contract"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->contract) == "png" || get_file_ext($item->contract) == "jpg" || get_file_ext($item->contract) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->contract"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->contract == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                    <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->contract"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Diploma </label>
                            <?php if (get_file_ext($item->diploma) == "pdf" || get_file_ext($item->diploma) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->diploma"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->diploma) == "png" || get_file_ext($item->diploma) == "jpg" || get_file_ext($item->diploma) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo base_url("uploads/$viewFolder/files/$item->diploma"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->diploma == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-1">
                                    <center><div class="col-md-1">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->diploma"); ?>">İndirmek için Tıklayınız</a></button></div></center>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo base_url("personnel"); ?>" class="btn btn-shadow">Geri Dön</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>