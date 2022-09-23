{{-- default --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> LOGBOOK | @yield('title') </title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
{{-- <!-- Tell the browser to be responsive to screen width --> --}}
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
{{-- <!-- Bootstrap 3.3.6 --> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/custom.css') }}">
{{-- <!-- Font Awesome --> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
{{-- <!-- Ionicons --> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
{{-- <!-- Theme style --> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
{{-- <!-- AdminLTE Skins--> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/_all-skins.min.css') }}">
{{-- <!-- datatables --> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
{{-- <!-- Select2 --> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/select2.min.css') }}">
{{-- <!-- datapicker --> --}}
<link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
{{-- <!-- DataTable Button --> --}}
<link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
{{-- <!-- Toastr --> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
{{-- custom --}}
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
