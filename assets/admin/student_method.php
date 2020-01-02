<?php 
/**
 * data insert method
 */
class Students
{
	
	function __construct()
	{
		
	}

	public function get_every_students() {
			global $wpdb;
			//table name
	        $table_name = $wpdb->prefix."all_student";
			$sql = "SELECT * from $table_name";
			// $every_student = $wpdb->get_results("SELECT * FROM $table");
			$every_student = $wpdb->get_results($sql);
			return $every_student;
			// print_r($every_student); // display data
		}




	public function get_student_id($student_id)
	{
		global $wpdb;
		//table name
        $table_name = $wpdb->prefix."all_student";
        $student =$wpdb->get_results("SELECT * FROM $table_name WHERE $student_id");

        return $student;
	}

	public function add_student($student_name, $student_bdy, $father_name, $mother_name,$address,$email,$mobile_number)
	{


		global $wpdb;
		$table_name = $wpdb->prefix."all_student";
		$data = array('Name' => $student_name,
					 'birth' => $student_bdy,
					 'father' => $father_name,
					 'mother' => $mother_name,
					'address' => $address,
					'email' => $email,
					'phone' =>$mobile_number,
				);
		$format = array('%s','%s', '%s','%s','%s','%s','%s');
		$wpdb->insert($table_name,$data,$format);
	}



	// update_student option

	public function update_student($student_id,$student_name, $student_bdy, $father_name, $mother_name,$address,$email,$mobile_number)
	{


		global $wpdb;
		$table_name = $wpdb->prefix."all_student";
		$data = array(
					'id' =>$student_id,
					'Name' => $student_name,
					 'birth' => $student_bdy,
					 'father' => $father_name,
					 'mother' => $mother_name,
					'address' => $address,
					'email' => $email,
					'phone' =>$mobile_number,
				);
		$where =array('id' => $student_id);
		$wpdb->update($table_name,$data,$where);
	}






	public function delete_student($student_id) {
		global $wpdb;
		$table_name = $wpdb->prefix.'all_student';
		$data = array('id' => $student_id);
		$wpdb->delete($table_name,$data);
	}


}

 ?>

