@extends('layouts')
@section('content')
	<div>
		<form action="{{ route('auth.login') }}" method="POST" class="col-sm-6 col-sm-offset-3" >
			@csrf
			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $errors)
						<li>{{ $errors }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="form-group">
				<label for="email">Email Adress</label>
				<input type="email" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection