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
                        <?php
                        $image = get_personnel_image($item->personnel_id);
                        $image = get_picture("personnel_v", $image, "271x200");
                        ?>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Resmi </label>
                            <div class="col-lg-3">
                                <div class="col-md-3 image_upload_container">
                                    <img src="<?php echo $image; ?>" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5 col-md-12">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Personel Çıkışına ait Evrak </label>
                            <?php if (get_file_ext($item->document) == "pdf" || get_file_ext($item->document) == "txt") { ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <iframe src="<?php echo base_url("uploads/$viewFolder/files/$item->document"); ?>" width="750px" height="375px"></iframe>
                                    </div>
                                </div>
                            <?php }else if(get_file_ext($item->document) == "png" || get_file_ext($item->document) == "jpg" || get_file_ext($item->document) == "jpeg"){ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <img src="<?php echo get_picture("uploads/$viewFolder/files", $item->document, "271x200"); ?>" class="img img-responsive">
                                    </div>
                                </div>
                            <?php }else if($item->document == ""){ ?> 
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <p><b>Belge Yok!</b></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-lg-3">
                                    <div class="col-md-3 image_upload_container">
                                        <button class="btn btn-gradient-01"><a href="<?php echo base_url("uploads/$viewFolder/files/$item->document"); ?>">İndirmek için Tıklayınız</a></button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo base_url("personnel_exit"); ?>" class="btn btn-shadow">Geri Dön</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>