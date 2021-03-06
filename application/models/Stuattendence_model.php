<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stuattendence_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_date = $this->setting_model->getDateYmd();
    }

    public function get($id = null) {
        $this->db->select()->from('student_attendences');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('student_attendences', $data);
        } else {
            $this->db->insert('student_attendences', $data);
        }
    }

    public function searchAttendenceClassSectionSubject($class_id, $section_id, $date, $subject_id, $batch_id = null) {

        if($batch_id != null){
            $sql = "select student_sessions.attendence_id,students.firstname,student_sessions.date,student_sessions.remark,students.hall_no,students.admission_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, attendence_type.type as `att_type`,attendence_type.key_value as `key` from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark, IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id FROM `student_session` LEFT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " and student_attendences.subject_id=". $this->db->escape($subject_id)." where  student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . " and student_session.batch_id=" . $this->db->escape($batch_id)  .") as student_sessions   LEFT JOIN attendence_type ON attendence_type.id=student_sessions.attendence_type_id where student_sessions.student_id = students.id and students.is_active = 'yes' ";
        }else {
            $sql = "select student_sessions.attendence_id,students.firstname,student_sessions.date,student_sessions.remark,students.hall_no,students.admission_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, attendence_type.type as `att_type`,attendence_type.key_value as `key` from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark, IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id FROM `student_session` LEFT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " and student_attendences.subject_id=".$this->db->escape($subject_id)." where  student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . ") as student_sessions   LEFT JOIN attendence_type ON attendence_type.id=student_sessions.attendence_type_id where student_sessions.student_id = students.id and students.is_active = 'yes' ";
        }
        

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function searchAttendenceReportSubject($class_id, $section_id, $date, $subject_id, $batch_id = null) {

        if($batch_id){
            $sql = "select student_sessions.attendence_id,students.firstname,student_sessions.date,student_sessions.remark,students.hall_no,students.admission_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, attendence_type.type as `att_type`,attendence_type.key_value as `key` from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark, IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id FROM `student_session` LEFT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " and student_attendences.subject_id=". $this->db->escape($subject_id)." where  student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . " and student_session.batch_id=" . $this->db->escape($batch_id) . ") as student_sessions   LEFT JOIN attendence_type ON attendence_type.id=student_sessions.attendence_type_id where student_sessions.student_id=students.id  and students.is_active = 'yes' ";
        }else {
            $sql = "select student_sessions.attendence_id,students.firstname,student_sessions.date,student_sessions.remark,students.hall_no,students.admission_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, attendence_type.type as `att_type`,attendence_type.key_value as `key` from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark, IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id FROM `student_session` LEFT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " and student_attendences.subject_id=". $this->db->escape($subject_id)." where  student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . ") as student_sessions   LEFT JOIN attendence_type ON attendence_type.id=student_sessions.attendence_type_id where student_sessions.student_id=students.id  and students.is_active = 'yes' ";
        }
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function searchAttendenceClassSectionPrepare($class_id, $section_id, $date, $batch_id = null) {
        if($batch_id != null){
            $query = $this->db->query("select student_sessions.attendence_id,student_sessions.remark,students.firstname,students.admission_no,student_sessions.date,students.hall_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, student_sessions.subject_name from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark,IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id, subjects.name as subject_name FROM `student_session` RIGHT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " LEFT JOIN subjects ON subjects.id=student_attendences.subject_id where student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . " and student_session.batch_id=" . $this->db->escape($batch_id) . ") as student_sessions where student_sessions.student_id=students.id ");
        }else {
            $query = $this->db->query("select student_sessions.attendence_id,student_sessions.remark,students.firstname,students.admission_no,student_sessions.date,students.hall_no,students.lastname,student_sessions.attendence_type_id,student_sessions.id as student_session_id, student_sessions.subject_name from students ,(SELECT student_session.id,student_session.student_id ,IFNULL(student_attendences.date, 'xxx') as date,student_attendences.remark,IFNULL(student_attendences.id, 0) as attendence_id,student_attendences.attendence_type_id, subjects.name as subject_name FROM `student_session` RIGHT JOIN student_attendences ON student_attendences.student_session_id=student_session.id  and student_attendences.date=" . $this->db->escape($date) . " LEFT JOIN subjects ON subjects.id=student_attendences.subject_id where student_session.session_id=" . $this->db->escape($this->current_session) . " and student_session.class_id=" . $this->db->escape($class_id) . " and student_session.section_id=" . $this->db->escape($section_id) . ") as student_sessions where student_sessions.student_id=students.id ");
        }


        return $query->result_array();
    }

    public function getAttendanceStudentSubjectDate($student_id, $subject_id, $from_date="0000-00-00", $to_date="0000-00-00"){

        $sql = "SELECT student_attendences.* FROM student_attendences
            INNER JOIN (SELECT subjects.*, student_session.id as student_session_id FROM subjects
            INNER JOIN teacher_subjects ON teacher_subjects.subject_id=subjects.id
            INNER JOIN class_sections ON class_sections.id=teacher_subjects.class_section_id
            INNER JOIN student_session ON student_session.class_id=class_sections.class_id AND student_session.section_id=class_sections.section_id
            WHERE student_session.student_id=".$this->db->escape($student_id)." AND teacher_subjects.session_id=".$this->db->escape($this->current_session).") AS sub ON sub.id=student_attendences.subject_id
            WHERE student_attendences.student_session_id = sub.student_session_id AND student_attendences.subject_id=".$this->db->escape($subject_id);

        if($from_date != "0000-00-00" || $to_date != "0000-00-00"){
            $where = " AND student_attendences.date>=".$this->db->escape($from_date)." AND student_attendences.date<=".$this->db->escape($to_date);
        } else {
            $where = "";
        }

        $sql.=$where;

        $query = $this->db->query($sql);
        return $query->result_array();

    }

    function count_attendance_obj($month, $year, $student_id, $attendance_type = 1, $subject_id) {


        $query = $this->db->select('count(*) as attendence')->join("student_session", "student_attendences.student_session_id = student_session.id")->where(array('student_attendences.student_session_id' => $student_id, 'month(date)' => $month, 'year(date)' => $year, 'student_attendences.attendence_type_id' => $attendance_type, 'student_attendences.subject_id' => $subject_id))->get("student_attendences");

        return $query->row()->attendence;

    }

    function attendanceYearCount() {

        $query = $this->db->select("distinct year(date) as year")->get("student_attendences");

        return $query->result_array();
    }

}
