<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled">
            <li><a href="<?php echo base_url(); ?>"><i class="la la-columns"></i><span>Dashboard</span></a></li>
        </ul>
        <span class="heading">Kurum İşlemleri</span>
        <ul class="list-unstyled">
            <?php if(isAllowedViewModule("institutions")) { ?>
                <li><a href="<?php echo base_url("institutions"); ?>" title="Kurumlar"><i class="la la-share-alt"></i><span>Kurumlar</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("institution_users")) { ?>
                <li><a href="<?php echo base_url("institution_users"); ?>" title="Kurum Kullanıcıları"><i class="la la-users"></i><span>Kurum Kullanıcıları</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("institution_user_roles")) { ?>
                <li><a href="<?php echo base_url("institution_user_roles"); ?>" title="Kurum Kullanıcı Rolü"><i class="la la-user-secret"></i><span>Kurum Kullanıcı Rolü</span></a></li>
            <?php } ?>
        </ul>
        <span class="heading">Personel İşlemleri</span>
        <ul class="list-unstyled">
            <?php if(isAllowedViewModule("institution_personnel")) { ?>
                <li><a href="<?php echo base_url("institution_personnel/institution_list"); ?>" title="Personel Listesi"><i class="la la-user-plus"></i><span>Personel Listesi</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("personnel")) { ?>
                <li><a href="<?php echo base_url("personnel"); ?>" title="Personel Girişi"><i class="la la-user-plus"></i><span>Personel Girişi</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("personnel_exit")) { ?>
                <li><a href="<?php echo base_url("personnel_exit"); ?>" title="Personel Çıkışı"><i class="la la-user-times"></i><span>Personel Çıkışı</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("personnel_permissions")) { ?>
                <li><a href="<?php echo base_url("personnel_permissions"); ?>" title="Personel İzinleri"><i class="la la-hotel"></i><span>Personel İzinleri</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("advance_payment")) { ?>
                <li><a href="<?php echo base_url("advance_payment"); ?>" title="Personel Avans"><i class="la la-try"></i><span>Personel Avans</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("personnel_payments")) { ?>
                <?php $payment_url = ($this->session->userdata("user")) ? "personnel_payments/salary_accrual" : "personnel_payments"; ?>
                <li><a href="<?php echo base_url();echo $payment_url; ?>" title="Personel Ödemeleri"><i class="la la-try"></i><span>Personel Ödemeleri</span></a></li>
                <?php if ($this->session->userdata("institution_user")) { ?>
                    <?php if (!empty($payment_control)) {
                        $payment_controls = array_unique($payment_control,SORT_REGULAR);
                    } ?>
                    <li><a href="<?php echo base_url("personnel_payments/payment_control"); ?>" title="Ödeme Kontrol"><i class="la la-try"></i><span>Ödeme Kontrol</span><?php if (!empty($payment_controls)) { ?> (<?php echo count($payment_controls); ?>)<i class="la la-bell animated infinite swing"></i><?php } ?></a></li>
                    <li><a href="<?php echo base_url("personnel_payments/salary_accrual"); ?>" title="Personel Ödeme Takibi"><i class="la la-try"></i><span>Personel Ödeme Takibi</span></a></li>
                <?php } ?>
            <?php } ?>
            <?php if(isAllowedViewModule("branch")) { ?>
                <li><a href="<?php echo base_url("branch"); ?>" title="Branş Listesi"><i class="la la-mortar-board"></i><span>Branş Listesi</span></a></li>
            <?php } ?>
        </ul>
        <?php if ($this->session->userdata("user")) { ?>
            <span class="heading">Panel Kullanıcıları</span>
            <ul class="list-unstyled">
                <?php if(isAllowedViewModule("users")) { ?>
                    <li><a href="<?php echo base_url("users"); ?>" title="Kullanıcılar"><i class="la la-users"></i><span>Kullanıcılar</span></a></li>
                <?php } ?>
                <?php if(isAllowedViewModule("user_roles")) { ?>
                    <li><a href="<?php echo base_url("user_roles"); ?>" title="Kullanıcı Rolü"><i class="la la-user-secret"></i><span>Kullanıcı Rolü</span></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <?php if ($this->session->userdata("user")) { ?>
            <span class="heading">İstekler</span>
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url("dashboard/personnel_claim_list"); ?>" title="İşe Alım İstekleri"><i class="la la-user-plus"></i><span>İşe Alım İstekleri </span> <?php if (!empty($personnels)) { ?> (<?php echo count($personnels); ?>)<i class="la la-bell animated infinite swing"></i><?php } ?></a></li>
                <li><a href="<?php echo base_url("dashboard/personnel_exit_claim_list"); ?>" title="İşten Çıkış İstekleri"><i class="la la-user-times"></i><span>İşten Çıkış İstekleri</span> <?php if (!empty($personnel_exit)) { ?> (<?php echo count($personnel_exit); ?>)<i class="la la-bell animated infinite swing"></i><?php } ?></a></li>
                <li><a href="<?php echo base_url("dashboard/personnel_advance_claim_list"); ?>" title="Personel Avans İstekleri"><i class="la la-try"></i><span>Personel Avans İstekleri</span> <?php if (!empty($advance_payment)) { ?> (<?php echo count($advance_payment); ?>)<i class="la la-bell animated infinite swing"></i><?php } ?></a></li>
                <li><a href="<?php echo base_url("dashboard/personnel_payment_claim_list"); ?>" title="Personel Ödeme İstekleri"><i class="la la-try"></i><span>Personel Ödeme İstekleri</span> <?php if (!empty($payment_institutions)) { ?> (<?php echo count($payment_institutions); ?>)<i class="la la-bell animated infinite swing"></i><?php } ?></a></li>
            </ul>
        <?php } ?>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>