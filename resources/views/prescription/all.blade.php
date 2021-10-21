@extends('admin.layouts.master')
@section('content')

<!--0-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
              @endif
              <div class="card-header" >
       
                     Appointment ({{$bookings->count()}})
              </div>
              <div class="card-body">
                  <table  id="data_table" class="table table-striped">
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
                        <th scope="col">Status</th>
                        <th scope="col">Prescription</th>

                      </tr>
                    </thead>
                    <tbody>
                      @forelse($bookings as $key=>$booking)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;"></td>
                        <td>
                            {{$booking->date}}                            
                        </td>
                        <td>{{$booking->user->name}}</td>
                        <td>{{$booking->user->email}}</td>
                        <td>{{$booking->user->phone_number}}</td>
                        <td>{{$booking->user->gender}}</td>
                        <td>{{$booking->time}}</td>
                        <td>{{$booking->doctor->name}}</td>
                        <td>
                          @if($booking->status==1)
                            checked
                          @else
                            pending
                          @endif
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                      
                          @if(!App\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                            Write prescription
                          </button>
                          @include('prescription.form')

                          @else 
                          <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary">View prescription</a>
                          @endif    
                        </td>
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



<!--1-->


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




<!--2-->



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
                    Les dossier de patient que vous avez criez ({{$patients->count()}})
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
                          <th scope="col">Status</th>
                          <th scope="col">Dossier</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
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
                          <td>
                            @if($patient->status==1)
                             checked
                            @else
                             pented
                            @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->

                            <div class="table-actions">
                                <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}">
                                <i class="ik ik-eye"></i>
                                </a>
                                <a href="{{route('prescription.edit',[$patient->id])}}" data-toggle="modal" data-target="#editModal{{$patient->prescription_identif}}" >
                                  <i class="ik ik-edit-2"></i>
                                </a>
                                @include('prescription.edit')

                            </div>
              
                          <!--<a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View dossier</a>     
                          -->

                          </td>
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

<!--3-->

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
                          <th scope="col">Status</th>
                          <th scope="col">Dossier</th>

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
                          <td>
                            @if($patient->status==1)
                             checked
                            @else
                             pented
                            @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
              
                          <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View dossier</a>     
                          </td>
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





<!--4-->



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
                          <th scope="col">Status</th>
                          <th scope="col">Dossier de patient</th>
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
                          <td>
                            @if($patient->status==1)
                             checked
                            @else
                             pented
                            @endif
                          </td>
                          
                          <td>

                          <!-- Button trigger modal -->
                          
                          <form action="{{route('access')}}" method="post">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="prescription_id" value="{{$patient->id}}">
                            <button type="submit" class="btn btn-secondary" id="change_valu_with">demader l'acces</button>
                          </form>   

                          </td>

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


<script src="{{ asset('js/app.js') }}"defer></script>


@endsection

<!--
  SELECT * FROM accesses as a JOIN prescriptions as p On a.prescription_id = p.id
WHERE ( p.doctor_id = 9 or (a.prescription_id IN (SELECT prescription_id from accesses 
WHERE doctor_id = 9 and status = 1))) and a.status = 0



-->

