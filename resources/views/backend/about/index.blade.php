@extends('backend.master')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="content">
            <div class="col-md-12" style="margin-top: 5%; margin-bottom: 5%">
                @if(Session::has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="text-white">About</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $abouts ? $abouts->id : '' }}">
                                    {{-- <div class="form-group">
                                        <label for="title">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" value="{{ $abouts ? $abouts->title :'' }}" id="title" placeholder="Title here">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="description">Description <small style="color: red">*</small></label>
                                        <textarea class="form-control" rows="5" name="description" id="description" placeholder="Description">{{ $abouts ? $abouts->description :'' }}</textarea>
                                        <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="name">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" value="{{ $abouts ? $abouts->name :'' }}" id="name" placeholder="Name here">
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="email">Email <small style="color: red">*</small></label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $abouts ? $abouts->email :'' }}" placeholder="Email here">
                                        <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone <small style="color: red">*</small></label>
                                        <input type="tel" name="phone" class="form-control" id="phone" value="{{ $abouts ? $abouts->phone :'' }}" placeholder="Phone here">
                                        <span style="color: red"> {{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address <small style="color: red">*</small></label>
                                        <input type="text" name="address" class="form-control" id="address" value="{{ $abouts ? $abouts->address :'' }}" placeholder="Address link here">
                                        <span style="color: red"> {{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{ $abouts ? $abouts->dob :'' }}" placeholder="Date of birth here">
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="freelance">Freelance</label>
                                        <input type="text" name="freelance" class="form-control" value="{{ $abouts ? $abouts->freelance :'' }}" id="freelance" placeholder="Freelance here">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="google_ads">Google Ads <small style="color: red">*</small></label>
                                        <input type="number" class="form-control" name="google_ads" value="{{ $abouts ? $abouts->google_ads :'' }}" placeholder="Google Ads here" />
                                        <span style="color: red"> {{ $errors->has('google_ads') ? $errors->first('google_ads') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook">Facebook Ads <small style="color: red">*</small></label>
                                        <input type="number" name="fb_ads" class="form-control" value="{{ $abouts ? $abouts->fb_ads :'' }}" id="fb_ads" placeholder="Facebook Ads here">
                                        <span style="color: red"> {{ $errors->has('fb_ads') ? $errors->first('fb_ads') : ' ' }}</span>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="shopify">Shopify <small style="color: red">*</small></label>
                                        <input type="number" name="shopify" class="form-control" value="{{ $abouts ? $abouts->shopify :'' }}" id="shopify" placeholder="Shopify here">
                                        <span style="color: red"> {{ $errors->has('shopify') ? $errors->first('shopify') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="dropshipping">Dropshipping <small style="color: red">*</small></label>
                                        <input type="number" name="dropshipping" class="form-control" value="{{ $abouts ? $abouts->dropshipping :'' }}" id="dropshipping" placeholder="Dropshipping here">
                                        <span style="color: red"> {{ $errors->has('dropshipping') ? $errors->first('dropshipping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_shopping">Google shopping <small style="color: red">*</small></label>
                                        <input type="number" name="google_shopping" class="form-control" value="{{ $abouts ? $abouts->google_shopping :'' }}" id="google_shopping" placeholder="Google shopping here">
                                        <span style="color: red"> {{ $errors->has('google_shopping') ? $errors->first('google_shopping') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="marketing_strategy">Marketing Strategy <small style="color: red">*</small></label>
                                        <input type="number" name="marketing_strategy" class="form-control" value="{{ $abouts ? $abouts->marketing_strategy :'' }}" id="marketing_strategy" placeholder="Marketing Strategy here">
                                        <span style="color: red"> {{ $errors->has('marketing_strategy') ? $errors->first('marketing_strategy') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" />
                                        @if(isset($abouts->image) != null)
                                        <img src="{{ asset('/about/'.$abouts->image) }}" id="pre-avatar" height="100" width="100" alt="Slider image">
                                        @else
                                        <img src="{{ asset('/backend/assets/default.jpg') }}" id="pre-avatar" height="100" width="100" alt="Slider image">
                                        @endif
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="three_month">3 Month plan</label>
                                        <input type="number" name="three_month" class="form-control" value="{{ $abouts ? $abouts->three_month :'' }}" id="three_month" placeholder="3 Month plan">
                                    </div>
                                    <div class="form-group">
                                        <label for="six_month">6 Month plan</label>
                                        <input type="number" name="six_month" class="form-control" value="{{ $abouts ? $abouts->six_month :'' }}" id="six_month" placeholder="6 Month plan">
                                    </div>
                                    <div class="form-group">
                                        <label for="sales_funnel">Sales Funnel</label>
                                        <input type="number" name="sales_funnel" class="form-control" value="{{ $abouts ? $abouts->sales_funnel :'' }}" id="sales_funnel" placeholder="Sales Funnel">
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
