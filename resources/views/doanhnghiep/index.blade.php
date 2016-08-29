@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Tạo hồ sơ</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('words.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>STT</th>
			<th>MST</th>
			<th>Tên DN</th>
			<th>Địa chỉ</th>
			<th>Số ĐT</th>
			<th>Email</th>
			<th>Người đại diện</th>
			<th>Số tiền</th>
			<th>Loại gói</th>
			<th>Người tạo</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('words.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('words.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['words.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection