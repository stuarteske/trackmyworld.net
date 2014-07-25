@if (Session::has('message'))
<div class="notifications col-md-8 col-md-offset-2" style="position:fixed; margin-top: 60px;">
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message') }}
    </div>
</div>
@endif