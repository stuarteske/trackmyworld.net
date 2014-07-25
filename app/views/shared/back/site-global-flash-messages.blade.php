@if (Session::has('message'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable" style="margin-left:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    </div><!-- ./col -->
</div>
@endif