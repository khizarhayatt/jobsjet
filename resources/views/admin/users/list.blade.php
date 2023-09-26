@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="  col-md-12 col-sm-12 col-lg-12">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Users List</h4>

                            <form action="" class="card-header-form">

                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="card-header-action ml-2">
                                <a href="{{ route('users.create') }}" class="btn btn-primary"> <i
                                        class="far fa-plus px-1"></i>Create
                                    User</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles & Direct Permissions</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td> {{ $key + 1 }}</td>
                                                <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                                <td> {{ $user->email }}</td>
                                                <td class="w-50">

                                                    <a href="#" data-toggle-target="roles-wrapper-{{ $user->id }}"
                                                        class="btn toggle-link text-light btn-sm rounded-pill btn-dark my-1 d-inline-block">
                                                        <i class="fa-solid fa-eye"></i></i>
                                                        Roles ({{ count($user->roles) }})
                                                    </a>

                                                    <a href="#"
                                                        data-toggle-target="permissions-wrapper-{{ $user->id }}"
                                                        class="btn toggle-link text-dark btn-sm rounded-pill btn-light my-1 d-inline-block">
                                                        <i class="fa-solid fa-eye"></i></i>
                                                        Permissions ({{ count($user->permissions) }})
                                                    </a>

                                                    <div id="roles-wrapper-{{ $user->id }}"
                                                        class="roles-wrapper d-none">

                                                        @foreach ($user->roles as $role)
                                                            <span
                                                                class="badge badge-dark my-1 d-inline-block">{{ $role->name }}
                                                            </span>
                                                        @endforeach

                                                    </div>
                                                    <div id="permissions-wrapper-{{ $user->id }}"
                                                        class="permissions-wrapper d-none">

                                                        @foreach ($user->permissions as $permission)
                                                            <span
                                                                class="badge badge-light my-1 d-inline-block">{{ $permission->name }}
                                                            </span>
                                                        @endforeach

                                                    </div>



                                                </td>
                                                <td> {{ isset($user->created_at) ? $user->created_at->format('F j, Y') : '-' }}
                                                </td>

                                                <td class="">
                                                    <div class="buttons">

                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-sm btn-icon btn-primary"><i
                                                                class="far fa-edit"></i></a>

                                                        <form method="post" class="d-inline-block"
                                                            action="{{ route('users.destroy', $user->id) }}">
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

                                @if ($users->hasPages())
                                    {{ $users->links() }}
                                @endif

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </section>
    @include('admin.users.partials.rolestoggle')
@endsection
