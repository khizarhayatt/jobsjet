@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="  col-sm-12 col-md-4 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Permission</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('permissions.update', $permissions->id) }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Permission Title</label>
                                        <input type="Title" value="{{ $permissions->name }}" class="form-control"
                                            id="title" name="name" placeholder="Enter Permission Title">
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

                </div>
            </div>

        </div>
    </section>


    {{-- @include('admin.permissions.ajax') --}}
@endsection
