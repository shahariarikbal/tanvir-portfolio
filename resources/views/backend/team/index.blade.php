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
                                <h3 class="text-white">Team list</h3>
                                <a href="{{ route('teams.create') }}" class="btn btn-success float-right" style="margin-top: -36px;">Add Team</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr class="bg-primary">
                                        <td class="text-white">Sl</td>
                                        <td class="text-white">Name / Image</td>
                                        <td class="text-white">Facebook Link</td>
                                        <td class="text-white">Linkedin Link</td>
                                        <td class="text-white">Designation</td>
                                        <td class="text-white">Action</td>
                                    </tr>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                               <img src="{{ asset('/team/'.$value->image) }}" style="height: 50px; width: 50px; border-radius: 100%" /> &nbsp; {{ $value->name }}
                                            </td>
                                            <td>{{ $value->fb_link }}</td>
                                            <td>{{ $value->in_link }}</td>
                                            <td>{{ $value->designation }}</td>
                                            <td>
                                                <a href="{{ route('teams.edit', $value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('teams.destroy', $value->id) }}" method="POST">
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
                                <h3 class="text-white">Team create</h3>
                                <a href="{{ route('teams.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" id="title">
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" class="form-control" id="designation">
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fb_link">Fb Link <small style="color: red">*</small></label>
                                        <input type="url" name="fb_link" class="form-control" id="fb_link">
                                        <span style="color: red"> {{ $errors->has('fb_link') ? $errors->first('fb_link') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="in_link">Linkedin Link <small style="color: red">*</small></label>
                                        <input type="url" name="in_link" class="form-control" id="in_link">
                                        <span style="color: red"> {{ $errors->has('in_link') ? $errors->first('in_link') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_ads">Google Ads <small style="color: red">*</small></label>
                                        <input type="number" class="form-control" name="google_ads" value="" placeholder="Google Ads here" />
                                        <span style="color: red"> {{ $errors->has('google_ads') ? $errors->first('google_ads') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook">Facebook Ads <small style="color: red">*</small></label>
                                        <input type="number" name="fb_ads" class="form-control" value="" id="fb_ads" placeholder="Facebook Ads here">
                                        <span style="color: red"> {{ $errors->has('fb_ads') ? $errors->first('fb_ads') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="shopify">Shopify <small style="color: red">*</small></label>
                                        <input type="number" name="shopify" class="form-control" value="" id="shopify" placeholder="Shopify here">
                                        <span style="color: red"> {{ $errors->has('shopify') ? $errors->first('shopify') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="dropshipping">Dropshipping <small style="color: red">*</small></label>
                                        <input type="number" name="dropshipping" class="form-control" value="" id="dropshipping" placeholder="Dropshipping here">
                                        <span style="color: red"> {{ $errors->has('dropshipping') ? $errors->first('dropshipping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_shopping">Google shopping <small style="color: red">*</small></label>
                                        <input type="number" name="google_shopping" class="form-control" value="" id="google_shopping" placeholder="Google shopping here">
                                        <span style="color: red"> {{ $errors->has('google_shopping') ? $errors->first('google_shopping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="marketing_strategy">Marketing Strategy <small style="color: red">*</small></label>
                                        <input type="number" name="marketing_strategy" class="form-control" value="" id="marketing_strategy" placeholder="Marketing Strategy here">
                                        <span style="color: red"> {{ $errors->has('marketing_strategy') ? $errors->first('marketing_strategy') : ' ' }}</span>
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
                                <h3 class="text-white">Team update</h3>
                                <a href="{{ route('teams.index') }}" class="btn btn-danger float-right" style="margin-top: -36px;"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
                            </div>
                            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" value="{{ $team->name }}" id="title">
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" value="{{ $team->designation }}" class="form-control" id="designation">
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fb_link">Fb Link <small style="color: red">*</small></label>
                                        <input type="url" name="fb_link" class="form-control" value="{{ $team->fb_link }}" id="fb_link">
                                        <span style="color: red"> {{ $errors->has('fb_link') ? $errors->first('fb_link') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="in_link">Linkedin Link <small style="color: red">*</small></label>
                                        <input type="url" name="in_link" value="{{ $team->in_link }}" class="form-control" id="in_link">
                                        <span style="color: red"> {{ $errors->has('in_link') ? $errors->first('in_link') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_ads">Google Ads <small style="color: red">*</small></label>
                                        <input type="number" class="form-control"  name="google_ads" value="{{ $team->google_ads }}" placeholder="Google Ads here" />
                                        <span style="color: red"> {{ $errors->has('google_ads') ? $errors->first('google_ads') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook">Facebook Ads <small style="color: red">*</small></label>
                                        <input type="number" name="fb_ads" class="form-control" value="{{ $team->fb_ads }}" id="fb_ads" placeholder="Facebook Ads here">
                                        <span style="color: red"> {{ $errors->has('fb_ads') ? $errors->first('fb_ads') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="shopify">Shopify <small style="color: red">*</small></label>
                                        <input type="number" name="shopify" class="form-control" value="{{ $team->shopify }}" id="shopify" placeholder="Shopify here">
                                        <span style="color: red"> {{ $errors->has('shopify') ? $errors->first('shopify') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="dropshipping">Dropshipping <small style="color: red">*</small></label>
                                        <input type="number" name="dropshipping" class="form-control" value="{{ $team->dropshipping }}" id="dropshipping" placeholder="Dropshipping here">
                                        <span style="color: red"> {{ $errors->has('dropshipping') ? $errors->first('dropshipping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_shopping">Google shopping <small style="color: red">*</small></label>
                                        <input type="number" name="google_shopping" class="form-control" value="{{ $team->google_shopping }}" id="google_shopping" placeholder="Google shopping here">
                                        <span style="color: red"> {{ $errors->has('google_shopping') ? $errors->first('google_shopping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="marketing_strategy">Marketing Strategy <small style="color: red">*</small></label>
                                        <input type="number" name="marketing_strategy" class="form-control" value="{{ $team->marketing_strategy }}" id="marketing_strategy" placeholder="Marketing Strategy here">
                                        <span style="color: red"> {{ $errors->has('marketing_strategy') ? $errors->first('marketing_strategy') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <img src="{{ asset('/team/'.$team->image) }}" height="50" width="50" />
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
