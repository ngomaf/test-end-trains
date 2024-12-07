<?php

namespace Source\Models;

use Exception;
use PDO;
use Source\Models\Model;


class Functionary extends Model
{
    private string $table = "functionary";

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
		try {
			$sql = "SELECT * FROM $this->table ORDER BY name";
			$pro = $this->db::prepare($sql);
			$pro->execute();

			return $pro->fetchAll();

		} catch(Exception $error) {	
            $this->errMsg($error);
		}	
    }

    public function paginer(int $bigin, int $limit): mixed
    {
		try {
			$sql = "SELECT * FROM $this->table ORDER BY name LIMIT ?,?";
			$pro = $this->db::prepare($sql);
            $pro->bindValue(1, $bigin, PDO::PARAM_INT);
            $pro->bindValue(2, $limit, PDO::PARAM_INT);
			$pro->execute();

			return $pro->fetchAll();

		} catch(Exception $err) {	
            $this->errMsg($err);
		}	
    }

    public function total(): mixed
    {
		try {
			$sql = "SELECT count(name) as value FROM $this->table";
			$pro = $this->db::prepare($sql);
			$pro->execute();

			return $pro->fetch();

		} catch(Exception $error) {	
            $this->errMsg($error);
		}	
    }

    public function errMsg(Exception $err) {
        return [
            'error_code'=>$err->getCode(), 
            'error_message'=>$err->getMessage(),
            'error_arquive'=>$err->getFile(),
            'error_line'=>$err->getLine(),
        ];	
    }
}