

<script src="{{ asset('admin-assets/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin-assets/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('admin-assets/lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('admin-assets/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom.js') }}"></script>

<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Ara...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
<script src="{{ asset('admin-assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('admin-assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin-assets/lib/d3/d3.js') }}"></script>
<script src="{{ asset('admin-assets/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('admin-assets/lib/chart.js/Chart.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/lib/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('admin-assets/lib/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('admin-assets/lib/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('admin-assets/lib/flot-spline/jquery.flot.spline.js') }}"></script> --}}

<script src="{{ asset('admin-assets/js/starlight.js') }}"></script>
<script src="{{ asset('admin-assets/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('admin-assets/js/dashboard.js') }}"></script>

<script src="{{ asset('admin-assets/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin-assets/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('admin-assets/lib/select2/js/select2.min.js') }}"></script>

</body>
</html>
