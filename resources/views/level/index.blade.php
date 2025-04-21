@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title m-0">Data Level</h3>
        {{-- <a href="{{ route('level.create') }}" class="btn btn-primary btn-sm float-right">
            <i class="fas fa-plus"></i> Tambah Level
        </a> --}}
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table_level">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data di-load via DataTable -->
            </tbody>
        </table>
        <a href="{{ route('level.create') }}" class="btn btn-primary">+ Tambah Level</a>
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
            url: "{{ url('level/list') }}",
            type: "GET"
        },
        columns: [
            { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
            { data: 'level_kode' },
            { data: 'level_nama' },
            {
                data: 'level_id',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function (data, type, row) {
                    return `
                        <a href="/level/${data}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/level/${data}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus level ini?')">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    `;
                }
            }
        ]
    });
});
</script>
@endpush
