@extends('layouts.app_master_admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category</h4>
        <p class="card-description">
        <a class="btn btn-success" href="{{route('admin.category.create')}}">Create</a>
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Avatar</th>
                <th>Hot</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as  $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->c_name}}</td>
                <td>{{$category->c_slug}}</td>
                <td><img src="{{$category->c_avatar}}" alt=""></td>
                <td>
                  @if($category->c_hot==1)
                  <a href="{{route('admin.category.hot',$category->id)}}" class="badge badge-info">Hot</a>
                  @else
                    <a href="{{route('admin.category.hot',$category->id)}}" class="badge badge-danger">None</a> 
                
                  @endif
              </td>
                <td>
                  <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                  <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a> 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
