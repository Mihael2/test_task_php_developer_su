@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create blog:</h1>
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
        <form action="#" method="POST" class="w-25" id="create_blog_form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text " class="form-control" name="name" id="name" placeholder="Enter blog name">
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="exampleInputEmail1">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Enter blog description">
            @error('description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" value="{{ Auth::user()->id}}" name="user_id" id="user_id" class="form-control" name="name">
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
    jQuery('#create_blog_form').submit(function(e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/admin/blog') }}",
        method: 'post',
        data: {
          name: jQuery('#name').val(),
          description: jQuery('#description').val(),
          user_id: jQuery('#user_id').val()
        },
        success: function(result) {
          alert('Blog created successfully!');
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