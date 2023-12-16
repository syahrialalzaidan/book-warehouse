<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BookModel;

class TransactionAPI extends ResourceController
{
    public function index()
    {
        // Get the request
        $request = \Config\Services::request();
        // Get the JSON data from the request body
        $json = $request->getJson();

        // Check if 'id' key exists in the $json array
        if (!isset($json->id)) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'ID is missing in the request']);
        }

        // Get the model
        $model1 = model(BookModel::class);
        // Get the book data
        $book = $model1->getBook($json->id);

        // Check if 'quantity' key exists in the $json array
        if (!isset($json->quantity)) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Quantity is missing in the request']);
        }

        // If book stock is more than quantity requested
        if ($book['stok'] >= $json->quantity) {
            // Update the book stock
            $model1->updateStok($json->id, $book['stok'] - $json->quantity);
            // Return success message
            $data = [
                'message' => 'success',
                'book' => $model1->getBook()
            ];
            return $this->response->setStatusCode(200)->setJSON(['message' => 'Transaction successful']);
        } else {
            // Return error message
            $data = [
                'message' => 'failed',
                'book' => $model1->getBook()
            ];
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Not enough stock']);
        }
    }
}
