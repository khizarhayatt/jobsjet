@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header ">

                            <form class="d-flex flex-row justify-content-between" action="{{ route('permissions.store') }}"
                                method="post">
                                @csrf
                                <div class="form-group ">
                                    <h4>Permissios</h4>
                                </div>
                                <div class="form-group ">
                                    <input type="text" name="permission" placeholder="Permission"
                                        value="{{ old('permission') }}" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <select name="status" value="{{ old('permission') }}" class="form-control ">
                                        <option value="2">Pending</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group ">

                                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i
                                            class="far fa-plus"></i> Create</button>
                                </div>
                            </form>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>


                                        <tr>
                                            <td>5</td>
                                            <td>Isnap Kiswandi</td>
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
@endsection
