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
                                <h3 class="text-white">Client list</h3>
                                <a href="{{ url('client/create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add client</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr class="bg-primary">
                                        <td class="text-white">Sl</td>
                                        <td class="text-white" width="20%">Name</td>
                                        <td class="text-white" width="20%">Designation</td>
                                        <td class="text-white" width="20%">Description</td>
                                        <td class="text-white">Image</td>
                                        <td class="text-white">Action</td>
                                    </tr>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Str::limit($value->name, 100, '...') }}</td>
                                        <td>{{ Str::limit($value->designation, 100, '...') }}</td>
                                        <td>{{ Str::limit($value->description, 100, '...') }}</td>
                                        <td>
                                            <img src="{{ asset('clients/'.$value->image) }}" height="50" width="100">
                                        </td>
                                        <td>
                                             <a href="{{ url('client/edit/'. $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="{{ url('client/destroy/'. $value->id) }}" method="POST">
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
                                {{ $data->links() }}
                            </div>
                        </div>
                        @endif
                        @if($page == 'create')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Client create</h3>
                                <a href="{{ url('client/list') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ url('client/store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" />
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" class="form-control" placeholder="Enter your designation" />
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea class="form-control" name="description" placeholder="Client Description"></textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea class="form-control" name="description" placeholder="Client Description"></textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($page == 'edit')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Client update</h3>
                                <a href="{{ url('client/list') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ url('client/update/'. $client->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" value="{{ $client->name }}" class="form-control" placeholder="Enter your name" />
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" value="{{ $client->designation }}" class="form-control" placeholder="Enter your designation" />
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea class="form-control" name="description" placeholder="Client Description">{{ $client->description }}</textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <img src="{{ asset('clients/'.$client->image) }}" height="80" width="80">
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
