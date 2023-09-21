@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Role: {{ $role->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.update', $role->id) }}" method="post">
                                @csrf
                                @method('PUT') <!-- Use the appropriate HTTP method for updating -->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Role Title</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Enter Role Title" value="{{ $role->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Select Permissions</label>

                                        <div class="form-check form-check-inline w-100">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckboxAll"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckboxAll">Select All</label>
                                        </div>
                                        <hr class="m-0">
                                        <div class="selectwrap mt-2">
                                            @foreach ($permissions as $id => $name)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input chkAll" name="permissions[]"
                                                        type="checkbox" id="inlineCheckbox-{{ $id }}"
                                                        value="{{ $id }}"
                                                        {{ in_array($id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
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
                <div class="col-md-8 col-sm-12 col-lg-8"></div>
            </div>
        </div>
    </section>
@endsection
