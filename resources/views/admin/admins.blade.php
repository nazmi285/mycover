@extends('layouts.master_admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        
        <h2 class="h4">Admin User</h2>
        <p class="mb-0">Your web analytics dashboard template.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            New User
        </a>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-sm btn-gray-800 float-end mb-3">
            Filter
        </button>
        <table class="table" id="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Date Registered</td>
                    <td>Action</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(function() {

            getDatatable()

            $('#btnSearch').on('click',function(){

                $('#data-table').DataTable().clear().destroy();

                getDatatable()
                $("#search .close").click();
            });

            $('#btnReset').on('click',function(){

                $('#role').val('');
                $('#startDate').val('');
                $('#endDate').val('');
                $('#user_name').val('');
                $('#user_email').val('');

                $('#data-table').DataTable().clear().destroy();
                getDatatable();
                $("#search .close").click();
            });
        });

        function getDatatable(){
            $('#data-table').DataTable({
                // order: [[ 4, "desc" ]],
                // responsive: true,
                processing: true,
                serverSide: true,
                searching: false,
                columnDefs: [ { orderable: false, targets: [0,5] }],
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50,100, -1 ],
                    [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
                ],
                buttons: [
                    {
                        extend:    'pageLength',
                        className: ' btn-sm',
                    },
                    {
                        extend:    'excelHtml5',
                        className: ' btn-sm',
                        text:      'Excel',
                    },
                    {
                        extend:    'print',
                        className: 'btn-sm',
                        text:      'Print',
                    },
                ],
                ajax:   {   "url":"{{url('/admin/user-management/admin/data')}}",
                            "data": function(data) {
                                data.name = $('#user_name').val();
                                data.startDate = $('#startDate').val();
                                data.endDate = $('#endDate').val();
                                data.email = $('#user_email').val();
                                // data.role = $('#role').val();
                            },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'roles', name: 'roles' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
          
            });
        }
    </script>
@endpush