<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Personel Avans İstekleri Listesi</h2>
                <div>
                    <div class="page-header-tools">
                        <!--<a class="btn btn-gradient-01" href="#">Add Widget</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Begin Row -->
    <!-- End Row -->
    <!-- Begin Row -->
    <div class="row flex-row">
        <?php if(empty($advance_payment)){ ?>
            <div class="alert alert-info text-center">
                <h5 class="alert-title">Kayıt Bulunamadı!</h5>
                <p>Burada herhangi bir veri bulunmamaktadır.</p>
            </div>
        <?php }else{ ?>
            <div class="col-xl-12">
                <!-- Begin Widget 06 -->
                <div class="widget widget-06 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Personel Avans İstekleri</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                        <!--<div class="dropdown-menu">
                            <a href="#" class="dropdown-item"> 
                                <i class="la la-edit"></i>Edit Widget
                            </a>
                            <a href="#" class="dropdown-item faq"> 
                                <i class="la la-question-circle"></i>FAQ
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
            <!-- End Widget Header -->
            <!-- Begin Widget Body -->
            <div class="widget-body p-0">
                <div id="list-group" class="widget-scroll" style="max-height:490px;">
                    <ul class="reviews list-group w-100">
                        <!-- 01 -->
                        <?php foreach ($advance_payment as $advance_payment) { ?>
                            <li class="list-group-item">
                                <div class="media">
                                    <?php
                                    $image = get_personnel_image($advance_payment->personnel_id);
                                    $image = get_picture("personnel_v", $image, "271x200");
                                    ?>
                                    <div class="media-left align-self-start">
                                        <?php if ($image != "") { ?>
                                            <img src="<?php echo $image; ?>" class="user-img rounded-circle" alt="<?php echo $advance_payment->personnel_name; ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="username">
                                            <h4><?php echo $advance_payment->personnel_name; ?></h4>
                                        </div>
                                        <div class="msg">

                                        </div>
                                        <div class="meta">
                                            <span class="mr-3"><?php echo $advance_payment->institution_name; ?></span>
                                            <?php if (isAllowedUpdateModule()) { ?>
                                                <a href="<?php echo base_url("dashboard/advance_payment_view_form/$advance_payment->id"); ?>"><i class="la la-eye"></i>Görüntüle</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <!--<div class="media-right pr-3 align-self-center">
                                    <div class="like text-center">
                                        <i class="ion-heart"></i>
                                        <span>12</span>
                                    </div>
                                </div>-->
                            </div>
                        </li>
                    <?php } ?>
                    <!-- End 01 -->
                </ul>
            </div>
            <!-- End List -->
        </div>
        <!-- End Widget Body -->
    </div>
    <!-- End Widget 06 -->
</div>
<?php } ?>

<!-- End Row -->
</div>
</div>