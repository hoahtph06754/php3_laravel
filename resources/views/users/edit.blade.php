@extends('layouts')
@section('content')
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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

		<form action="{{ route('users.update',['id'=>$user->id]) }}" method="POST">
      @csrf
		 	<div>
				<label>Name</label>
				<input type="text" name="name" value="{{ $user->name }}" />
			</div>
			<div>
				<label>Email</label>
				<input type="text" name="email" value="{{ $user->email }}"/>
			</div>
			<div>
				<label>Birthday</label>
				<input type="date" name="birthday" value="{{ $user->birthday }}"/>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>

    </section>
    <!-- /.content -->
  </div>

@endsection