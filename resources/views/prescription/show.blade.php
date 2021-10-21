@extends('admin.layouts.master')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header" >   
            </div>
                <div class="card-body">                        
                    <p>Date:{{$prescription->date}}</p>
                    <p>Patient:{{$prescription->user->name}}</p>
                    <p>Doctor:{{$prescription->doctor->name}}</p>
                    <p>Disease:{{$prescription->name_of_disease}}</p>
                    <p>Symptoms:{{$prescription->symptoms}}</p>
                    <p>Medicine:{{$prescription->medicine}}</p>
                    <p>Proedure to use medicine:{{$prescription->procedure_to_use_medicine}}</p>
                    <p>Feedback:{{$prescription->feedback}}</p> 
                    <p>Doctor signature:{{$prescription->signature}}</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">IP : {{$prescription->prescription_identif}}</h5>
        <h5 class="modal-title" style="margin-left:80px">OBSERVATION MEDICALE</h5>
        <h5 class="text-right">Le:{{$prescription->date}}</h5>
      </div>
</div> -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="modal-content" style="border:0px solid rgba(0, 0, 0, 0.2);">
        <div class="modal-header">
            <h5 class="modal-title">IP : {{$prescription->prescription_identif}}</h5>
            <h5 class="modal-title" style="margin-left:80px">DOSSIER DE PATIENT</h5>
            <h5 class="text-right">Le:{{$prescription->date}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">IDENTITE :</h5>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><img class="rounded-circle" width="80px" src="/profile/{{$prescription->user->image}}"></div>
                     <div class="col-md-6"><label class="labels" style="margin-top:10px">Mr/Mme {{$prescription->user->name}}</label></div>
                </div>
                <br>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">CIN : {{$prescription->cin}}</label></div>
                    <div class="col-md-6"><label class="labels">Sexe : {{$prescription->sexe}}</label></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Age : {{$prescription->age}}</label></div>
                    <div class="col-md-6"><label class="labels">Originaire : {{$prescription->originaire}}</label></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Résidente : {{$prescription->resident}}</label></div>
                    <div class="col-md-6"><label class="labels">phone : {{$prescription->user->phone_number}}</label></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Address :</label>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">{{$prescription->user->address}}</label>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email :</label>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">{{$prescription->user->email}}</label>                    
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Situation familiale :</label>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">{{$prescription->situation_familiale}}</label>                    
                    </div>
                </div>
                <br>    
                <div class="d-flex justify-content-between align-items-center mb-3">
                     <h5 class="text-right">ATCDS :</h5>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">-PERSONNELS :</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Tabac : {{$prescription->tabac}}</label></div>
                    <div class="col-md-6"><label class="labels">Alcool : {{$prescription->alcool}}</label></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Autre : {{$prescription->autre}}</label></div>
                    <div class="col-md-6"><label class="labels">Vaccination : {{$prescription->vaccination}}</label></div>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">-ENTOURAGE :</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Tabagisme Passif : {{$prescription->tabagisme_passif}}</label></div>
                    <div class="col-md-6"><label class="labels">Animaux Domestiques : {{$prescription->animaux_domestiques}}</label></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">Examen Clinique :</h5>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">-Conjonctives normo colorées :</h6>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"><label class="labels">Poids : {{$prescription->poids}} </label></div>
                    <div class="col-md-4"><label class="labels">Taille : {{$prescription->taille}}</label></div>
                    <div class="col-md-4"><label class="labels">son groupe : {{$prescription->bloodtype}}</label></div>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-right">-Etat generale :</h6>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Informations : </label></div>
                    <div class="col-md-12"><label class="labels">{{$prescription->info}}</label></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">Examen neurologique :</h5>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Avis neurologie : </label></div>
                    <div class="col-md-12"><label class="labels">{{$prescription->avis_neur}}</label></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">Examen cardiologique :</h5>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12"><label class="labels">Avis cardiologie : </label></div>
                    <div class="col-md-12"><label class="labels">{{$prescription->avis_card}}</label></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>
@endsection
