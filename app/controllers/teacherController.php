

<?php 

class teacherController extends baseController {

	public function navigation(){

   return $this->getTeachers('navigation');

	}


	public function home(){

		$this->navigation();




		return $this->getTeachers('home');
	}


	public function create(){
		$this->navigation();

		$this->schools= School::getAll();

  

  return $this->getTeachers('createTeach');

	}

	public function edit(){
		$this->navigation();

  

  return $this->getTeachers('editTeach');

	}
	
	

}