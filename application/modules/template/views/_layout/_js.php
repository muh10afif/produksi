<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 	
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- dateformat -->
<script src="<?php echo base_url() ?>assets/plugins/dateFormat/dateFormat.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/plugins/dateFormat/jquery-dateformat.min.js"></script> -->
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- datatables -->
<!-- <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
<!-- sweet alert -->
<script src="<?= base_url() ?>assets/swa/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-html5-1.5.6/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-date-range-picker-master/src/jquery.daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/cleave.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/cleave-phone.i18n.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/ajax/master.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/ajax/kredit.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/numberformat.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/chain_select/jquery.chained.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/StepMaker/src/jquery.step-maker.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/multi-step/dist/js/MultiStep.min.js"></script>

<!-- Include SmartWizard JavaScript source -->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/smartWizard/js/jquery.smartWizard.min.js"></script>
<!-- separator divider -->
<script src="<?= base_url() ?>assets/divider/number-divider.min.js"></script>

<script>

  $('body').tooltip({selector: '[data-toggle="tooltip"]'});

  $('.separator').divide({
      delimiter: '.',
      divideThousand: true, // 1,000..9,999
      delimiterRegExp: /[\.\,\s]/g
  });

  $('.separator').keypress(function(event) {
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
  });

  $(function () {

    $('.select2').select2();

    $('.datepicker2').datepicker({
      autoclose     : true,
      format        : "dd-M-yyyy",
      todayHighlight: true
    });

    $('.datepicker3').datepicker({
      autoclose     : true,
      format        : "yyyy-mm-dd",
      todayHighlight: true
    });

  });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        // This event should initialize before initializing smartWizard
        // Otherwise this event wont load on first page load
        // $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //     $("#message-box").append(" > <strong>showStep</strong> called on " + stepNumber + ". Direction: " + stepDirection+ ". Position: " + stepPosition);
        // });

        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
                                          .addClass('btn btn-info')
                                          .on('click', function(){ alert('Finish Clicked'); });
        var btnCancel = $('<button></button>').text('Cancel')
                                          .addClass('btn btn-danger')
                                          .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

        // Smart Wizard initialize
        $('#smartwizard').smartWizard({
          selected        : 0,
          theme           : 'circles',
          transitionEffect:'fade',
          toolbarSettings: {toolbarPosition: 'bottom',
                            toolbarExtraButtons: [btnFinish, btnCancel]
                          }
        });

    });
</script>
