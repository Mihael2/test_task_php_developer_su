@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Articles</h1>
                    <a href="{{ route('blog.index')}}">
              <h1 class="m-0">Main</h1>
            </a>
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
                <div class="col-6 mt-3">
                    <div class="card">
                        <a href="{{ route('admin.article.create')}}">
                            <button type="button" class="btn btn-block btn-primary">Add article</button>
                        </a>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Auth::user()->blog->articles as $article)
                                    <tr>
                                        <td>{{ $article->id}}</td>
                                        <td>{{ $article->title}}</td>
                                        <td>
                                            <a href="{{ route('admin.article.edit', $article->id)}}">
                                                <button type="button" class="btn btn-block btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="#" id="article_delete" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $article->id}}" id="article_id" class="form-control">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
    jQuery('#article_delete').submit(function(e) {
      e.preventDefault();
      var id = jQuery('#article_id').val();
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "/admin/articles/"+id,
        type: 'DELETE',
        success: function(result) {
          alert('Article deleted successfully!');
        },
        error: function(err) {
          console.log(err)
        }
      });
    });
  });
</script>
@endsection