<?php
    include 'php/funcoes.php';
    $status_data = getStatus();
    $position_data = getPositions();
    if(isset($_GET['id_to_edit'])){
      $all_data = getEdit($_GET['id_to_edit']);
    }
    include 'php/header.php';
?>

<form id="formulario">
  <!-- 1º linha form -->
  <div class="form-row">
    <div class="form-group col">
      <label for="name">Name <span style="color: #6d7fcc; font-weight: 700;">*</span></label>
      <input type="Text" class="form-control" id="name" placeholder="Your name ..." value="<?php echo isset($_GET['id_to_edit']) ? $all_data['name'] : '' ?>">
    </div>
  </div>

  <!-- 2º linha form -->
  <div class="form-row">
    <div class="form-group col">
      <label for="birthdate">Birthdate <span style="color: #6d7fcc; font-weight: 700;">*</span></label>
      <input type="date" class="form-control" id="birthdate" placeholder="Your birthdate ..." value="<?php echo isset($_GET['id_to_edit']) ? explode(' ', $all_data['birthdate'])[0] : '' ?>">
    </div>
  </div>

  <!-- 3º linha form -->
  <div class="form-row">
    <div class="form-group col">
      <label for="address">Address <span style="color: #6d7fcc; font-weight: 700;">*</span></label>
      <input type="Text" class="form-control" id="address" placeholder="Your address ..." value="<?php echo isset($_GET['id_to_edit']) ? $all_data['adress'] : '' ?>">
    </div>
  </div>

  <!-- 4º linha form -->
  <div class="form-row">
    <div class="form-group col-6">
      <label for="status">Status <span style="color: #6d7fcc; font-weight: 700;">*</span></label>
      <select id="status" class="form-control selecionar">
        <option disabled selected hidden value="">--- Select a option ---</option>
        <?php
            foreach($status_data as $row){
              $asd = $row['statusId'] == $all_data['statusId'] ? 'selected' : '';
              echo '<option value="'.$row['statusId'].'" '.$asd.'>'.$row['description'].'</option>';
            }
        ?>
      </select>
    </div>
    <div class="form-group col-6">
      <label for="position">Position <span style="color: #6d7fcc; font-weight: 700;">*</span></label>
      <select id="position" class="form-control selecionar">
        <option disabled selected hidden value="">--- Select a option ---</option>
        <?php
            foreach($position_data as $row){
              $asc = $row['positionId'] == $all_data['positionId'] ? 'selected' : '';
              echo '<option value="'.$row['positionId'].'" '.$asc.'>'.$row['description'].'</option>';
            }
        ?>
      </select>
    </div>
  </div>

  <!-- 5º linha form -->
  <!-- <div class="form-row">
    <div class="form-check col ml-4">
      <input type="checkbox" class="form-check-input" id="exampleCheck1"> 
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
  </div> -->
  
  <div class="form-row">
      <p class="ml-3" style="font-size: 14px;"><span style="color: #6d7fcc; font-weight: 700;">*</span> required fields</p>
  </div>

  <!-- 6º linha form -->
  <div class="form-row d-flex justify-content-center">
    <div class="form-group">
      <button id="botaoInserir" type="button" class="btn btn-info btn-lg" disabled="disabled" value="<?php echo isset($_GET['id_to_edit']) ? $_GET['id_to_edit'] : 'add' ?>" >Submit</button>
    </div>
  </div>
</form>


<?php
    include 'php/footer.php';
?>