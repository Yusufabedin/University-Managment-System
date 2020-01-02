<?php 
require_once 'student_method.php';
$Students = new Students();
$all_students = $Students->get_every_students();
$studentip = new Students();
$student_id = $_GET['id'] ?? '';

 // Deleted Student

      if($student_id && $_GET['action'] == 'delete') {
      $studentip->delete_student($student_id);
      echo '<h3 class="center green-text">Student Information Deleted</h3>';
      }
      $all_students = $studentip->get_every_students();


?>

<div class="container">
	

              <table class="table table-striped table-advance table-hover">
                <h4 class="center">All Students</h4>

                <hr>
                
                <thead class="pink darken-3">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>FatherName</th>
                    <th>MotherName</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>MobileNumber</th>
                    <th>Actions</th>
                  </tr>
                  
                </thead>



                 <tbody class="cyan lighten-4">
                  <?php foreach($all_students as $student): ?>
                  <tr>
                    <td><?php echo $student->id; ?></td>
                    <td><?php echo $student->name; ?></td>
                    <td><?php echo $student->birth; ?></td>
                    <td><?php echo $student->father; ?></td>
                    <td><?php echo $student->mother; ?></td>
                    <td><?php echo $student->address; ?></td>
                    <td><?php echo $student->email; ?></td>
                    <td><?php echo $student->phone; ?></td> 
                    <td>
                    	<a href="<?php echo admin_url( 'admin.php?page=add_students&id='.$student->id.'&action=edit' ); ?>">Edit</a>
                    	<a href="<?php echo admin_url( 'admin.php?page=all_student&id=' .$student->id.'&action=delete' ); ?>">Delate</a>
                    </td>
                  </tr>

                <?php endforeach; ?>
                  
                </tbody>

              </table>
            

</div>