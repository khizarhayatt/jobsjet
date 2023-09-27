@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="  col-sm-12 col-md-4 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Language Create</h4>
                            <a href="#" class="btn btn-sm btn-primary rounded-pill"><i
                                    class="far fa-plus px-2"></i>Create
                                Job</a>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('language.store') }}" method="POST">
                                @csrf
                                @if (isset($language))
                                    @method('PUT') <!-- For edit mode -->
                                @endif

                                <div class="form-row">
                                    <div class=" col-md-12">
                                        <div class="form-group">
                                            <label for="title">Language Title</label>
                                            <input type="text" class="form-control" id="title" name="name"
                                                placeholder="Enter language Title" value="{{ old('name') }}">
                                        </div>

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
                            <h4>language</h4>
                            <form action="{{ route('language.index') }}" class="card-header-form">
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

                                <table id="languageTable" class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>

                                            <th>Created At</th>

                                            <th>Action</th>
                                        </tr>

                                        @forelse ($languages as $key => $item)
                                            <tr>

                                                <td> {{ $key + 1 }} </td>
                                                <td> {{ isset($item->name) ? $item->name : '-' }} </td>

                                                <td> {{ isset($item->created_at) ? $item->created_at->format('F j, Y') : '-' }}
                                                </td>

                                                <td>
                                                    <div class="buttons">

                                                        <a href="{{ route('language.edit', $item->id) }}"
                                                            class="btn btn-sm btn-icon btn-primary"><i
                                                                class="far fa-edit"></i></a>

                                                        <form method="post" class="d-inline-block"
                                                            action="{{ route('language.destroy', $item->id) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="deletelanguage d-inline-block btn btn-icon btn-sm btn-danger">
                                                                <i class="far fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty

                                            <tr class="text-center">
                                                <td colspan="4">No Data Found
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">


                                @if ($languages->hasPages())
                                    {{ $languages->links() }}
                                @endif

                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
