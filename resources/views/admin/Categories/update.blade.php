@extends('layouts.app_master_admin')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form</h4>
        <p class="card-description">
          Basic form elements
        </p>
      <form action="{{route('admin.category.update',$category->id)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
          <input type="text" name="c_name" value="{{$category->c_name}}" class="form-control" id="exampleInputName1" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Avatar</label>
            <p><input type="file" accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
            <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
          <p><img id="output" src="{{$category->c_avatar}}" width="200" /></p>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
@stop
