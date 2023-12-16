<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookModel;

class BooksAPI extends ResourceController
{
    public function index()
    {
        $model1 = model(BookModel::class);
        $data = [
            'message' => 'success',
            'book' => $model1->getBook()
        ];
        return $this->respond($data, 200);
    }
}
