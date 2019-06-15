<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="alert alert-novel text-center" role="alert">
                Edit Novel
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="<?= base_url('user_process/editnovel/'); ?><?= $novel['id']; ?>" method="post" enctype="multipart/form-data" class="mt-2">
                <img src="<?= base_url() ?>/assets/images/<?= $novel['photo'];  ?>" class="img-thumbnail" height="200" width="300" alt="">
                <div class="form-group ml-3">
                    <label for="exampleFormControlFile1">Cover Novel</label>
                    <input type="file" class="form-control-file" name="gambar" id="gambar">
                </div>
                <button type="submit" name="btncoveredit" class="btn btn-success ml-3">Edit Cover</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="<?= base_url('user_process/editnovel/'); ?><?= $novel['id']; ?>" method="post" class="mt-5 mb-5">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $novel['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $novel['category']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"><?= $novel['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Konten</label>
                    <textarea class="form-control" name="konten" id="konten" rows="12"><?= $novel['contents']; ?></textarea>
                </div>
                <button type="submit" name="btnedit" class="btn btn-success">Edit Novel</button>
            </form>
        </div>
    </div>
</div>