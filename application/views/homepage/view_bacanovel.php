<div class="container margin-top margin-bottom">
    <div class="row">


        <div class="col-md-3">
            <img src="<?= base_url(); ?>/assets/images/<?= $novel['p']; ?>" width="200" height="200" class="img-thumbnail ml-5" alt="">
            <p class="text-center">by <b><?= $novel['n']; ?></b></p>
        </div>
        <div class="col-md-9">
            <div class="card mr-5">
                <div class="card-body">
                    <h2 class="text-center"><?= $novel['t']; ?></h2>
                    <hr>
                    <p><?= $novel['c']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>