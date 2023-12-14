<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index(): string
    {
        $books = $this->bookModel->getBook();
        $data = [
            'title' => 'Home | Perpustakaan',
            'books' => $books
        ];
        return view('pages/home', $data);
    }

    public function tambah(): string
    {
        $data = [
            'title' => 'Tambah Buku | Perpustakaan',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/tambah', $data);
    }

    public function save()
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);
        //handle save file too
        $fileSampul = $this->request->getFile('sampul');
        //cek apakah ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        //ambil nama file
        $namaSampul = $fileSampul->getName();

        
        $this->bookModel->save([
            'sampul' => $namaSampul,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stok' => $this->request->getVar('stok')
        ]);
        return redirect()->to('/');
    }
}
