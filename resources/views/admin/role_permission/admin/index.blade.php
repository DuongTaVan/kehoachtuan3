@extends('layouts.app_master_admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí danh mục Admin
        <small>Admin</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
            @can('user-add')
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('user.add')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
            @endcan
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Name</th>
                      <th>Email</th>
                      <th>Time</th>
	                  <th>Action</th>
	                </tr>
                  @foreach($admins as $admin)
	                <tr>
	                  <td>{{$admin->id}}</td>
	                  <td>{{$admin->name}}</td>
	                  <td>{{$admin->email}}</td>
                      <td>{{$admin->created_at}}</td>
	                  <td>
                          @can('user-edit')
                      <a href="{{route('user.edit',$admin->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                         @endcan
                          @can('user-delete')
                      <a href="{{route('user.delete',$admin->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
                              @endcan
                      </td>
	                
                  @endforeach
                  </tr>
	              </tbody></table>
	            </div>
	        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
