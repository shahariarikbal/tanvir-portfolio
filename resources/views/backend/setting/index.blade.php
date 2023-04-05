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
                                <h3 class="text-white">User settings</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $setting ? $setting->id : '' }}">
                                    <div class="form-group">
                                        <label for="title">Title <small style="color: red">*</small></label>
                                        <input type="text" name="title" class="form-control" value="{{ $setting ? $setting->title :'' }}" id="title" placeholder="Title here">
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name <small style="color: red">*</small></label>
                                        <input type="text" name="name" class="form-control" value="{{ $setting ? $setting->name :'' }}" id="name" placeholder="Name here">
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation <small style="color: red">*</small></label>
                                        <input type="text" name="designation" class="form-control"
                                               value="{{ $setting ? $setting->designation :'' }}"
                                               id="designation" placeholder="Designation here">
                                        <span style="color: red"> {{ $errors->has('designation') ? $errors->first('designation') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fb">Facebook Link (Optional)</label>
                                        <input type="url" name="fb" class="form-control" id="fb" value="{{ $setting ? $setting->fb :'' }}" placeholder="Facebook link here">
                                    </div>
                                    <div class="form-group">
                                        <label for="tw">Twitter Link (Optional)</label>
                                        <input type="url" name="tw" class="form-control" id="tw" value="{{ $setting ? $setting->tw :'' }}" placeholder="Twitter link here">
                                    </div>
                                    <div class="form-group">
                                        <label for="in">LinkedIn Link (Optional)</label>
                                        <input type="url" name="in" class="form-control" id="in" value="{{ $setting ? $setting->in :'' }}" placeholder="LinkedIn link here">
                                    </div>
                                    <div class="form-group">
                                        <label for="be">Instagram Link (Optional)</label>
                                        <input type="url" name="be" class="form-control" id="be" value="{{ $setting ? $setting->be :'' }}" placeholder="Instagram link here">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube Link (Optional)</label>
                                        <input type="url" name="youtube" class="form-control" value="{{ $setting ? $setting->youtube :'' }}" id="youtube" placeholder="Youtube link here">
                                    </div>
                                    <div class="form-group">
                                        <label for="active_client">Active Client</label>
                                        <input type="number" name="active_client" class="form-control" value="{{ $setting ? $setting->active_client :'' }}" id="active_client" placeholder="Active client number">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_complete">Project Complete</label>
                                        <input type="number" name="project_complete" class="form-control" value="{{ $setting ? $setting->project_complete :'' }}" id="project_complete" placeholder="Project Complete number">
                                    </div>

                                    <div class="form-group">
                                        <label for="rating">Client rating</label>
                                        <input type="number" name="rating" class="form-control" value="{{ $setting ? $setting->rating :'' }}" id="rating" placeholder="Client Rating number">
                                    </div>

                                    <div class="form-group">
                                        <label for="experience">Experience</label>
                                        <input type="number" name="experience" class="form-control" value="{{ $setting ? $setting->experience :'' }}" id="experience" placeholder="Experience number">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image <small style="color: red">*</small></label>
                                        <input type="file" name="image" class="form-control" onchange="showPreview(this)" id="image" placeholder="Youtube link here">
                                        @if(isset($setting->image) != null)
                                        <img src="{{ asset('/slider/'.$setting->image) }}" id="pre-avatar" height="100" width="100" alt="Slider image">
                                        @else
                                        <img src="{{ asset('/backend/assets/default.jpg') }}" id="pre-avatar" height="100" width="100" alt="Slider image">
                                        @endif
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="certificate">Certificate <small style="color: red">*</small></label>
                                        <input type="file" name="certificate" class="form-control" onchange="showCertificatePreview(this)" id="certificate">
                                        @if(isset($setting->certificate) != null)
                                            <img src="{{ asset('/slider/'.$setting->certificate) }}" id="pre-certificate" height="100" width="100" alt="Certificate image">
                                        @else
                                            <img src="{{ asset('/backend/assets/default.jpg') }}" id="pre-avatar" height="100" width="100" alt="Avatar image">
                                        @endif
                                        <span style="color: red"> {{ $errors->has('certificate') ? $errors->first('certificate') : ' ' }}</span>
                                    </div>
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
