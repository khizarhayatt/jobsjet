@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="  col-sm-12 col-md-4 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Permissions Create</h4>
                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary rounded-pill"><i
                                    class="far fa-plus px-2"></i>Create
                                Roles</a>
                        </div>
                        <div class="card-body">

                            <form
                                action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}"
                                method="POST">
                                @csrf
                                @if (isset($permission))
                                    @method('PUT') <!-- For edit mode -->
                                @endif

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Permission Title</label>
                                        <input type="text" class="form-control" id="title" name="name"
                                            placeholder="Enter Permission Title"
                                            value="{{ isset($permission) ? $permission->name : '' }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-primary"
                                            value="{{ isset($permission) ? 'Update' : 'Submit' }}">
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
                            <form action="{{ route('permissions.index') }}" class="card-header-form">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                                <td> {{ isset($item->name) ? $item->name : '-' }} </td>
                                                <td> {{ isset($item->created_at) ? $item->created_at->format('F j, Y') : '-' }}
                                                </td>

                                                <td>
                                                    <div class="buttons">

                                                        <a href="{{ route('permissions.edit', $item->id) }}"
                                                            class="btn btn-sm btn-icon btn-primary"><i
                                                                class="far fa-edit"></i></a>

                                                        <form method="post" class="d-inline-block"
                                                            action="{{ route('permissions.destroy', $item->id) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="deletePermission d-inline-block btn btn-icon btn-sm btn-danger">
                                                                <i class="far fa-trash"></i></button>
                                                        </form>
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
@endsection
