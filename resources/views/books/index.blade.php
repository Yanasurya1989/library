@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Book List</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- Button trigger modal --}}

                        <!-- Modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">
                            Add Book
                        </button>
                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('books/store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Code</label>
                                                <input type="text" class="form-control" id="code" name="code">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Title</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Author</label>
                                                <input type="text" class="form-control" id="author" name="author">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Stock</label>
                                                <input type="text" class="form-control" id="stock" name="stock">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Synopsis</label>
                                                <input type="text" class="form-control" id="synopsis" name="synopsis">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Stock</th>
                                    <th>Synopsis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Stock</th>
                                    <th>Synopsis</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($books as $data)
                                    <tr>
                                        <td>{{ $data->book_code }}</td>
                                        <td>{{ $data->book_title }}</td>
                                        <td>{{ $data->book_author }}</td>
                                        <td>{{ $data->book_stock }}</td>
                                        <td>{{ $data->book_synopsis }}</td>
                                        <td>
                                            <a href="{{ url('/books/delete', encrypt($data->id)) }}"
                                                class="btn btn-danger">Delete</a>
                                            <a href="{{ url('/books/delete', encrypt($data->id)) }}"
                                                class="btn btn-warning">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
