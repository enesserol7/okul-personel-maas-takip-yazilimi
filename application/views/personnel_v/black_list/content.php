<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydını düzenliyorsunuz" ?></h4>
                </div>
                <div class="widget-body">
                    <?php 
                    $personnel_nameSurname = explode(" ", $item->personnel_name);
                    
                    ?>
                    <form class="needs-validation" novalidate action="<?php echo base_url("personnel/black_list/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kara Listeye Alınma Nedeni *</font></font></label>
                            <div class="col-lg-5">
                                <textarea class="form-control" placeholder="Kara Listeye Alınma Nedeni * ..." required="" name="black_list_description" style="margin-top: 0px; margin-bottom: 0px; height: 218px;"><?php echo isset($form_error) ? set_value("black_list_description") : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                            <a href="<?php echo base_url("personnel"); ?>" class="btn btn-shadow">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>