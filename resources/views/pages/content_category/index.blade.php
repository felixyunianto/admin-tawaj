@extends('layouts.app')
@section('title')
    Kategory Konten
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Tabel Kategori Konten</h6>
                    <a href="{{ route('content-category.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Tambah Kategori
                    </a>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama Kategori</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Sub</th>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
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
                                            {{ $item->content_category_name }}</td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            <a href="{{route('content', ['category' => $item->id])}}" class="">
                                                Lihat detail
                                            </a>
                                        </td>
                                        <td class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7 d-flex align-items-center"
                                            style="padding-left: 24px; ">

                                            <form action="{{ route('content-category.destroy', $item->id) }}" method="post"
                                                class="d-flex align-items-center gap-2 pt-2">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn-sm btn-warning mt-2"
                                                    href="{{ route('content-category.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger  mt-2">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus</button>
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
