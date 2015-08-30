@extends('master')
<!-- HEAD -->
@section('title', 'Admin')
@section('stylesheets')
  <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
@endsection
<!-- HEADER -->
<!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;">Admin >> Edit Category</h2>
        </div>
      </div>
@endsection

<!-- CONTENT -->
@section('content')
  <div id="page-content" class="home-slider-content">
  <div class="container">
   <div class="home-with-slide">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/cat">Business Categories</a> » <small>Edit Category</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Category Edit Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')
            @include('admin.partials.success')

            <form class="form-horizontal" role="form" method="POST" action="/admin/cat/{{$cat->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$cat->id}}">

              <div class="form-group">
                <label for="cat" class="col-md-3 control-label">Category</label>
                <div class="col-md-3">
                   {!!Form::select('name', $cats,$cat->name,['class'=>'form-control', 'id'=>'cat_name']) !!}
                </div>
              </div>

              @include('admin.cat._form')

              <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                  <button type="submit" class="btn btn-default-inverse btn-md">
                    <i class="fa fa-save"></i>
                      Save Changes
                  </button></div>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-md"
                          data-toggle="modal" data-target="#modal-delete">
                    <i class="fa fa-times-circle"></i>
                   Delete
                  </button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
      <div class="col-md-3 col-md-pull-9 category-toggle">
                <button><i class="fa fa-briefcase"></i></button>
                <div class="post-sidebar">
                      <div class="latest-post-content">
                          <h2>Admin Panel</h2>
                          <div class="single-product"></div>
                      </div>
                </div>
            </div> <!-- end .page-sidebar -->
    </div>
    </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->

  {{-- Confirm Delete --}}
  <div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Please Confirm</h4>
        </div>
        <div class="modal-body">
          <p> <i class="fa fa-question-circle fa-lg"></i>  
            Are you sure you want to delete this Category?</p>
        </div>
        <div class="modal-footer">
           <form method="POST" action="/admin/cat/{{ $cat->id}}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
              <div class="btn-group" role="group">
            <button type="button" class="btn btn-default-inverse btn-hover"
                    data-dismiss="modal">Close</button></div>
              <div class="btn-group" role="group">
            <button type="submit" class="btn btn-hover">
             Yes
            </button></div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  

@endsection


<!-- SCRIPTS STARTS -->
@section('scripts')
  <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>  
  <script>
    $(document).ready(function() {
        $("button.btn-hover").hover(function(){
          $(this).addClass('animated pulse');
        })
    });
  </script>
@endsection