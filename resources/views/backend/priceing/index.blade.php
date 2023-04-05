@extends('backend.master')

@push('style')
    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

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
                                <h3 class="text-white">Priceings list</h3>
                                <a href="{{ route('priceings.create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add priceing</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr class="bg-primary">
                                        <td class="text-white">Sl</td>
                                        <td class="text-white">Title</td>
                                        <td class="text-white">Price</td>
                                        <td class="text-white">Image</td>
                                        <td class="text-white">Action</td>
                                    </tr>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>${{ $value->title }}</td>
                                        <td>${{ $value->price }}</td>
                                        <td>
                                            <img src="{{ asset('priceing/'.$value->image) }}" height="50" width="100">
                                        </td>
                                        <td>
                                            <a href="{{ route('priceings.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('priceings.destroy', $value->id) }}" method="POST">
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
                                <h3 class="text-white">Priceings create</h3>
                                <a href="{{ route('priceings.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('priceings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="price">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" id="title">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price <small style="color: red">*</small></label>
                                        <input type="text" name="price" class="form-control" id="price">
                                        <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea name="description" rows="5" class="form-control"
                                        id="summernote" placeholder="Designation here"></textarea>
                                        <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="orderNumber">Link <small style="color: red">*</small></label>
                                        <input type="text" name="order_number" class="form-control" id="orderNumber">
                                        <span style="color: red"> {{ $errors->has('order_number') ? $errors->first('order_number') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($page == 'edit')
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">Priceings update</h3>
                                <a href="{{ route('priceings.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('priceings.update', $priceing->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="price">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $priceing->title }}">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price <small style="color: red">*</small></label>
                                        <input type="text" name="price" value="{{ $priceing->price }}" class="form-control" id="price">
                                        <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Description <small style="color: red">*</small></label>
                                        <textarea name="description" rows="5" class="form-control"
                                        id="edit_summernote" placeholder="Designation here">{{ $priceing->description }}</textarea>
                                        <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="orderNumber">Link <small style="color: red">*</small></label>
                                        <input type="text" name="order_number" value="{{ $priceing->order_number }}" class="form-control" id="orderNumber">
                                        <span style="color: red"> {{ $errors->has('order_number') ? $errors->first('order_number') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <img src="{{ asset('priceing/'.$priceing->image) }}" height="80" width="80">
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

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 200
    });
    $('#edit_summernote').summernote({
        height: 200
    });
</script>
@endpush
