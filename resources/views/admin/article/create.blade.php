@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create article:</h1>
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
        <form action="#" id="create_article_form" class="w-25">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text " class="form-control" id="title" placeholder="Enter article title">
            <label for="exampleInputEmail1">Content</label>
            <textarea class="form-control" id="content"></textarea>
            <input type="hidden" value="{{ Auth::user()->blog->id}}" id="blog_id" class="form-control" name="name">
          </div>
          <input type="submit" value="Add" class="btn btn-primary">
        </form>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<script>
  jQuery(document).ready(function() {
    jQuery('#create_article_form').submit(function(e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/admin/articles') }}",
        method: 'post',
        data: {
          title: jQuery('#title').val(),
          content: jQuery('#content').val(),
          blog_id: jQuery('#blog_id').val()
        },
        success: function(result) {
          alert('Article created successfully!');
        },
        error: function(error){
          let message = JSON.parse(error.responseText);
          alert(message.message);
        }
      });
    });
  });
</script>

@endsection