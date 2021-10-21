@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
                    Les dossier de patient qui ont etait partager avec({{$dossierPartager->count()}})
              </div>

                <div class="card-body">
                    <table id="data_table" class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th class="nosort" scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>

                          <th scope="col">Time</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">identifient</th>
                          <!-- <th scope="col">Status</th> -->
                          <th scope="col">Dossier</th>
                          <th scope="col">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($dossierPartager as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$patient->user->image}}" width="80" style="border-radius: 50%;"></td>
                          <td>{{$patient->date}}</td>
                          <td>{{$patient->user->name}}</td>
                          <td>{{$patient->user->email}}</td>
                          <td>{{$patient->user->phone_number}}</td>
                          <td>{{$patient->user->gender}}</td>
                          <td>{{$patient->time}}</td>
                          <td>{{$patient->doctor->name}}</td>
                          <td>{{$patient->prescription_identif}}</td>
                          <!-- <td>
                            @if($patient->status==1)
                             checked
                            @else
                             pented
                            @endif
                          </td> -->
                          <td>
                              <!-- Button trigger modal -->
              
                          <!-- <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View dossier </a>      -->
                             <div class="table-actions">
                                <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}">
                                <i class="ik ik-eye"></i>
                                </a>
                                <a href="{{route('prescription.edit',[$patient->id])}}" data-toggle="modal" data-target="#editModal{{$patient->prescription_identif}}" >
                                  <i class="ik ik-edit-2"></i>
                                </a>
                                @include('prescription.edit')

                              </div>  
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
