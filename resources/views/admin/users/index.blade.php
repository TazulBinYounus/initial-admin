@extends('layout.master')

@section('page-css')

@endsection
@section('content')

    @include('admin.includes.breadcrumb')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Users</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="#" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus-square"></i>
                Add New
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"></h6>
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                            <tr>
                                <th> SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page-js')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                },
                processing: true,
                serverSide: true,
                ajax: '{{route('users.data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'roles', name: 'roles'},
                    {data: 'action', name: 'action'}
                ]
            });
        });

        function deleteData(rowid) {
            let url = '{{ route("users.destroy", ":id") }}';
            url = url.replace(':id', rowid);

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'mr-2',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    axios.delete(url).then(res => {
                        console.log(res);
                        if (res.status === 200 && res.data.message === 'success') {
                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('#dataTable').DataTable().ajax.reload(null, false);
                        } else {
                            swal.fire(
                                'Failed',
                                'Failed something went wrong! :)',
                                'error'
                            )
                        }
                    });

                } else {
                    swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })


            // swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonClass: 'mr-2',
            //     confirmButtonText: 'Yes, delete it!',
            //     cancelButtonText: 'No, cancel!',
            //     reverseButtons: true
            // })
            //     .then((willDelete) => {
            //         if (willDelete) {
            //
            //         } else {
            //             swal("Your imaginary file is safe!");
            //         }
            //     });
        }
    </script>
@endsection

