@extends('layouts.master')
@section('title', 'Child Categories')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Child Categories</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12 mb-2">
                <a href="#" data-toggle="modal"data-target="#addchildCategory" class="btn btn-primary float-md-right">ADD</a>
            </div>
        </div>
        <div class="content-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Column selectors table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="action-table">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Sub Category</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof ($datas) > 0)
                                                    @foreach ($datas as $data)
                                                        <tr>
                                                            <td>{{++$sl}}</td>
                                                            <td>{{$data->name}}</td>
                                                            <td>{{$data->sub_category_id ? $data->subCategory->name . ' ( '. $data->subCategory->category->name .' )' : ''}}</td>
                                                            <td>{{($data->is_active == 1) ? 'Active' : 'Inactive'}}</td>
                                                            <td>
                                                                @if($data->is_active == 1)
                                                                    <a data-toggle="modal"data-target="#editchildCategory" data-target-id="{{$data->id}}"
                                                                        data-name="{{$data->name}}" data-category_id="{{$data->subCategory->category_id}}"
                                                                        data-sub_category_id="{{$data->sub_category_id}}" >
                                                                        <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                    </a>
                                                                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive" 
                                                                        onclick="deleteData('{{ route('childCategory.delete', [$data->id]) }}')">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore" 
                                                                        onclick="restoreData('{{ route('childCategory.restore', [$data->id]) }}')">
                                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot class="display-hidden">
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Sub Category</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Column selectors table -->
        </div>

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="addchildCategory" tabindex="-1" role="dialog" 
            aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Child Category Form</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('childCategory.store')}}" method="post"  class="clearForm form" 
                        enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="category_id">Select Category<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="select2 form-control" required>
                                    @foreach ($categories as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach    
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="sub_category_id">Select Sub Category<span class="text-danger">*</span></label>
                                <select name="sub_category_id" id="sub_category_id" class="select2 form-control" required>
                                    @foreach ($subCategories->where('category_id', $categories[0]->id) as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach    
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Child Category Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Child Category Name" required>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="editchildCategory" tabindex="-1" role="dialog" 
            aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Child Category Form</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('childCategory.update')}}" method="post"  class="clearForm form" 
                        enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="ecategory_id">Select Category<span class="text-danger">*</span></label>
                                <select name="category_id" id="ecategory_id" class="select2 form-control" required>
                                    @foreach ($categories as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach    
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="esub_category_id">Select Sub Category<span class="text-danger">*</span></label>
                                <select name="sub_category_id" id="esub_category_id" class="select2 form-control" required>
                                    @foreach ($subCategories as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach    
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Child Category Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="ename" placeholder="Child Category Name" required>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var url = "{{ route ('getSubCatAgainstCat') }}";
        $("#category_id").on("change", function(){
            var id = $(this).val();
            if (id != '') {
                getSubCatAgainstCat(id, url, '#sub_category_id');
            }
        });
        $("#ecategory_id").on("change", function(){
            var id = $(this).val();
            if (id != '') {
                getSubCatAgainstCat(id, url, '#esub_category_id');
            }
        });
        $("#editchildCategory").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');
            var category_id = $(e.relatedTarget).data('category_id');
            var sub_category_id = $(e.relatedTarget).data('sub_category_id');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);
            $('.modal-body #ecategory_id').val(category_id).change();
            $('.modal-body #esub_category_id').val(sub_category_id).change();

        });

        $("#editchildCategory").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection