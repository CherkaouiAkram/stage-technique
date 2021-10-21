<!-- Modal -->
<div class="modal fade" id="editModal{{$patient->prescription_identif}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <form action="{{route('prescription.edit',[$patient->id])}}" method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Dossier de patient</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <h5 style="margin-right:570px; font-weight:bold">Informations générales</h5>
      <div class="modal-body" id="app">
        <p style="margin-right:685px; font-weight:bold; text-decoration: underline">IDENTITE</p>
        <!-- <input type="hidden" name="id" value="{{$patient->id}}">
        <input type="hidden" name="user_id" value="{{$patient->user_id}}">
        <input type="hidden" name="doctor_id" value="{{$patient->doctor_id}}">
        <input type="hidden" name="date" value="{{$patient->date}}">
        <input type="hidden" name="time" value="{{$patient->time}}">
        <input type="hidden" name="booking_id" value="{{$patient->id}}">
        <input type="hidden" name="prescription_identif" id="myvalue"> -->

        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="sexe" class="form-control" placeholder="sexe" required="" value="{{$patient->sexe}}" ></textarea>
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
             <textarea name="cin" class="form-control" placeholder="cin" required="" value="{{$patient->cin}}"></textarea>
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
        <p style="margin-right:700px; font-weight:bold; text-decoration: underline">ATCDS</p>
        <p style="margin-right:645px">-PERSONNELS: </p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="tabac" class="form-control" placeholder="tabac " ></textarea>
            </div>
            <div class="col-sm">
              <textarea name="alcool" class="form-control" placeholder="alcool" ></textarea>
            </div>
            <div class="col-sm">
             <textarea name="autre" class="form-control" placeholder="autre" ></textarea>  
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="vaccination" class="form-control" placeholder="vaccination"></textarea>
            </div>
          </div>
        </div>
        <br>
        <p style="margin-right:665px">-FAMILIAUX: </p>
        <div class="container">
        <div class="row">
        <div class="col-sm">
            <textarea name="antfam" class="form-control" placeholder="Antecedants familiaux"></textarea>
        </div>
        </div>
        </div>
        <br>
        <p style="margin-right:655px">-ENTOURAGE: </p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="tabagisme_passif" class="form-control" placeholder="Tabagisme passif" ></textarea>
            </div>
            <div class="col-sm">
              <textarea name="animaux_domestiques" class="form-control" placeholder="Animaux Domestiques"></textarea>
            </div>
          </div>
        </div>
        <br>
        <hr>
        <h5 style="margin-right:610px; font-weight:bold">Examen Clinique</h5>
        <p style="margin-right:560px; font-weight:bold; text-decoration: underline">Conjonctives normo colorées</p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="poids" class="form-control" placeholder="Poids" ></textarea>
            </div>
            <div class="col-sm">
              <textarea name="taille" class="form-control" placeholder="Taille"></textarea>
            </div>
            <div class="col-sm">
             <textarea name="bloodtype" class="form-control" placeholder="Blood type"></textarea>
            </div>
          </div>
        </div>
        <br>
        <p style="margin-right:645px; font-weight:bold; text-decoration: underline">ETAT GENERAL</p>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="info" class="form-control" placeholder="information"></textarea>
            </div>
          </div>
        </div>
        <hr>
        <h5 style="margin-right:560px; font-weight:bold">Examen neurologique</h5>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="avis_neur" class="form-control" placeholder="Avis neurologie"></textarea>
            </div>
          </div>
        </div>
        <hr>
        <h5 style="margin-right:555px; font-weight:bold">Examen cardiologique</h5>
        <div class="container">
          <div class="row">
            <div class="col-sm">
             <textarea name="avis_card" class="form-control" placeholder="Avis cardiologie"></textarea>
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
 
    <!-- <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dossier de patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">
        
        <input type="hidden" name="id" value="{{$patient->id}}">
        <input type="hidden" name="user_id" value="{{$patient->user_id}}">
        <input type="hidden" name="doctor_id" value="{{$patient->doctor_id}}">
        <input type="hidden" name="date" value="{{$patient->date}}">
        <input type="hidden" name="time" value="{{$patient->time}}">
        <input type="hidden" name="booking_id" value="{{$patient->id}}">
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
             <textarea name="situation_familiale" class="form-control" placeholder="situation" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="sexe" class="form-control" placeholder="sexe" required=""></textarea>
            </div>
            <div class="col-sm">
              <textarea name="age" class="form-control" placeholder="Age" required=""></textarea>
            </div>
            <div class="col-sm">
             <textarea name="situation_familiale" class="form-control" placeholder="situation" required=""></textarea>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label>Disease</label>
            <input type="text" name="name_of_disease" class="form-control" required="">
        </div>
          <div class="form-group">
            <label>Symptoms</label>
         
            <textarea name="symptoms" class="form-control" placeholder="symptoms" required=""></textarea>
        </div>

         <div class="form-group">
          <label>Medicine</label>
          <add-btn></add-btn>
          
        </div> -->
          <!-- <div class="form-group">
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
    </div> --> 
