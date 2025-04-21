@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Level</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table_level">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data di-load via DataTable -->
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
<!-- Custom CSS jika diperlukan -->
@endpush

@push('js')
<script>
$(document).ready(function() {
    $('#table_level').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('user/list') }}",
            type: "GET"
        },
        columns: [
            { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
            { data: 'username' },
            { data: 'nama' },
            { data: 'email' },
            { data: 'level' }       
        ]
    });

    function getProgressClass(progress) {
        if (progress <= 30) {
            return 'bg-danger';
        } else if (progress <= 70) {
            return 'bg-warning';
        } else {
            return 'bg-success';
        }
    }
});
</script>
@endpush
