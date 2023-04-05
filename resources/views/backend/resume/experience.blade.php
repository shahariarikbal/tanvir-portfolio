@extends('backend.master')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="content">
            <div class="col-md-12" style="margin-top: 5%; margin-bottom: 5%">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('error') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-md-12">
                        @if($page == 'index')
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="text-white">Experience list</h3>
                                <a href="{{ route('experiences.create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add experience</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Sl</td>
                                        <td>Designation</td>
                                        <td>Company/Join date</td>
                                        <td>description</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach ($data as $info)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $info->designation ?? '' }}</td>
                                            <td>{{ $info->company_name ?? '' }}</td>
                                            <td>{{ $info->description ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('experiences.edit', $info->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('experiences.destroy', $info->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="delete" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Are you sure delete this information.')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        @if($page == 'create')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Experience create</h3>
                                <a href="{{ route('experiences.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" class="form-control" value="" id="designation" placeholder="Designation here">
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name">Organisation Name & Date<small style="color: red">*</small></label>
                                        <input type="text" name="company_name" class="form-control" value="" id="company_name" placeholder="Name & date here">
                                        <span style="color: red"> {{ $errors->has('company_name') ? $errors->first('company_name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea name="description" rows="5" class="form-control"
                                                  id="description" placeholder="Description here"></textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($page == 'edit')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Experience update</h3>
                                <a href="{{ route('experiences.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" class="form-control" value="{{ $experience->designation ?? '' }}" id="designation" placeholder="Designation here">
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name">Organisation Name & Date<small style="color: red">*</small></label>
                                        <input type="text" name="company_name" class="form-control" value="{{ $experience->company_name ?? '' }}" id="company_name" placeholder="Name & date here">
                                        <span style="color: red"> {{ $errors->has('company_name') ? $errors->first('company_name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea name="description" rows="5" class="form-control"
                                                  id="description" placeholder="Description here">{{ $experience->description ?? '' }}</textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
