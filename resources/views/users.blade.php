@extends('layouts.app')

@section('title')
	Users
@endsection

@section('head-action')
  <button class="btn btn-link text-decoration-none" id="refresh"><i class="fa fa-sync"></i></button>
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table id="users" class="table cell-border compact table-striped hover display nowrap" width="100%">
				<thead>
					<tr>
            <th scope="col">ID</th>
						<th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">System Access</th>
            <th scope="col">Role</th>
						<th scope="col">Action</th>
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
      let users = $('#users').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        columnDefs: [
          { className: "dt-center", targets: [ 0, 3, 4, 5 ] }
        ],

        ajax: "{{ route('users.api.data') }}",
        columns: [
          {data: 'id', name: 'id'},
          {data: 'first_name', name: 'first_name'},
          {data: 'last_name', name: 'last_name'},
          {data: 'system_access', name: 'system_access'},
          {data: 'role', name: 'role'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        pagingType: 'full_numbers',
        language: {
          "emptyTable": "No record available."
        },
        searching: true,
      });

      $(document).on('click', '#refresh', function(e) {
        users.ajax.reload();
      });

      $(document).on('click', '#grant', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
          title: 'Grant Access as...',
          input: 'select',
          inputOptions: {
            user: 'User',
            superuser: 'Super User',
          },
          inputPlaceholder: 'Select Role',
          showCancelButton: true,
          inputValidator: (value) => {
            return new Promise((resolve) => {
              if(value === '') {
                resolve()
                Swal.fire({
                  title: 'Access Grant Error',
                  text: '',
                  icon: 'error',
                  showCancelButton: false,
                  showConfirmButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Close'
                });
              }
              else {
                var act_url = "{{ route('user.grant.access') }}";
                var url_param = act_url + "/" + id + "/" + value;
                $.ajax(url_param, {
                  success: function(data) {
                    if(data) {
                      resolve()
                      users.ajax.reload();
                      Swal.fire({
                        title: 'Access Granted',
                        text: '',
                        icon: 'success',
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Close'
                      });
                    }
                    else {
                      resolve()
                      Swal.fire({
                        title: 'Access Grant Error',
                        text: '',
                        icon: 'error',
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Close'
                      });
                    }
                  },
                  error: function () {
                    resolve();
                    Swal.fire({
                      title: 'Access Grant Error',
                      text: '',
                      icon: 'error',
                      showCancelButton: false,
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Close'
                    });
                  }
                });
              }       
            });
          }
        });
      });
    });
	</script>
@endsection