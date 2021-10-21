@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(Session::has('message'))
            <div id="alert_message" class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
    @endif
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
                  les autres dossier de patient ({{$all_patients->count()}})
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
                          <th scope="col">doctor </th>
                          <th scope="col">&nbsp;</th>
                          <th scope="col">&nbsp;</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($all_patients as $key=>$patient)
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
                          
                          <form action="{{route('access')}}" method="post">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="prescription_id" value="{{$patient->id}}">
                            <button type="submit" class="btn btn-secondary" id="change_valu_with">request</button>
                          </form>   

                          </td>
                          <td>x</td>
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
