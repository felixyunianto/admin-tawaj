@extends('layouts.app')
@section('title')
    Button Page
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Tabel Button Page</h6>
                    <a href="{{ route('button_page.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Tambah Button Page
                    </a>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table align-items-center mb-0" id="content-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Title</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Title 2</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Parent</th>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($button_pages as $item)
                                    <tr>
                                        <td class="" style="padding-left: 24px;">
                                            <div class="d-flex px-1 pl-4 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm ml-3">{{ $loop->iteration }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            {{ $item->title }}</td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            {{ $item->title2 }}</td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            @if ($item->button_page_id)
                                                {{ $item->parent->title }}
                                            @else
                                                Tidak ada
                                            @endif
                                        </td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            <div class="d-flex gap-2">
                                                <a href="{{route('button_page.edit', $item->id)}}" class="btn btn-sm btn-warning mt-2">
                                                    <i class="fa fa-edit"></i>Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger mt-2"
                                                    onclick="return onDelete({{ $item->id }})">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </div>

                                            <form id='form-delete-{{ $item->id }}'
                                                action="{{ route('button_page.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="text-center text-sm text-secondary py-2" colspan="4">
                                        Belum ada kategori konten yang ditambahkan
                                    </td>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#content-table').DataTable();
        });

        function onDelete(id) {
            const confirmDelete = confirm("Apakah anda yakin?");
            if (confirmDelete) {
                $(`#form-delete-${id}`).submit();
            }
        }
    </script>
@endsection
