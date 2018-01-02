

<?php 

class teacherController extends baseController {

	public function navigation(){

		$t = new Teacher;
         $t->search();

   return $this->getTeachers('navigation');

	}


	public function home(){

		$this->navigation();




		return $this->getTeachers('home');
	}


	public function create(){
		$this->navigation();

		$this->schools= School::getAll();

		 $s= new Teacher;
        $s->createTeacher();

  

  return $this->getTeachers('createTeach');

	}

	public function edit(){
		$this->navigation();

		$t= $this->schools = School::getAll();

		 $id = $_GET['id'];
		 $from = 'teachers.*, schools.sch_name';
         $join = 'join schools using (sch_id)';

	    $this->teacher = Teacher::get($id,$from,$join);	


	   

  

  return $this->getTeachers('editTeach');

	}
	
	

}