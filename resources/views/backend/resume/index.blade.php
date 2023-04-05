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
                                <h3 class="text-white">Resumes list</h3>
                                <a href="{{ route('resumes.create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add resume</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Sl</td>
                                        <td>Title</td>
                                        <td>Uni/Org name</td>
                                        <td>Start date</td>
                                        <td>End date</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->uni_name }}</td>
                                        <td>{{ $value->start_date }}</td>
                                        <td>{{ $value->end_date }}</td>
                                        <td>
                                            <a href="{{ route('resumes.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('resumes.destroy', $value->id) }}" method="POST">
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
                                <h3 class="text-white">Resume create</h3>
                                <a href="{{ route('resumes.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" value="" id="title" placeholder="Title here">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="uni_name">University/Organisation Name <small style="color: red">*</small></label>
                                        <input type="text" name="uni_name" class="form-control" value="" id="uni_name" placeholder="Name here">
                                        <span style="color: red"> {{ $errors->has('uni_name') ? $errors->first('uni_name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Start date <small style="color: red">*</small></label>
                                        <input type="date" name="start_date" class="form-control" value="" id="start_date" placeholder="Start date">
                                        <span style="color: red"> {{ $errors->has('start_date') ? $errors->first('start_date') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End date <small style="color: red">*</small></label>
                                        <input type="date" name="end_date" class="form-control" value="" id="end_date" placeholder="End date">
                                        <span style="color: red"> {{ $errors->has('end_date') ? $errors->first('end_date') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Designation <small style="color: red">*</small></label>
                                        <textarea name="short_description" rows="5" class="form-control"
                                                  id="short_description" placeholder="Designation here"></textarea>
                                        <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($page == 'edit')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Resume update</h3>
                                <a href="{{ route('resumes.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('resumes.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" value="{{ $resume->title }}" id="title" placeholder="Title here">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="uni_name">University/Organisation Name <small style="color: red">*</small></label>
                                        <input type="text" name="uni_name" class="form-control" value="{{ $resume->uni_name }}" id="uni_name" placeholder="Name here">
                                        <span style="color: red"> {{ $errors->has('uni_name') ? $errors->first('uni_name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Start date <small style="color: red">*</small></label>
                                        <input type="date" name="start_date" class="form-control" value="{{ $resume->start_date }}" id="start_date" placeholder="Start date">
                                        <span style="color: red"> {{ $errors->has('start_date') ? $errors->first('start_date') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End date <small style="color: red">*</small></label>
                                        <input type="date" name="end_date" class="form-control" value="{{ $resume->end_date }}" id="end_date" placeholder="End date">
                                        <span style="color: red"> {{ $errors->has('end_date') ? $errors->first('end_date') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Designation <small style="color: red">*</small></label>
                                        <textarea name="short_description" rows="5" class="form-control"
                                                  id="short_description" placeholder="Designation here">{{ $resume->short_description }}</textarea>
                                        <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
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
