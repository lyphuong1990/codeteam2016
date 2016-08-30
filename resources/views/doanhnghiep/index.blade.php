@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Tạo hồ sơ</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('doanhnghiep.create') }}"> Create New User</a>
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
	@foreach ($data as $key => $dn)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $dn->mst }}</td>
		<td>{{ $dn->ten_dn }}</td>
		<td>{{ $dn->dia_chi }}</td>
		<td>{{ $dn->dt_dn }}</td>
		<td>{{ $dn->email }}</td>
		<td>{{ $dn->n_daidien }}</td>
		<td>{{ $dn->so_tien }}</td>
		<td>{{ $dn->loai_goi }}</td>
		<td>{{ $dn->so_nam }}</td>
		<td>{{ $dn->user_id }}</td>
		<td>{{ $dn->user_name }}</td>
		<td>{{ $dn->trang_thai }}</td>

		<td>
			<a class="btn btn-info" href="{{ route('doanhnghiep.show',$dn->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('doanhnghiep.edit',$dn->id) }}">Edit</a>
			<a class="btn btn-primary" href="{{ route('testphpw.index',$dn->id) }}">docx</a>
			{!! Form::open(['method' => 'DELETE','route' => ['doanhnghiep.destroy', $dn->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection