@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="  col-md-12 col-sm-12 col-lg-12">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Roles List</h4>
                            <form action="{{ route('roles.index') }}" class="card-header-form">
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
