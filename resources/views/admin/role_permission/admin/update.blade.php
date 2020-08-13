@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa admin
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('user.list')}}">Admin</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	
        
	        <div class="box-body">
	        	<div class="col-md-8">
	          		
			           
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" action="{{route('user.postedit',$admin->id)}}" method="POST">
			            	@csrf
			              
			                <div class="form-group">
			                  <label >Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="name" class="form-control"  placeholder="Name ..." value="{{$admin->name}}">
			                 
			                </div>
			                <div class="form-group">
			                  <label >Email <span class="text-danger">(*)</span></label>
			                  <input type="text" name="email" class="form-control"  placeholder="Name ..." value="{{$admin->email}}">
			                 
			                </div>
			                <div class="form-group">
			                  <label >Password <span class="text-danger">(*)</span></label>
			                  <input type="password" name="password" class="form-control" value="{{$admin->password}}"  placeholder="********">
			                
			                </div>
			         		<div class="form-group">
								<label for="name">Role <span class="text-danger">(*)</span></label>
								<select class="form-control" name="roles[]" multiple="multiple">
									@foreach($roles as $role)
									<option value="{{$role->id}}"
										{{$listRoles->contains($role->id)? 'selected' : ''}}

										>{{$role->name}}</option>
									@endforeach
								</select>
							
							</div>
			              <div class="box-footer text-center">
			                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
			                <a href="{{route('user.list')}}" class="btn btn-primary">Quay lại <i class="fa fa-undo"></i></a>
			              </div>
			            </form>
			        
	            </div>
	        </div>
        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
 