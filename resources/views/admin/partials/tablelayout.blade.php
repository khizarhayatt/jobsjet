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
                         <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="inputEmail4">Role Title</label>
                                  <input type="email" class="form-control " id="inputEmail4" placeholder="Enter Role Title">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputPassword4">Status:</label>
                                  <select   class="form-control " id="" placeholder="">
      
                                      <option selected value="">Active</option>
                                      <option value="">Role 1</option>
                                      <option value="">Role 1</option>
                                      <option value="">Role 1</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Select Permissions</label>

                                    <div class="form-check form-check-inline w-100">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Selec All</label>
                                    </div>
                                    <hr class="m-0">
                                    <div class="selectwrap mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Permission 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox">PermissionPermissionPermission 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox">Permission 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox">Permission 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox">Permission 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option3" >
                                            <label class="form-check-label" for="inlineCheckbox3">Permission 1</label>
                                          </div>
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
                            <h4>Full Width</h4> <a href="#" class="btn btn-icon icon-left btn-primary"><i
                                    class="far fa-plus"></i> Create</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
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

                                                    <a href="#" class="btn  btn-sm btn-icon btn-info"><i
                                                            class="fas fa-info-circle"></i></a>

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

            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">
                      
                    <div class="card">
                      <div class="card-header">
                        <h4>Create Permission</h4>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="inputEmail4">Permission Title</label>
                                  <input type="Title" class="form-control" id="inputTitle4" placeholder="Enter Permission Title">
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
                            <h4>Full Width</h4> <a href="#" class="btn btn-icon icon-left btn-primary"><i
                                    class="far fa-plus"></i> Create</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
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