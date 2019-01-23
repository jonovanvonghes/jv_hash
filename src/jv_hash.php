<?php 
/**
 * Classe JV_HASH
 */

/**
* Permet de créer, vérifier des clés hashé
*/
class JV_HASH{

	private $keyHash = 'APPLIS_VR';
	
	private $key = 'KEY+VALUE';

	function __construct($key = false){

		if ($key != FALSE){
			$this->key = $key;
		}

	}


	/*------------------------------------HASH----------------------------------------*/
	

		public function verify_hash($token = FALSE){
			if ($token == FALSE)
				return FALSE;

			if ($token == $this->hash())
				return TRUE;
			return FALSE;
		}


		/**
		 * Retourne la valeur de la clé hashé
		 * @author 		Jonovan <jonovan.vonghes@ac-polynesie.pf>
		*/
		public function hash(){

			return hash('sha256', $this->keyHash . "-" . $this->key);
		}


		/**
		 * Regénère la clé
		 * @author 		Jonovan <jonovan.vonghes@ac-polynesie.pf>
		*/
		public function regenerate_key($values = array(), $separator = "_"){

			$first = true;
			$key = "";
			if (!empty($values)){
				foreach ($values as $val) {
					if ($first){
						$key .= "$val";
						$first = false;
					}else{
						$key .= "$separator$val";
					}
				}
			}
			return $key;
		}

		public function regenerate_key_from_last_pattern($key = FALSE, $last = "", $separator = "_")
		{
			if ($key == FALSE)
				return FALSE;
			
			$pos = strrpos($key, $separator);
			$tmp_key = substr($key, 0, $pos);
			$tmp_key .= "$separator$last";
			return $tmp_key;
		}


	
	/*------------------------------------SET GET----------------------------------------*/
	

		public function set_key($key = FALSE){
			if ($key == FALSE)
				return FALSE;

			$this->key = $key;
			return TRUE;
		}


		public function get_key(){

			return $this->key;
		}

}
