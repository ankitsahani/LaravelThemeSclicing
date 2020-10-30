@extends('layouts.master')

@section('title')

About Us

@endsection

@section('content')

 
<!-- Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="delete_modal_form" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE')}}
       
      
      <div class="modal-body">
        <input type="hidden" id="delete_abouts_id">
        <h5>Are you sure? You want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes,Delete It.</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save-abouts" method="post">
        {{ @csrf_field() }}

      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text"  name="title" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
            <input type="text"  name="subtitle" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Decription:</label>
            <textarea class="form-control" name="description" id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

      </div>
       </form>
    </div>
  </div>
</div>



   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">About Us</h4>
                 
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >ADD</button>

              </div>
              <style type="text/css">
                .w-10p{
                  width: 10%;
                }
              </style>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="datatable">
                    <thead class=" text-primary">
                      <th class="w-10p"> Id</th>
                      <th class="w-10p" >  Title </th>
                      <th class="w-10p">  Subtitle </th>
                      <th class="w-10p"> Description </th>
                      <th class="w-10p"> EDIT</th>
                      <th class="w-10p"> DELETE </th>
                    </thead>
                    <tbody>
                      @foreach ($abouts as $key=>$data)
                      <tr>
                        <td> {{$key+1}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->subtitle}}</td>
                        <td>
                          <div style="height: 60px; overflow: hidden;">
                            {{$data->description}}
                          </div>
                        </td>
                        <td>
                          <a href="{{url('abouts/'.$data->id)}}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                         <a href="javascript:void(0)" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deletemodalpop">Delete</a>
                        </td>
                        
                      </tr>
                      @endforeach
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('scripts')

<script >
  $(document).ready( function () {
    $('#datatable').DataTable();

    $('#datatable').on('click', '.deletebtn',function (){

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function (){
          return $(this).text();

      }).get();

      $('#delete_abouts_id').val(data[0]);

      $('#delete_modal_form').attr('action','/abouts-delete/'+data[0]);
      $('#deletemodalpop').modal('show');

    });



});
</script>

@endsection