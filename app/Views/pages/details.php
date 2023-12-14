<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-4" style="max-width: 540px; border-radius: 12px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $book['sampul']; ?>" class="img-fluid rounded-start" alt="Cover">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['judul']; ?></h5>
                            <p class="card-text"><?= $book['deskripsi']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">Stok : <?= $book['stok']; ?></small></p>

                            <a href="/edit/<?= $book['id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/<?= $book['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>