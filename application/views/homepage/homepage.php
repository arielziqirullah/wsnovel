<section id="novel" class="">
    <?php if ($this->session->userdata('notif')) { ?>
        <!-- <div class="row ml-2">
                        <div class="col-md-8 alert alert-dismissible fade show" role="alert">
                            <?= $this->session->userdata('notif'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> -->
        <div class="alert alert-dismissible fade show" role="alert">
            <?= $this->session->userdata('notif'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <div class="row mr-2 ml-2">
        <div class="col-md-8">
            <div class="card nvl-1 shadow">
                <div class="card-body">
                    <h5 class="text-white"><i class="far fa-star mb-2 text-white"></i> Novel Terbaru</h5>
                    <div class="row">
                        <?php foreach ($data_novel as $novel) : ?>
                            <div class="col-3">
                                <a href="<?= base_url('homepage/bacanovel/') ?><?= $novel->id; ?>">
                                    <img src="<?= base_url(); ?>assets/images/<?= $novel->photo; ?>" alt="" class="img-thumbnail" width="200" height="300">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <h5 class="text-success"><i class="fas fa-heart mb-2 mt-5 text-success"></i> Novel Drama</h5>
            <div class="row">
                <?php foreach ($category_drama as $drama) { ?>
                    <div class="col-3">
                        <a href="<?= base_url('homepage/bacanovel/') ?><?= $drama['id']; ?>">
                            <img src="<?= base_url('assets/images/'); ?><?= $drama['photo']; ?>" alt="" class="img-thumbnail" width="200">
                        </a>
                    </div>
                <?php } ?>
            </div>

            <h5 class="text-success"><i class="fas fa-laugh mb-2 mt-5"></i> Novel Humor</h5>
            <div class="row">
                <?php foreach ($category_humor as $humor) { ?>
                    <div class="col-3">
                        <a href="<?= base_url('homepage/bacanovel/') ?><?= $humor['id']; ?>">
                            <img src="<?= base_url('assets/images/'); ?><?= $humor['photo']; ?>" alt="" class="img-thumbnail" width="200">
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card border-success border-width2 shadow">
                <div class="card-body mx-auto card-2">
                    <h5 class="text-success"><i class="fas fa-book"></i> Novel Terkait</h5>
                    <a href="<?= base_url('homepage/bacanovel/') ?><?= $random_novel['id']; ?>">
                        <img src="<?= base_url('assets/images/'); ?><?= $random_novel['photo']; ?>" alt="novel-terkait" width="280" height="500" class="img-thumbnail">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>