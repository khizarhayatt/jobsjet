@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="  col-sm-12 col-md-4 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Permission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Permission Title</label>
                                        <input type="Title" class="form-control" id="title" name="name"
                                            placeholder="Enter Permission Title">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="  col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Permissions</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="permissionsTable" class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($permissions as $key => $item)
                                            <tr>

                                                <td> {{ $key + 1 }} </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->created_at }} </td>

                                                <td>
                                                    <div class="buttons">
                                                        <a href="#" class="btn btn-sm btn-icon btn-primary"><i
                                                                class="far fa-edit"></i></a>
                                                        <a href=""
                                                            class="deletePermission btn btn-icon btn-sm btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">

                                @if ($permissions->hasPages())
                                    {{ $permissions->links() }}
                                @endif

                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- @include('admin.permissions.ajax') --}}
@endsection
