@inject('gc', '\App\Http\Controllers\GeneralController')

@extends('layouts.app')

@section('title')
	{{ __('PFC Region') }}
@endsection

@section('head-action')
	@if($gc->checkModuleAccess('region_add', 'PFC'))
		<a href="{{ route('pfc.region.add') }}" class="btn btn-link text-decoration-none">{{ __('ADD') }}</a>
	@endif
  <button class="btn btn-link text-decoration-none" id="refresh"><i class="fa fa-sync"></i></button>
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <table id="regions" class="table cell-border compact table-striped hover display nowrap" width="100%">
        <thead>
          <tr>
            {{-- <th scope="col">{{ __('ID') }}</th> --}}
            <th scope="col">{{ __('Region Name') }}</th>
            <th scope="col">{{ __('Region Code') }}</th>
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
      let regions = $('#regions').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        columnDefs: [
          { className: "dt-center", targets: [ 0, 1, 2 ] }
        ],

        ajax: "{{ route('pfc.region') }}",
        columns: [
          // {data: 'id', name: 'id'},
          {data: 'region_name', name: 'region_name'},
          {data: 'region_code', name: 'region_code'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        pagingType: 'full_numbers',
        language: {
          "emptyTable": "No record available."
        },
        searching: true,
      });
    });


    $(document).on('click', '#refresh', function(e) {
      var regions = $('#regions').DataTable();
      regions.ajax.reload();
    });


    $(document).on('click', '#edit', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var name = $(this).data('name');
      var title = "Edit Region?";
      var html_text = "<p>Are you sure you want to edit <b>" + name + "</b>?</p>";
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
          {{-- Redirect to Edit/Update Page --}}
          var update_url = "{{ route('pfc.region.edit') }}"
          window.location.replace(update_url + "/" + id);
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


    $(document).on('click', '#delete', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var name = $(this).data('name');
      var title = "Delete Region?";
      var html_text = "<p>Are you sure you want to delete <b>" + name + "</b>?</p>";
      Swal.fire({
        title: title,
        html: html_text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continue'
      }).then((result) => {
        if (result.value) {
          {{-- POST Delete and Refresh DataTables --}}
          $.ajax({
            type: "POST",
            data: {"_token": "{{ csrf_token() }}","id": id},
            url: "{{ route('pfc.region.delete') }}",
            success: function(data){
              if(data) {
                Swal.fire({
                  title: "Region Deleted",
                  text: "",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Close'
                });
                var regions = $('#regions').DataTable();
                regions.ajax.reload();
              }
              else {
                Swal.fire({
                  title: "Operation Error",
                  text: "Please try again later. Or you don't have permission to do this action.",
                  icon: "error",
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Close'
                });
              }
            }
          });
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
  </script>
@endsection