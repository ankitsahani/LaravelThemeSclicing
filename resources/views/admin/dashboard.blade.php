@extends('layouts.master')

@section('title')

Dashboard

@endsection

@section('content')
   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> Name</th>
                      <th>  Phone </th>
                      <th>  Email </th>
                      
                    </thead>
                    <tbody>
                      <tr>
                        <td> Ankit sahani </td>
                        <td>8874261769 </td>
                        <td>email@gmail.com </td>
                        
                      </tr>
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