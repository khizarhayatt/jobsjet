 @extends('admin.layout')
 @section('content')
     <section class="section">
         <div class="section-body">


             <div class="row justify-content-center align-item-center">
                 <div class="  col-sm-12 col-md-8 col-lg-8">
                     @include('errors.alerts')
                     <div class="card">

                         <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                             method="POST" enctype="multipart/form-data">
                             @csrf
                             @if (isset($user))
                                 @method('PUT') <!-- For edit mode -->
                             @endif
                             <div class="card-header">
                                 <h4>User Create</h4>
                             </div>
                             <div class="card-body">

                                 <div class="row">
                                     <div class="col-md-6">
                                         <h6>Details</h6>
                                         <div class="form-group  ">
                                             <label for="first_name">First Name</label>
                                             <input id="first_name" type="text" class="form-control" name="first_name"
                                                 autofocus value="{{ old('first_name') }}" />
                                         </div>
                                         <div class="form-group  ">
                                             <label for="last_name">Last Name</label>
                                             <input id="last_name" type="text" class="form-control" name="last_name"
                                                 value="{{ old('last_name') }}" />
                                         </div>
                                         <div class="form-group">
                                             <label for="email">Email</label>
                                             <input id="email" type="email" class="form-control" name="email"
                                                 value="{{ old('email') }}" />
                                             <div class="invalid-feedback"></div>
                                         </div>

                                         <div class="form-group  ">
                                             <label for="password" class="d-block">Password</label>
                                             <input id="password" type="password" class="form-control pwstrength"
                                                 name="password" data-indicator="pwindicator" />
                                             <div id="pwindicator" class="pwindicator">
                                                 <div class="bar"></div>
                                                 <div class="label"></div>
                                             </div>

                                         </div>

                                         <div class="form-group">



                                             <div class="section-title">File Browser</div>


                                             <img id="selectedImage" name="profile_photo"
                                                 src="{{ asset('assets/img/users/av.jpeg') }}"
                                                 class="img-fluid float-right mb-2 rounded w-25 h-25 object-fit-cover"
                                                 alt="">


                                             <div class="custom-file">
                                                 <input type="file" class="custom-file-input" id="imageInput">
                                                 <label class="custom-file-label" for="customFile">Choose file</label>
                                             </div>

                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <div class="row ">
                                                 <h6>Roles</h6> <a href="{{ route('roles.index') }}"
                                                     class="btn ml-auto btn-sm btn-primary rounded-pill "><i
                                                         class="far fa-plus px-2"></i>Create
                                                     Roles</a>
                                             </div>
                                             <label class="d-block">Select Roles</label>

                                             <div class="form-check form-check-inline w-100">
                                                 <input class="form-check-input" type="checkbox" id="inlineCheckboxAllRoles"
                                                     value="option1">
                                                 <label class="form-check-label" for="inlineCheckboxAllRoles">Selec
                                                     All</label>
                                             </div>
                                             <hr class="m-0">
                                             <div class="selectwrap mt-2">

                                                 @foreach ($roles as $id => $name)
                                                     <div class="form-check form-check-inline">
                                                         <input class="form-check-input chkAllRoles" name="roles[]"
                                                             type="checkbox" id="inlineCheckbox-{{ $id }}"
                                                             value="{{ $id }}">
                                                         <label class="form-check-label"
                                                             for="inlineCheckbox-{{ $id }}">{{ $name }}</label>
                                                     </div>
                                                 @endforeach

                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <div class="row ">
                                                 <h6>Direct Permissions</h6> <a href="{{ route('permissions.index') }}"
                                                     class="btn ml-auto btn-sm btn-primary rounded-pill "><i
                                                         class="far fa-plus px-2"></i>Create
                                                     Permissions</a>
                                             </div>
                                             <label class="d-block">Select Roles</label>

                                             <div class="form-check form-check-inline w-100">
                                                 <input class="form-check-input" type="checkbox"
                                                     id="inlineCheckboxAllPermissions" value="option1">
                                                 <label class="form-check-label" for="inlineCheckboxAllPermissions">Selec
                                                     All</label>
                                             </div>
                                             <hr class="m-0">
                                             <div class="selectwrap mt-2">

                                                 @foreach ($permissions as $id => $name)
                                                     <div class="form-check form-check-inline">
                                                         <input class="form-check-input chkAllPermissions"
                                                             name="permissions[]" type="checkbox"
                                                             id="inlineCheckbox-{{ $id }}"
                                                             value="{{ $id }}">
                                                         <label class="form-check-label"
                                                             for="inlineCheckbox-{{ $id }}">{{ $name }}</label>
                                                     </div>
                                                 @endforeach

                                             </div>
                                         </div>
                                     </div>
                                 </div>



                             </div>
                             <div class="card-footer text-right">
                                 <button class="btn btn-primary">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         </div>
     </section>
 @endsection
