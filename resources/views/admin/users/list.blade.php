
@extends('admin.layout')
@section('content')


<section class="section">
          <div class="section-body">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Multi Select</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div id="table-2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="table-2_length"><label>Show <select name="table-2_length" aria-controls="table-2" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="table-2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-2"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-2" role="grid" aria-describedby="table-2_info">
                        <thead>
                          <tr role="row"><th class="text-center pt-3 sorting_disabled" rowspan="1" colspan="1" aria-label="
                              
                                
                                &amp;nbsp;
                              
                            " style="width: 44.5781px;">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th><th class="sorting_asc" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Task Name: activate to sort column descending" style="width: 148.641px;">Task Name</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 78.4844px;">Progress</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 207.672px;">Members</th><th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 88.7969px;">Due Date</th><th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 107.922px;">Status</th><th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 72.9062px;">Action</th></tr>
                        </thead>
                        <tbody>
                           
                          
                          <tr role="row" class="even">
                            <td class="text-center pt-2">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td class="sorting_1">Redesign homepage</td>
                            <td class="align-middle">
                              <div class="progress progress-xs">
                                <div class="progress-bar width-per-60"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/users/user-1.png" width="35">
                              <img alt="image" src="assets/img/users/user-3.png" width="35">
                              <img alt="image" src="assets/img/users/user-4.png" width="35">
                            </td>
                            <td>2018-04-10</td>
                            <td>
                              <div class="badge badge-info badge-shadow">Todo</div>
                            </td>
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                          </tr></tbody>
                      </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="table-2_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="table-2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="table-2_previous"><a href="#" aria-controls="table-2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="table-2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="table-2_next"><a href="#" aria-controls="table-2" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             
          </div>
        </section>
 @endsection

 