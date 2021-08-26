<?php 

	/**
	 * la classe définissant toutes les requêtes sur la base de données
	 */
	class BD
	{
		protected $nomBD;
        protected $userBD;
        protected $pwdBD;
		
		function __construct($nomBD,$userBD,$pwd)
            {
                $this->nomBD= $nomBD;
                $this->userBD = $userBD;
                $this->pwdBD = $pwd;
            }

        function getPdo()
            {
                $pdo = new PDO("mysql:dbname=$this->nomBD;host=localhost","$this->userBD","$this->pwdBD");
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }

        public function insertRow($query, $params = [])
        {
                try {
                    $stmt = $this->getPdo()->prepare($query);
                    $stmt->execute($params);
                    return TRUE;    
                } catch (PDOException $e) {
                    throw new Exception($e->getMessage());  
                }

        }
        private function Valid($sql)
            {
                $pdo = $this->getPdo();
                $pdo->exec($sql);
            }

        private function Execut($rep)
            {
                $pdo = $this->getPdo();
                $rslt = $pdo->query($rep);
                $rep = $rslt->fetchAll(PDO::FETCH_OBJ);
                return $rep;
            }

        function InsertUser($nom,$prenom,$login,$pass,$tel,$mail,$datenaiss,$genre)
            {
                
                $sql = "INSERT INTO user(nom,prenom,login,pass,tel,email,datenaiss,genre) VALUES(?,?,?,?,?,?,?,?)";
                return $this->insertRow($sql,[$nom,$prenom,$login,$pass,$tel,$mail,$datenaiss,$genre]);
            }

        function InsertUser2($nom,$prenom,$login,$pass,$tel,$mail,$datenaiss,$genre)
            {
                
                $sql = "INSERT INTO user(nom,prenom,login,pass,tel,email) VALUES(?,?,?,?,?,?)";
                return $this->insertRow($sql,[$nom,$prenom,$login,$pass,$tel,$mail]);
            }
        /*function InsertQuestion($iduser,$question,$reponse)
        {
        	$sql = "INSERT INTO question(iduser,question,reponse) VALUES(?,?,?)";
                return $this->insertRow($sql,[$iduser,$question,$reponse]);
        }*/

        function SelectToConnect($username,$pass)
        {
            $sql = "SELECT tel FROM user WHERE (email = '$username' OR tel = '$username' OR login = '$username') AND pass = '$pass'";
            return $this->Execut($sql);
        }

        function Bloque($id)
        {
        	$sql = "UPDATE user SET bloque = 1 WHERE tel = '$id'";
        	return $this->Valid($sql);
        }

        function SelectForSession($tel)
        {
            $sql = "SELECT email, nom, prenom, tel FROM user WHERE  tel = '$tel' ";
            return $this->Execut($sql);
        }
        /*function SelectToVerify($username,$pass)
        {
            $sql = "SELECT pass,login,tel FROM user WHERE (email = '$username' OR tel = '$username' OR login = '$username') AND pass = '$pass'";
            return $this->Execut($sql);
        }*/


        function SelectUser($email,$password)
            {
                $sql = "SELECT email,pass,tel FROM user WHERE email = '$email' AND pass = '$password'";
                return $this->Execut($sql);
            }

            function InsertQuestion($iduser,$quest,$reponse)
            {
            	$sql = "INSERT INTO question(iduser,question,reponse) VALUES(?,?,?)";
            	return $this->insertRow($sql,[$iduser,$quest,$reponse]);
            }

            function updateEtat($iduser)
            {
            	$sql = "UPDATE user SET etat = 1 WHERE iduser = $iduser ";
            	return $this->Valid($sql);
            }

            function SelectQuestion($iduser)
            {
            	$sql = "SELECT question, reponse FROM question q WHERE q.iduser = $iduser";
            	return $this->Execut($sql);
            }
            


	}

?>