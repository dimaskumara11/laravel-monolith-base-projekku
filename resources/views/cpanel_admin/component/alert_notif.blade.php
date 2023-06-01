@if (!empty(((session("error")??[]))))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-md alert-danger text-white" id="alert_message_notification" style="cursor: pointer">
            <label for="" class="text-white">WARNING ::</label>
            @foreach ((session("err_alert_msg")??[]) as $value)
                <li type="-"><label for="" class="text-white">{{$value[0]??""}}</label></li>
            @endforeach
        </div>
    </div>
</div>
@endif
@if (!empty(((session("success")??[]))))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-md alert-success text-white ml-1 mr-1" id="alert_message_notification" style="cursor: pointer">
            <label for="" class="text-white">SUCCESS ::</label>
            @foreach ((session("success_alert_msg")??[]) as $value)
                <li type="-"><label for="" class="text-white">{{($value[0]??"")}}</label></li>
            @endforeach
        </div>
    </div>
</div>
@endif