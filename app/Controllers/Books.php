<?php

namespace App\Controllers;

use App\Models\BookModel;

class Books extends BaseController
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
        $namaSampul = 'default.jpeg';
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpeg';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
            $namaSampul = $fileSampul->getName();
        }

        //ambil nama file

        $this->bookModel->save([
            'sampul' => $namaSampul,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stok' => $this->request->getVar('stok'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Buku | Perpustakaan',
            'book' => $this->bookModel->getBook($id)
        ];
        // dd($data);
        return view('pages/details', $data);
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $book = $this->bookModel->find($id);
        //cek jika file gambarnya default.jpg
        if ($book['sampul'] != 'default.jpeg') {
            //hapus gambar
            unlink('img/' . $book['sampul']);
        }
        $this->bookModel->delete($id);
        return redirect()->to('/');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Buku | Perpustakaan',
            'validation' => \Config\Services::validation(),
            'book' => $this->bookModel->getBook($slug)
        ];
        return view('pages/edit', $data);
    }

    public function update($id)
    {
        $bookLama = $this->bookModel->getBook($id);
        $slug = url_title($this->request->getVar('judul'), '-', true);
        //cek jika gambar tidak diubah
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $bookLama['sampul'];
        if ($fileSampul->getError() == 4) {
            $namaSampul = $bookLama['sampul'];
        } else {
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            //hapus file lama
            unlink('img/' . $this->request->getVar('current_sampul'));
        }

        $this->bookModel->save([
            'id' => $id,
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
