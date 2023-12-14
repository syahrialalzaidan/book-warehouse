<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<div class="container">
    <div class="row">
        <div class="col mt-4">

            <h1 class="text-xl">Daftar Buku</h1>
            <a href="/tambah" class="btn btn-secondary mt-2">Tambah Buku</a>

            <table class="table mt-4">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr class="align-middle">
                            <td scope="row"><?= $book['id']; ?></td>
                            <td>
                                <img src="/img/<?= $book['sampul']; ?>" alt="Cover" width=100>
                            </td>
                            <td><?= $book['judul']; ?></td>
                            <td><?= $book['penulis']; ?></td>
                            <td><?= $book['penerbit']; ?></td>
                            <td>
                                <a href="/details/<?= $book['id']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>

<?= $this->endSection() ?>