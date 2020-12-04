<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js')}}"></script>
<!-- waves effect js -->
<script src="{{ asset('assets/js/waves.js')}}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js')}}"></script>



  <!--Data Tables js-->
  <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('js/jszip.min.js')}}"></script>
  <script src="{{ asset('js/pdfmake.min.js')}}"></script>
  <script src="{{ asset('js/vfs_fonts.js')}}"></script>
  <script src="{{ asset('js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('js/buttons.colVis.min.js')}}"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );

     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

      } );

    </script>


<!-- Vector map JavaScript -->
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Sparkline JS -->
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
<!-- Chart js -->
<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js')}}"></script>
<!--notification js -->
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
<!-- Index js -->
<script src="{{ asset('assets/js/index2.js')}}"></script>

<!--Switchery Js-->
<script src="assets/plugins/switchery/js/switchery.min.js"></script>
<script>
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
   });
</script>

<!--Bootstrap Switch Buttons-->
<script src=""{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.min.js')}}"></script>
<script>
$(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
var radioswitch = function() {
    var bt = function() {
        $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioState")
        }), $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
        }), $(".radio-switch").on("switch-change", function() {
            $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
        })
    };
    return {
        init: function() {
            bt()
        }
    }
}();
$(document).ready(function() {
    radioswitch.init()
});
</script>
