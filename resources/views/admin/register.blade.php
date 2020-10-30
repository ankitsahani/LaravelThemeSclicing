@extends('layouts.master')

@section('title')

Registered Roles

@endsection

@section('content')
   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Registered Roles</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Sr.No</th>
                      <th> Name</th>
                      <th>  Phone </th>
                      <th>  Email </th>
                      <th>  USERTYPE </th>
                      <th>  EDIT </th>
                      <th > DELETE</th>
                    </thead>
                    <tbody>
                      @foreach($users as $key=>$row)
                      <tr>
                        <td> {{ $key+1}}</td>
                        <td> {{ $row->name}}</td>
                        <td> {{ $row->phone}}</td>
                        <td> {{ $row->email}} </td>
                        <td> {{ $row->usertype}} </td>
                        <td><a href="/role-edit/{{ $row->id }}" class="btn btn-success">EDIT</a></td>

                        <td>
                          <form action="/role-delete/{{ $row->id }}" method="post">
                            {{ csrf_field() }}
                             {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $row->id}}">
                            <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
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








@endsection