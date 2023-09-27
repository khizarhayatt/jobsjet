@extends('admin.layout')
@section('content')
    <section class="section">
        <div class="section-body">


            <div class="row">
                <div class="  col-sm-12 col-md-4 col-lg-4">
                    @include('errors.alerts')
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Tag</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="  col-md-12">
                                        <div class="form-group">
                                            <label for="title">Tag Title</label>
                                            <input type="text" class="form-control" id="title" name="name"
                                                placeholder="Enter Industry Title" value="{{ $tag->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Tag Description</label>
                                            <textarea name="description" class="form-control" id="" cols="50" rows="50">{{ $tag->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="  col-sm-12 col-md-8 col-lg-8"></div>
            </div>

        </div>
    </section>
@endsection
