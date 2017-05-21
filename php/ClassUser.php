<?php 
	// Creamos la clase usuario
	class user{
		private $nombre;
		private $apellido;
		private $login;
		private $pass;
		private $email;
		private $avatar;
		private $elo;

	    public function getnombre(){
	        return $this->nombre;
	    }
	    public function setnombre($nombre){
	        $this->nombre = $nombre;       
	    }	   

	    public function getapellido(){
	        return $this->apellido;
	    }
	    public function setapellido($apellido){
	        $this->apellido = $apellido;       
	    }

	    public function getlogin(){
	        return $this->login;
	    }
	    public function setlogin($login){
	        $this->login = $login;       
	    }

	    public function getpass(){
	        return $this->pass;
	    }
	    public function setpass($pass){
	        $this->pass = $pass;
	    }


	    public function getemail(){
	        return $this->email;
	    }
	    public function setemail($email){
	        $this->email = $email;       
	    }

	    public function getavatar(){
	        return $this->avatar;
	    }
	    public function setavatar($avatar){
	        $this->avatar = $avatar;       
	    }
	   	public function getelo(){
	        return $this->elo;
	    }
	    public function setelo($elo){
	        $this->elo = $elo;       
	    }
	}

?>