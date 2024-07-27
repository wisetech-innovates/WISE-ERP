<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }



    // The function below insert into student house //
    function createStudentHouse(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'description'      => html_escape($this->input->post('description'))
	    );

        $this->db->insert('house', $page_data);
    }

// The function below update student house //
    function updateStudentHouse($param2){
        $page_data = array(
            'name'         => html_escape($this->input->post('name')),
            'description'  => html_escape($this->input->post('description'))
	    );

        $this->db->where('house_id', $param2);
        $this->db->update('house', $page_data);
    }

    // The function below delete from student house table //
    function deleteStudentHouse($param2){
        $this->db->where('house_id', $param2);
        $this->db->delete('house');
    }



    // The function below insert into student category //
    function createstudentCategory(){

        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );
        $this->db->insert('student_category', $page_data);
    }

// The function below update student category //
    function updatestudentCategory($param2){
        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );

        $this->db->where('student_category_id', $param2);
        $this->db->update('student_category', $page_data);
    }

    // The function below delete from student category table //
    function deletestudentCategory($param2){
        $this->db->where('student_category_id', $param2);
        $this->db->delete('student_category');
    }




    //  the function below insert into student table    
    function createNewStudent() {
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        // Validate and sanitize input data
        $page_data = array(
            'roll_no'                 => html_escape($this->input->post('roll_no')),
            'name'                    => html_escape($this->input->post('name')),
            'birthday'                => html_escape($this->input->post('birthday')),
            'age'                     => html_escape($this->input->post('age')),
            'sex'                     => html_escape($this->input->post('sex')),
            'religion'                => html_escape($this->input->post('religion')),
            'address'                 => html_escape($this->input->post('address')),
            'phone'                   => html_escape($this->input->post('phone')),
            'email'                   => html_escape($this->input->post('email')),
            'password'                => sha1($this->input->post('password')),
            'father_name'             => html_escape($this->input->post('father_name')),
            'father_cnic'             => html_escape($this->input->post('father_cnic')),
            'mother_name'             => html_escape($this->input->post('mother_name')),
            'class_id'                => html_escape($this->input->post('class_id')),
            'section_id'              => html_escape($this->input->post('section_id')),
            'am_date'                 => html_escape($this->input->post('am_date')),
            'annualCharges'           => html_escape($this->input->post('annualCharges')),
            'actualFee'               => html_escape($this->input->post('actualFee')),
            'previousPendingCharges'  => html_escape($this->input->post('previousPendingCharges')),
            'remainingFee'            => html_escape($this->input->post('remainingFee')),
            'tran_cert'               => html_escape($this->input->post('tran_cert')),
            'dob_cert'                => html_escape($this->input->post('dob_cert')),
            'physical_h'              => html_escape($this->input->post('physical_h')),
        );
    
        // Debug input data
        print_r($page_data);
    
        // Insert into database
        if ($this->db->insert('student', $page_data)) {
            $student_id = $this->db->insert_id();
            if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg')) {
                    echo "File uploaded successfully";
                } else {
                    echo "Failed to move uploaded file";
                }
            } else {
                echo "Upload failed with error code " . $_FILES['userfile']['error'];
            }
        } else {
            echo "Failed to insert data into database";
        }
    }
    


    //the function below update student
    function updateNewStudent($param2) {
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        // Validate and sanitize input data
        $page_data = array(
            'roll_no'                => html_escape($this->input->post('roll_no')),
            'name'                   => html_escape($this->input->post('name')),
            'birthday'               => html_escape($this->input->post('birthday')),
            'age'                    => html_escape($this->input->post('age')),
            'sex'                    => html_escape($this->input->post('sex')),
            'religion'               => html_escape($this->input->post('religion')),
            'address'                => html_escape($this->input->post('address')),
            'phone'                  => html_escape($this->input->post('phone')),
            'email'                  => html_escape($this->input->post('email')),
            'father_name'            => html_escape($this->input->post('father_name')),
            'father_cnic'            => html_escape($this->input->post('father_cnic')),
            'mother_name'            => html_escape($this->input->post('mother_name')),
            'class_id'               => html_escape($this->input->post('class_id')),
            'section_id'             => html_escape($this->input->post('section_id')),
            'am_date'                => html_escape($this->input->post('am_date')),
            'annualCharges'          => html_escape($this->input->post('annualCharges')),
            'actualFee'              => html_escape($this->input->post('actualFee')),
            'previousPendingCharges' => html_escape($this->input->post('previousPendingCharges')),
            'remainingFee'           => html_escape($this->input->post('remainingFee')),
            'tran_cert'              => html_escape($this->input->post('tran_cert')),
            'dob_cert'               => html_escape($this->input->post('dob_cert')),
            'physical_h'             => html_escape($this->input->post('physical_h'))
        );
    
        // Update the student record in the database
        $this->db->where('student_id', $param2);
        $this->db->update('student', $page_data);
    
        // Handle the file upload for the student image
        if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2 . '.jpg');
        }
    }
    

    // the function below deletes from student table
    function deleteNewStudent($param2){
        $this->db->where('student_id', $param2);
        $this->db->delete('student');
    }

	


	
	
}

