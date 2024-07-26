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
            'roll_no'          => html_escape($this->input->post('roll_no')),
            'name'             => html_escape($this->input->post('name')),
            'birthday'         => html_escape($this->input->post('birthday')),
            'age'              => html_escape($this->input->post('age')),
            'place_birth'      => html_escape($this->input->post('place_birth')),
            'sex'              => html_escape($this->input->post('sex')),
            'm_tongue'         => html_escape($this->input->post('m_tongue')),
            'religion'         => html_escape($this->input->post('religion')),
            'blood_group'      => html_escape($this->input->post('blood_group')),
            'address'          => html_escape($this->input->post('address')),
            'city'             => html_escape($this->input->post('city')),
            'state'            => html_escape($this->input->post('state')),
            'nationality'      => html_escape($this->input->post('nationality')),
            'phone'            => html_escape($this->input->post('phone')),
            'email'            => html_escape($this->input->post('email')),
            'ps_attended'      => html_escape($this->input->post('ps_attended')),
            'ps_address'       => html_escape($this->input->post('ps_address')),
            'ps_purpose'       => html_escape($this->input->post('ps_purpose')),
            'class_study'      => html_escape($this->input->post('class_study')),
            'date_of_leaving'  => html_escape($this->input->post('date_of_leaving')),
            'am_date'          => html_escape($this->input->post('am_date')),
            'tran_cert'        => html_escape($this->input->post('tran_cert')),
            'dob_cert'         => html_escape($this->input->post('dob_cert')),
            'mark_join'        => html_escape($this->input->post('mark_join')),
            'physical_h'       => html_escape($this->input->post('physical_h')),
            'password'         => sha1($this->input->post('password')),
            'father_name'      => html_escape($this->input->post('father_name')),
            'father_cnic'      => html_escape($this->input->post('father_cnic')),
            'mother_name'      => html_escape($this->input->post('mother_name')),
            'class_id'         => html_escape($this->input->post('class_id')),
            'section_id'       => html_escape($this->input->post('section_id')),
            'parent_id'        => html_escape($this->input->post('parent_id')),
            'roll'             => html_escape($this->input->post('roll')),
            'transport_id'     => html_escape($this->input->post('transport_id')),
            'dormitory_id'     => html_escape($this->input->post('dormitory_id')),
            'house_id'         => html_escape($this->input->post('house_id')),
            'student_category_id' => html_escape($this->input->post('student_category_id')),
            'club_id'             => html_escape($this->input->post('club_id')),
            'session'             => html_escape($this->input->post('session')),
            'actualFee'           => html_escape($this->input->post('actualFee')),
            'annualCharges'       => html_escape($this->input->post('annualCharges')),
            'previousPendingCharges'   => html_escape($this->input->post('previousPendingCharges')),
            'remainingFee'        => html_escape($this->input->post('remainingFee')),
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
    function updateNewStudent($param2){
        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'birthday'      => html_escape($this->input->post('birthday')),
            'age'           => html_escape($this->input->post('age')),
            'place_birth'   => html_escape($this->input->post('place_birth')),
            'sex'           => html_escape($this->input->post('sex')),
            'm_tongue'      => html_escape($this->input->post('m_tongue')),
            'religion'      => html_escape($this->input->post('religion')),
            'blood_group'   => html_escape($this->input->post('blood_group')),
            'address'       => html_escape($this->input->post('address')),
            'city'          => html_escape($this->input->post('city')),
            'state'         => html_escape($this->input->post('state')),
            'nationality'   => html_escape($this->input->post('nationality')),
            'phone'         => html_escape($this->input->post('phone')),
            'email'         => html_escape($this->input->post('email')),
            'ps_attended'   => html_escape($this->input->post('ps_attended')),
            'ps_address'    => html_escape($this->input->post('ps_address')),
            'ps_purpose'    => html_escape($this->input->post('ps_purpose')),
            'class_study'   => html_escape($this->input->post('class_study')),
            'date_of_leaving' => html_escape($this->input->post('date_of_leaving')),
            'father_name'     => html_escape($this->input->post('father_name')),
            'father_cnic'     => html_escape($this->input->post('father_cnic')),
            'mother_name'     => html_escape($this->input->post('mother_name')),
            'previousPendingCharges'   => html_escape($this->input->post('previousPendingCharges')),
            'am_date'         => html_escape($this->input->post('am_date')),
            'tran_cert'       => html_escape($this->input->post('tran_cert')),
            'dob_cert'        => html_escape($this->input->post('dob_cert')),
            'mark_join'        => html_escape($this->input->post('mark_join')),
            'physical_h'      => html_escape($this->input->post('physical_h')),
            'class_id'        => html_escape($this->input->post('class_id')),
            'section_id'      => html_escape($this->input->post('section_id')),
            'parent_id'       => html_escape($this->input->post('parent_id')),
            'transport_id'    => html_escape($this->input->post('transport_id')),
            'dormitory_id'    => html_escape($this->input->post('dormitory_id')),
            'house_id'        => html_escape($this->input->post('house_id')),
            'student_category_id' => html_escape($this->input->post('student_category_id')),
            'club_id'             => html_escape($this->input->post('club_id'))
	    );
        $this->db->where('student_id', $param2);
        $this->db->update('student', $page_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2 . '.jpg');

    }

    // the function below deletes from student table
    function deleteNewStudent($param2){
        $this->db->where('student_id', $param2);
        $this->db->delete('student');
    }

	


	
	
}

