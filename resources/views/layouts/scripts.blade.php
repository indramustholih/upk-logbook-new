{{-- <!-- jQuery 2.2.3 --> --}}
<script src="{{ asset('/js/jquery-2.2.3.js') }}"></script>
{{-- <!-- Bootstrap 3.3.7 --> --}}
<script src="{{ asset('/adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
{{-- <!-- AdminLTE App --> --}}
<script src="{{ asset('/adminLTE/dist/js/app.js') }}"></script>
<script src="{{ asset('/adminLTE/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/adminLTE/dist/js/fastclick.js') }}"></script>
{{-- <!-- Fast Click --> --}}
<script src="{{ asset('/adminLTE//plugins/fastclick/fastclick.js') }}"></script>
{{-- <!-- Chartjs --> --}}
<script src="{{ asset('/adminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
{{-- <!-- Select2 --> --}}
<script src="{{asset('/adminLTE/plugins/select2/select2.min.js')}}"></script>
{{-- <!-- Datepicker --> --}}
<script src="{{asset('/adminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
{{-- <!-- Validator --> --}}
<script src="{{ asset('/js/validator.js') }}"></script>
{{-- <!-- Chained --> --}}
<script src="{{ asset('/js/chained.js') }}"></script>
{{-- <!-- Button Colvis --> --}}
<script src="{{ asset('/js/buttons.colVis.min.js') }}"></script>
{{-- <!-- DataTable Button --> --}}
<script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
{{-- <!-- Toastr --> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- <!-- Custom --> --}}
<script src="{{ asset('/js/custom.js') }}"></script>
@yield('script')
