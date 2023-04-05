@extends('backend.master')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="content">
            <div class="col-md-12" style="margin-top: 5%; margin-bottom: 5%">
                @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('error') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="text-white">Contact list</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr class="bg-primary">
                                    <td class="text-white">Sl</td>
                                    <td class="text-white">Name</td>
                                    <td class="text-white">Email</td>
                                    <td class="text-white">Subject</td>
                                    <td class="text-white">Message</td>
                                    <td class="text-white">Action</td>
                                </tr>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->subject }}</td>
                                    <td>{{ Str::substr($value->message, 0, 20) }}</td>
                                    <td>
                                        <form action="{{ route('contact.destroy', $value->id) }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
@endsection
