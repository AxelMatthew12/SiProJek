@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title m-0">Daftar Project</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="project-table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Judul</th>
                    <th>Budget</th>
                    <th>Tanggal Posting</th>
                    <th>Deadline</th>
                    <th>Kategori</th> <!-- Kolom untuk kategori nama -->
                    <th style="width: 180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data di-load via DataTable -->
            </tbody>
        </table>
        <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Create Project
        </a>
    </div>
</div>
@endsection

@push('js')
<script>
$('#project-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("project.list") }}',
    columns: [
        { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
        { data: 'judul_project' },
        { 
            data: null,
            render: function (data) {
                return 'Rp ' + data.bujed_min + ' - Rp ' + data.bujed_max;
            }
        },
        { data: 'tanggal_posting' },
        { data: 'deadline' },
        { data: 'kategori_nama' }, // Pastikan kategori_nama diterima dari server
        {
            data: 'project_id',
            orderable: false,
            searchable: false,
            className: 'text-center',
            render: function (data) {
                return `
                    <a href="/project/edit/${data}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/project/delete/${data}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus project ini?')">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">Selesai</button>
                    </form>
                `;
            }
        }
    ]
});
</script>
@endpush
