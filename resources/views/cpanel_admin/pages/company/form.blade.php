@extends('cpanel_admin.template_admin')

@section('content')
<div class="page-wrapper">
    <div class="row">
        <div class="col-12">
            <form action="{{route("cpanel_admin.master.company.post")}}{{$id?"/$id":""}}" method="post">
                @csrf
                <input type="text" class="form-control d-none" name="logo" value="{{old("logo")}}" id="target-post-file-media" required>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Company</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Logo</label>
                                <img src="https://placehold.co/100x100" data-src="" alt="" srcset="" width="100%" class="rounded" id="preview-image-media">
                                <div class="row mt-2">
                                    <div class="col-3 pr-1">
                                        <input type="hidden" name="" value="company" id="folder-upload-media">
                                        <button type="button" class="btn btn-info w-100" title="UPLOAD YOUR FILE" id="button-upload-media"><span class="feather icon-upload"></span></button>
                                    </div>
                                    <div class="col-9 pl-1">
                                        <button type="button" class="btn btn-warning w-100" id="button-media"><span class="feather icon-image"></span> MY GALERY</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Sector</label>
                                        <select class="form-control" name="sector_id" required>
                                            <option value="">Select Your Choice</option>
                                            @foreach ($sector??[] as $item => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old("name",($data->name??""))}}" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Owner Name</label>
                                        <input type="text" class="form-control" name="owner_name" value="{{old("owner_name",($data->owner_name??""))}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a type="button" href="{{route("cpanel_admin.master.company.list")}}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addJs')
@endpush