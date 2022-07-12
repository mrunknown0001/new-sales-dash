@extends('layouts.app')

@section('title')
	{{ __('Audit Trail') }}
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
      <table id="audits" class="table cell-border compact table-striped hover display nowrap" width="100%">
        <thead>
          <tr>
            <th scope="col">{{ __('ID') }}</th>
            <th scope="col">{{ __('User') }}</th>
            <th scope="col">{{ __('Table') }}</th>
            <th scope="col">{{ __('Action') }}</th>
            <th scope="col">{{ __('New Value') }}</th>
            <th scope="col">{{ __('Old Value') }}</th>
            <th scope="col">{{ __('View') }}</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
  <script>
    $(document).ready(function () {
      let audits = $('#audits').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        columnDefs: [
          { className: "dt-center", targets: [ 2, 3, 6 ] }
        ],

        ajax: "{{ route('audits') }}",
        columns: [
          {data: 'id', name: 'id'},
          {data: 'user', name: 'user'},
          {data: 'table', name: 'table'},
          {data: 'action', name: 'action'},
          {data: 'new_value', name: 'new_value'},
          {data: 'old_value', name: 'old_value'},
          {data: 'view', name: 'view', orderable: false, searchable: false},
        ],
        pagingType: 'full_numbers',
        language: {
          "emptyTable": "No record available."
        },
        searching: true,
      });
    });


    $(document).on('click', '#refresh', function(e) {
      var audits = $('#audits').DataTable();
      audits.ajax.reload();
    });
  </script>
@endsection