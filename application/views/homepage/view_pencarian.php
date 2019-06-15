<div class="container margin-top margin-bottom">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Hasil Pencarian</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php foreach ($pencarian as $p) { ?>
            <div class="col-md-3">
                <div class="card">
                    <a href="<?= base_url('homepage/bacanovel/') ?><?= $p['id']; ?>">
                        <img src="<?= base_url(); ?>/assets/images/<?= $p['photo']; ?>" class="card-img-top" alt="cover">
                    </a>
                    <div class="card-body">
                        <p class="card-text"><?= $p['title']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>