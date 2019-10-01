@extends('layouts')
@section('title')
    Post
@endsection

@section('content')
<!-- code -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        @if(empty($posts))
    <p>no data</p>
      @else
        <table class="table">
          <thead>
            <th>Content</th>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr> 
                <td>{{ $post['content'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>

@endsection