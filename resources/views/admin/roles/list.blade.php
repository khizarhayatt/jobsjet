@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">
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
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Role Title">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Status:</label>
                                        <select name="status" class="form-control " id="">
                                            <option selected value="1">Active</option>
                                            <option value="0">In Active</option>
                                            <option value="">Pending</option>
                                        </select>
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
                                            @foreach ($permissions as $p)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox-{{ $p->id }}" value="{{ $p->name }}">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox-{{ $p->id }}">{{ $p->name }}</label>
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
                <div class="col-8 col-md-8 col-lg-8">
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
                                            <th>Permissions</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Isnap Kiswandi</td>
                                            <td>
                                                <ul class="d-block">
                                                    <li class="d-inline-block">Test</li>
                                                    <li class="d-inline-block">TestTest</li>
                                                    <li class="d-inline-block">TestTest</li>
                                                    <li class="d-inline-block">Test</li>
                                                    <li class="d-inline-block">TestTest</li>
                                                    <li class="d-inline-block">Test</li>
                                                </ul>
                                            </td>
                                            <td>2017-01-17</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="#" class="btn  btn-sm btn-icon btn-primary"><i
                                                            class="far fa-edit"></i></a>



                                                    <a href="#" class="btn  btn-sm btn-icon btn-danger"><i
                                                            class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    @include('errors.alerts')
    @include('admin.permissions.ajax')
@endsection
