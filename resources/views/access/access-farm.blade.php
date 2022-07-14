@extends('layouts.app')

@section('title')
	{{ __('Access to') }} {{ $farm }}
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table id="access" class="table cell-border compact table-striped hover display nowrap" width="100%">
				<thead>
					<tr>
            <th scope="col">{{ __('ID') }}</th>
						<th scope="col">{{ __('Full Name') }}</th>
						<th scope="col">{{ __('Access') }}</th>
						<th scope="col">{{ __('Action') }}</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
    $(document).ready(function () {
      let access = $('#access').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        columnDefs: [
          { className: "dt-center", targets: [ 3 ] }
        ],

        ajax: "{{ route('access.farm', ['code' => $farm]) }}",
        columns: [
          {data: 'id', name: 'id'},
          {data: 'full_name', name: 'full_name'},
          {data: 'access', name: 'access'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        pagingType: 'full_numbers',
        language: {
          "emptyTable": "No record available."
        },
        searching: true,
      });

      $(document).on('click', '#refresh', function(e) {
        access.ajax.reload();
      });

	    $(document).on('click', '#set-access', function (e) {
	      e.preventDefault();
	      var id = $(this).data('id');
	      var name = $(this).data('name');
	      var code = "{{ $farm }}";
	      var title = "Set Access to User?";
	      var html_text = "<p>Are you sure you want to set access to <b>" + name + "</b>?</p>";
	      Swal.fire({
	        title: title,
	        html: html_text,
	        icon: 'question',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Continue'
	      }).then((result) => {
	        if (result.value) {
	          var update_url = "{{ route('access.module.set') }}"
	          window.location.replace(update_url + "/" + id + "/" + name + "/" + code );
	        }
	        else {
	          Swal.fire({
	            title: 'Action Cancelled',
	            text: "",
	            icon: 'info',
	            showCancelButton: false,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Close'
	          });
	        }
	      });
	    });

    });
	</script>
@endsection