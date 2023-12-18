<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sampul', 'judul', 'slug', 'penulis', 'penerbit', 'harga', 'deskripsi', 'stok', 'created_at', 'updated_at'];

    public function getBook($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function updateStok($id, $stok)
    {
        $db = \Config\Database::connect();
        $queryString = 'UPDATE books SET stok = ' . $stok . ' WHERE id = ' . $id;
        $query   = $db->query($queryString);
        return $query;
    }
}
