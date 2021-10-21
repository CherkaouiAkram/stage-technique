@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
                    Les patient qui on vous demander l'acces ({{$acc_patients->count()}})
              </div>

                <div class="card-body">
                    <table id="data_table" class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th class="nosort" scope="col">Doctor</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>

                          <th scope="col">departement</th>
                          <th scope="col">identifier</th>
                          <th scope="col">accepter</th>
                          <th scope="col">&nbsp;</th>


                        </tr>
                      </thead>
                      <tbody>
                        @forelse($acc_patients as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$patient->name}}</td>
                          <td>{{$patient->email}}</td>
                          <td>{{$patient->phone_number}}</td>
                          <td>{{$patient->gender}}</td>
                          <td>{{$patient->department}}</td>
                          <td>{{$patient->prescription_identif}}</td>

                          
                          <td>
                              <!-- Button trigger modal -->
              
                          <a href="{{route('prescription.changeStatus',[$patient->identifient])}}" class="btn btn-secondary">accepter</a>     
                          <a href="{{route('prescription.changeStatus_2',[$patient->identifient])}}" class="btn btn-secondary">refuser</a>     
                          </td>
                          <td>x</td>
                        </tr>
                        @empty
                        <td>There is no any appointments !</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection