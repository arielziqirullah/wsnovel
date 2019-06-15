<header>
    <nav class="navbar fixed-top navbar-expand-xl navbar-default nav-success">
        <a class="navbar-brand" href="<?= base_url('homepage'); ?>">WS Novel</a>
        <form class="form-inline ml-n4" action="<?= base_url('homepage/cari'); ?>" method="post">
            <input class="form-control mr-sm-2 ml-5" type="text" name="carinovel" placeholder="Cari Nama Novel . ." aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" name="cari" type="submit">Cari</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">


            <ul class="nav ">
                <?php if ($this->session->userdata()) { ?>
                    <?php if ($this->session->userdata('role') == 'admin') { ?>
                        <li class="nav-item active mr-2 mt-2">
                            <a class="nav-link" href="<?= base_url('user_process/admin'); ?>">Admin <span class="sr-only">(current)</span></a>
                        </li>
                        <a class="btn btn-primary" href="<?= base_url('user_process/logout'); ?>">Logout</a>
                    <?php } else if ($this->session->userdata('role') == 'penulis') { ?>
                        <li class="nav-item dropdown mr-2 mt-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tulis
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="<?= base_url('user_process/profile'); ?>">Profile</a>
                                <a class="dropdown-item text-dark" href="<?= base_url('user_process/daftarnovel'); ?>">Daftar Novel</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-dark" href="<?= base_url('user_process/penulis'); ?>">Tulis Novel</a>
                            </div>
                        </li>
                        <a class="btn btn-primary logout" href="<?= base_url('user_process/logout'); ?>">Logout</a>
                    <?php } else { ?>
                        <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalLogin">Login</button>
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalDaftar">Daftar</button>
                    <?php } ?>
                <?php } ?>
            </ul>

        </div>
    </nav>
</header>

<!-- Modal Login -->
<div class=" modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('user_process/login'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukan email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="login" class="btn btn-success">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDaftarLabel">Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('user_process/registration'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="login" class="btn btn-success">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>