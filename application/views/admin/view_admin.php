<div class="container margin-top margin-bottom">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Novel</h5>
                    <table class="table">
                        <thead class="header-table">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Novel</th>
                                <th scope="col">Cover Novel</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Konten</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($novel as $n) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $n['title']; ?></td>
                                    <td><img src="<?= base_url(); ?>/assets/images/<?= $n['photo']; ?>" width="200" alt=""></td>
                                    <td><?= $n['category']; ?></td>
                                    <td><?= $n['description']; ?></td>
                                    <td><?= word_limiter($n['contents'], 20); ?></td>
                                    <td><?= $n['date']; ?></td>
                                    <td><a href="<?= base_url(); ?>user_process/deletenoveladmin/<?= $n['id']; ?>" class="badge badge-danger deleted">delete</a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>