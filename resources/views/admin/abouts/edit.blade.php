@extends('layouts.master')

@section('title')

About Us

@endsection

@section('content')



<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">About Us - Edit Data</h4>

            <form action="{{url('abouts-update/'.$abouts->id)}}" method="POST">
		        {{ @csrf_field() }}
		        {{ method_field('PUT')}}
                 
		      <div class="modal-body">
		        
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Title:</label>
		            <input type="text"  name="title" value="{{$abouts->title}}" class="form-control" id="recipient-name">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
		            <input type="text"  name="subtitle" value="{{$abouts->subtitle}}" class="form-control" id="recipient-name">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">Decription:</label>
		            <textarea class="form-control"  name="description" id="message-text">{{$abouts->description}}
		            </textarea>
		          </div>
		       
		      </div>
		      <div class="modal-footer">
		        <a href="{{url('/abouts')}}" class="btn btn-secondary">Back</a> 
		        <button type="submit" class="btn btn-primary">Update</button>

		      </div>
		       </form>
            </div>
        </div>
    </div>
</div>



@endsection
