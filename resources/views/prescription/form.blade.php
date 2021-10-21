@if(count($bookings)>0)
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{route('prescription')}}" method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dossier de patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">

        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
        <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
        <input type="hidden" name="date" value="{{$booking->date}}">
        <input type="hidden" name="time" value="{{$booking->time}}">
        <input type="hidden" name="booking_id" value="{{$booking->id}}">
        <input type="hidden" name="prescription_identif" id="myvalue">
        
        <div class="form-group">
            <label>Disease</label>
            <input type="text" name="name_of_disease" class="form-control" required="">
        </div>
          <div class="form-group">
            <label>Symptoms</label>
         
            <textarea name="symptoms" class="form-control" placeholder="symptoms" required=""></textarea>
        </div>


        <div class="form-group">
            <label>Procedure to use medicine</label>
           
              <textarea name="procedure_to_use_medicine" class="form-control" placeholder="Procedure to use medicine" required=""></textarea>
        </div>
          <div class="form-group">
            <label>Feedback</label>
            
            <textarea name="feedback" class="form-control" placeholder="feedback" required=""></textarea>


        </div>
        <div class="form-group">
            <label>Signature</label>
            <input type="text" name="signature" class="form-control" required="">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div> -->
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{route('prescription')}}" method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dossier de patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">
      <h5 style="font-weight:bold">Informations générales</h5>
      <p style="font-weight:bold; text-decoration: underline">IDENTITE</p>

        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
        <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
        <input type="hidden" name="date" value="{{$booking->date}}">
        <input type="hidden" name="time" value="{{$booking->time}}">
        <input type="hidden" name="booking_id" value="{{$booking->id}}">
        <input type="hidden" name="prescription_identif" id="myvalue">

        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="sexe" class="form-control" placeholder="sexe" required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="age" class="form-control" placeholder="Age" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="situation_familiale" class="form-control" placeholder="situation_familiale" required=""></textarea>
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="cin" class="form-control" placeholder="cin" required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="resident" class="form-control" placeholder="Resident" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="originaire" class="form-control" placeholder="Originaire" required=""></textarea>
            </div>
          </div>
        </div>
        <br>  
        <p style="font-weight:bold; text-decoration: underline">ATCDS</p>
        <p>-PERSONNELS: </p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="tabac" class="form-control" placeholder="tabac " required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="alcool" class="form-control" placeholder="alcool" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="autre" class="form-control" placeholder="autre" required=""></textarea>  
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="vaccination" class="form-control" placeholder="vaccination" required=""></textarea>
            </div>
          </div>
        </div>
        <br>
        <p>-FAMILIAUX: </p>
        <div class="container">
        <div class="row">
        <div class="col-sm">
            <textarea name="antfam" class="form-control" placeholder="Antecedants familiaux" required=""></textarea>
        </div>
        </div>
        </div>
        <br>
        <p>-ENTOURAGE: </p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="tabagisme_passif" class="form-control" placeholder="Tabagisme passif" required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="animaux_domestiques" class="form-control" placeholder="Animaux Domestiques" required=""></textarea>
            </div>
          </div>
        </div>
        <br>
        <hr>
        <h5 style=" font-weight:bold">Examen Clinique</h5>
        <p style="font-weight:bold; text-decoration: underline">Conjonctives normo colorées</p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="poids" class="form-control" placeholder="Poids" required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="taille" class="form-control" placeholder="Taille" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="bloodtype" class="form-control" placeholder="Blood type" required=""></textarea>
            </div>
          </div>
        </div>
        <br>
        <p style=" font-weight:bold; text-decoration: underline">ETAT GENERAL</p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="info" class="form-control" placeholder="information" required=""></textarea>
            </div>
          </div>
        </div>
        <hr>
        <h5 style=" font-weight:bold">Examen neurologique</h5>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="avis_neur" class="form-control" placeholder="Avis neurologie" required=""></textarea>
            </div>
          </div>
        </div>
        <hr>
        <h5 style=" font-weight:bold">Examen cardiologique</h5>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="avis_card" class="form-control" placeholder="Avis cardiologie" required=""></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endif