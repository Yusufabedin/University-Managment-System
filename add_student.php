
<?php 
require_once 'assets/admin/student_method.php';
$studentip = new Students();


//students edit
$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
  $edit_student = $studentip->get_student_id($url_param_id);
}

//button Add Student/Update Student Info
if($url_param_id && $_GET['action'] == 'edit'){
  $button_text = 'Update Student Info';
} else {
  $button_text = 'Add Student';
}

 //variables
  $student_id = $edit_student[0]->id ?? rand();
  $name = $_POST['name'] ?? '';
  $date_of_birth = $_POST['bdy'] ?? '';
  $father_name = $_POST['father_name'] ?? '';
  $mother_name = $_POST['mother_name'] ?? '';
  $address = $_POST['address'] ?? '';
  $email_name = $_POST['email_name'] ?? '';
  $mobile_number = $_POST['mobile_number'] ?? '';

if(isset($_POST['submit'])) {
//add students
    if(!$url_param_id){
      $studentip->add_student($name, $date_of_birth, $father_name, $mother_name, $address, $email_name, $mobile_number);
      echo '<h3 class="center green-text">Add Student Successfully</h3>';
     $name = $date_of_birth = $father_name = $mother_name = $address = $email_name = $mobile_number = '';
     //update students
    }elseif($url_param_id && $_GET['action'] == 'edit') {
      $studentip->update_student($student_id,$name, $date_of_birth, $father_name, $mother_name, $address, $email_name, $mobile_number);
      echo '<h3 class="center green-text">Student Information Updated Successfully</h3>';
    
    }
  }

   // Edit Student
    global $wpdb;
    $id = $_GET['id'] ?? 0;
    if ($id) {
        $result = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}all_student WHERE id='{$id}'");
    }
      
     
    ?>

 
<!DOCTYPE html>
<html>
  <head>
    <!-- Let browser know website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!--  Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <!-- Compiled and minified CSS -->
 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
  </head>

  <body>
<div class="container">
  <div class="row">
    <h1 class="center">Add Student</h1>
  <div class="col m6 offset-m3 ">
  <form method="post" id="student">
    <div class="row">
      <div class="input-field col s6">
        <input  type="text" name="name" id="name" class="validate" value="<?php echo $id == true ? $result->name : $name ?>">
        <label for="name">Name</label>
      </div>
       <div class="input-field col s6">
        <label for="bdy">Date of Birth</label>
        <input type="text" name="bdy" class="datepicker" value="<?php echo $id == true ? $result->birth : $date_of_birth ?>">
      </div>
    </div>

    <div class="row">
      <div class="input-field col s6">
        <label for="FatherName">Father Name</label>
        <input  type="text" name="father_name"  class="validate" value="<?php echo $id == true ? $result->father : $father_name ?>">
      </div>
      <div class="input-field col s6">
        <label for="MotherName">Mother Name</label>
        <input type="text" name="mother_name" class="validate" value="<?php echo $id == true ? $result->mother : $mother_name ?>">
      </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <label for="textarea1" class='active'>Address</label>
          <textarea name="address" id="textarea1" class="materialize-textarea" ><?php echo $id == true ? $result->address : $address ?></textarea>
        </div>
  </div>
    <div class="row">
      <div class="input-field col s6">
        <label for="email">Email</label>
        <input id="email" type="email" name="email_name" class="validate" value="<?php echo $id == true ? $result->email : $email_name ?>">
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">phone</i>
        <input id="icon_telephone" type="text" name="mobile_number" class="validate" value="<?php echo $id == true ? $result->phone : $mobile_number ?>">
        <label for="icon_telephone">Mobile Number</label>
      </div>
    </div>
   
<button class="btn waves-effect waves-light" type="submit" name="submit"><?php echo $button_text ?>
  <i class="material-icons right"></i>
</button>
  </form>
 </div>
</div>

</div>
  
     <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>