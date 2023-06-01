@extends('cpanel_admin.template_admin')

@section('content')
<div class="page-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 align=center class="font-weight-bold" style="line-height: 40px"><img src="{{env('APP_URL')}}/assets/images/logo.png" width="80" height="80" alt=""> <br> <br> SAY WORDS FOR THIS TITLE</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addJs')
<script>
</script>
@endpush