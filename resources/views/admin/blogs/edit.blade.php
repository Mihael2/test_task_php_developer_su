@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit blog:</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <form method="POST" action="#" id="edit_blog_form" class="w-25">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text " class="form-control" id="name" name="name" placeholder="Enter blog name"
            value="{{ $blog->name}}">
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="exampleInputEmail1">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Enter blog description"
            value="{{ $blog->description}}">
            @error('description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" value="{{ $blog->user_id}}" id="user_id" name="user_id" class="form-control" name="name">
            <input type="hidden" value="{{ $blog->id}}" name="blog_id" id="blog_id" class="form-control" name="name">
          </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <script src="{{ asset('main.js')}}"></script> -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<script>
  jQuery(document).ready(function() {
    jQuery('#edit_blog_form').submit(function(e) {
      e.preventDefault();
      let id = jQuery('#blog_id').val();
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "/admin/blog/"+id,
        method: 'POST',
        data: {
          name: jQuery('#name').val(),
          description: jQuery('#description').val(),
          user_id: jQuery('#user_id').val(),
          _method: 'PATCH'
        },
        success: function(result) {
          alert('Blog updated successfully!');
        }
      });
    });
  });
</script>


@endsection