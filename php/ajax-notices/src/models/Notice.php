<?php

namespace src\models;

use PDO;
use PDOException;
use resources\libraries\Model;

class Notice extends Model
{

    protected string $table = 'notice';
    protected string $tbCategory = 'category';

    public function create(array $data) {
        try {
            $sql = "INSERT INTO {$this->table} (title, slug, content, image, state, fk_category_idCat) VALUES (:title, :slug, :content, :image, :state, :fk_category_idCat)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(
                [
                    'title' => $data['title'], 
                    'slug' => $data['slug'],
                    'content' => $data['content'],
                    'image' => $data['image'],
                    'state' => $data['state'],
                    'fk_category_idCat' => $data['fk_category_idCat']
            ]);

            return ['message' => 'User created successfully'];
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }


    public function search(string $phrase) {
        try {
            $sql = "SELECT title, slug, image, created_at, category, slugCat FROM {$this->table}, {$this->tbCategory} WHERE  $this->table.fk_category_idCat=$this->tbCategory.idCat AND title like :title ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['title' => '%'. $phrase .'%']);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function all() {
        try {
            $sql = "SELECT title, slug, image, created_at, category, slugCat FROM {$this->table}, {$this->tbCategory} WHERE $this->table.fk_category_idCat=$this->tbCategory.idCat ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function findBySlug(string $slug) {
        try {
            $sql = "SELECT title, slug, content, image, created_at, category, slugCat FROM {$this->table}, {$this->tbCategory} WHERE $this->table.fk_category_idCat=$this->tbCategory.idCat AND $this->table.slug=:slug";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['slug' => $slug]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getCategories() {
        try {
            $sql = "SELECT idCat, category, slugCat FROM {$this->tbCategory} ORDER BY category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    
}


/*

namespace src\models;

use resources\libraries\Model;

class Notice extends Model
{
    protected string $table = 'notice';
    protected string $tbNotice = 'notice';
    protected string $tbCategory = 'category';

    public function insert(array $data) {
        try {
            // title, slug, content, state, image, fk_category_idCat
    
            $sql = "INSER INTO {$this->tbNotice} (";
            $sql .= implode(', ', array_keys($data)) .") VALUES (";
            $sql .= ':' . implode(', :', array_keys($data)) . ")";
    
            dd($sql);
            $prepare = $this->conn($sql);
    
            return $prepare->execute($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

*/