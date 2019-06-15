<div class="container margin-top margin-bottom">
    <div class="row">


        <div class="col-md-4">
            <img src="<?= base_url() ?>/assets/images/<?= $user['photo']; ?>" class="img-thumbnail" alt="profile">
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Nama : <?= $user['name']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>