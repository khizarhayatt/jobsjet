@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="  col-md-4 col-sm-12 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Role:</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Role Title</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Enter Role Title">
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Select Permissions</label>

                                        <div class="form-check form-check-inline w-100">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckboxAll"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckboxAll">Selec All</label>
                                        </div>
                                        <hr class="m-0">
                                        <div class="selectwrap mt-2">

                                            @foreach ($permissions as $id => $name)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input chkAll" name="permissions[]"
                                                        type="checkbox" id="inlineCheckbox-{{ $id }}"
                                                        value="{{ $id }}">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox-{{ $id }}">{{ $name }}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
                <div class="  col-md-8 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Roles List</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Permissios</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($roles as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td class="w-25">{{ $item->name }}</td>
                                                <td style="width:40%">
                                                    <span class="badge badge-info my-1">Total
                                                        ({{ count($item->permissions) }})
                                                    </span>
                                                    @foreach ($item->permissions as $permission)
                                                        <span class="badge badge-light my-1">{{ $permission->name }}
                                                        </span>
                                                    @endforeach

                                                </td>
                                                <td> {{ $item->created_at->format('F j, Y') }} </td>

                                                <td class="">
                                                    <div class="buttons">

                                                        <a href="{{ route('roles.edit', $item->id) }}"
                                                            class="btn btn-sm btn-icon btn-primary"><i
                                                                class="far fa-edit"></i></a>

                                                        <form method="post" class="d-inline-block"
                                                            action="{{ route('roles.destroy', $item->id) }}">
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

                                @if ($roles->hasPages())
                                    {{ $roles->links() }}
                                @endif

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </section>
@endsection
