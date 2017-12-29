<?php


class SchoolController extends baseController{

	

	public function home(){




		return $this->getSchools('home');
	}

	public function create(){




		return $this->getSchools('createSchool');
	}
	


}