@extends('layouts')
@section('title')
    Starter
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
      <a href="{{ route('users.create') }}" class="btn btn-success">create</a>
        @if(empty($users))
    <p>no data</p>
      @else
        <table class="table">
          <thead>
            <th>Name</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Posts</th>
          </thead>
          <tbody>
            @foreach($users as $user)

              <tr> 
                <td><a href="{{ route('users.show',['id'=>$user['id']]) }}">{{ $user['name'] }}</a></td>
                <td>{{ $user['birthday'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ count($user['posts']) }}</td>
                <td><a href="{{ route('users.edit',['id'=>$user['id']]) }}" class="btn btn-primary">update</a></td>
                <td>
                  <form action="{{ route('users.delete',['id'=>$user['id']]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">delete</button>
                  </form>
                </td>
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