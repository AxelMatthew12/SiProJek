@extends('layouts.template')

@section('content')
<div class="container">
    <h2>Daftar Project</h2>
    <a href="{{ route('project.create') }}" class="btn btn-primary mb-3">Tambah Project</a>
    <table class="table table-bordered" id="project-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Tanggal Posting</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#project-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("project.list") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'judul_project', name: 'judul_project' },
            { 
                data: null, 
                render: function (data) {
                    return 'Rp ' + data.bujed_min + ' - Rp ' + data.bujed_max;
                }
            },
            { data: 'status', name: 'status' },
            { data: 'tanggal_posting', name: 'tanggal_posting' },
            { data: 'deadline', name: 'deadline' },
            { 
                data: 'project_id',
                render: function (data) {
                    return `
                        <a href="/project/${data}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="/project/${data}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus project ini?')">Hapus</button>
                        </form>
                    `;
                }
            }
        ]
    });
});
</script>
@endpush
