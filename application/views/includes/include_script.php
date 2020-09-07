<script src="<?php echo base_url("assets/"); ?>vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/jquery-ui.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/base/core.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/sweetalert2.all.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/iziToast.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/custom.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="<?php echo base_url("assets/"); ?>vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/chart/chart.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/progress/circle-progress.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/calendar/moment.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/app/app.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="<?php echo base_url("assets/"); ?>vendors/js/datepicker/daterangepicker.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/dashboard/db-default.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/components/datepicker/datepicker.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/datatables.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>js/components/tables/tables.js"></script>
<!--
<script>
    $('[data-toggle="popover"]').popover();  
</script>
-->
<?php $this->load->view("includes/alert"); ?>
<script>
    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val;
    }
    var personnelID;
    $(document).ready(function(){
        $('.item_filter').click(function(){
             personnelID  = multiple_values('personnelID');
            $.ajax({
                url: "<?php echo base_url("personnel/bulk_deletion"); ?>",
                type:'post',
                data:{personnelID:personnelID},
                success:function(response){
                    window.location.reload();
                }
            });
        });
        
    });    
</script>
<script>
    function multiple_values_payment(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val;
    }
    var personnelID;
    $(document).ready(function(){
        $('.payment_item_filter').click(function(){
             personnelID  = multiple_values_payment('personnelID');
            $.ajax({
                url: "<?php echo base_url("personnel_payments/payment_bulk_deletion"); ?>",
                type:'post',
                data:{personnelID:personnelID},
                success:function(response){
                    window.location.reload();
                }
            });
        });
        
    });    
</script>