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
                                <h3 class="text-white">Portfolio list</h3>
                                <a href="{{ route('portfolios.create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add resume</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Sl</td>
                                        <td>Title</td>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <img src="{{ asset('banner/'.$value->image) }}" style="height: 80" width="80">
                                        </td>
                                        <td>
                                            <a href="{{ route('portfolios.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('portfolios.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="delete" class="btn btn-sm btn-danger mt-1"
                                                    onclick="return confirm('Are you sure delete this information.')">
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
                                <h3 class="text-white">Portfolio create</h3>
                                <a href="{{ route('portfolios.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
{{--                                    <div class="form-group">--}}
{{--                                        <label for="title">Title <small style="color: red">*</small></label>--}}
{{--                                        <input type="text" name="title" class="form-control" value="" id="title" placeholder="Title here">--}}
{{--                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="name">Name <small style="color: red">*</small></label>--}}
{{--                                        <input type="text" name="name" class="form-control" value="" id="name" placeholder="Name here">--}}
{{--                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($page == 'edit')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Portfolio update</h3>
                                <a href="{{ route('portfolios.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" value="{{ $portfolio->title }}" id="title" placeholder="Title here">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}" id="name" placeholder="Name here">
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <img src="{{ asset('banner/'. $portfolio->image) }}" height="80" width="80">
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
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
