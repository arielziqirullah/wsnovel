<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="alert alert-novel text-center" role="alert">
                Tambahkan Novel Baru
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="<?= base_url('user_process/tambahdata'); ?>" method="post" enctype="multipart/form-data" class="mt-2">
                <img src="<?= base_url() ?>/assets/images/default.jpg" width="300" height="300" alt="">
                <div class="form-group ml-3">
                    <label for="exampleFormControlFile1">Tambahkan Cover</label>
                    <input type="file" class="form-control-file" name="gambar" id="gambar">
                </div>
        </div>
        <div class="col-md-6 mt-5">
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Novel">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kategori</label>
                <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi Novel . ."></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Konten</label>
                <textarea class="form-control" name="konten" id="konten" rows="12" placeholder="Konten Novel . ."></textarea>
            </div>
            <button type="submit" name="btntambah" class="btn btn-success">Tambah Novel</button>
            </form>
        </div>
    </div>
</div>