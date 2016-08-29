@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sửa DN</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('doanhnghiep.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($dn, ['method' => 'PATCH','route' => ['doanhnghiep.update', $dn->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>MST:</strong>
                {!! Form::text('mst', null, array('placeholder' => 'MST','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên DN:</strong>
                {!! Form::text('ten_dn', null, array('placeholder' => 'Tên DN','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Địa chỉ:</strong>
                {!! Form::textarea('dia_chi', null, array('placeholder' => 'Địa chỉ','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Điện thoại:</strong>
                {!! Form::text('dt_dn', null, array('placeholder' => 'Điện thoại','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Người đại diện:</strong>
                {!! Form::text('n_daidien', null, array('placeholder' => 'Người đại diện','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Số tiền:</strong>
                {!! Form::text('so_tien', null, array('placeholder' => 'Số tiền','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Loại gói:</strong>
                {!! Form::text('loai_goi', null, array('placeholder' => 'Loại gói','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Số năm:</strong>
                {!! Form::text('so_nam', null, array('placeholder' => 'Số năm','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User id:</strong>
                {!! Form::text('user_id', null, array('placeholder' => 'User id','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User name:</strong>
                {!! Form::text('user_name', null, array('placeholder' => 'User name','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Trạng thái</strong>
                {!! Form::text('trang_thai', 0, array('placeholder' => 'trạng thái','class' => 'form-control','style'=>'height:30px')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection