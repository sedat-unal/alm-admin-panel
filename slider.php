<?php include("include/header.php"); ?>

<!-- Preloader -->
<?php include("include/preloader.php"); ?>
<!-- ./ Preloader -->
<!-- Sidebar group -->
<?php include("include/sidebar.php"); ?>
<!-- ./ Sidebar group -->
<!-- Menu -->
<?php include("include/navigation.php"); ?>
<!-- ./ Menu -->
<!-- Content -->
<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Slider Ayarları</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Slider Ayarları</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">....</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">RESİM</th>
                                    <th scope="col">METİN</th>
                                    <th scope="col">İNGİLİZCE METİN</th>
                                    <th scope="col">LİNK</th>
                                    <th scope="col">İNGİLİZCE LİNK</th>
                                    <th scope="col">Durum</th>
                                    <th class="text-right" scope="col">İŞLEM</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $getSliderList = $connectDb->query("SELECT * FROM slider", PDO::FETCH_ASSOC);
                                if ($getSliderList->rowCount())
                                {
                                    $i = 1;
                                    foreach ($getSliderList as $sliderItems)
                                    {
                                        ?>
                                        <tr>
                                            <th scope="row"><?=$i?></th>
                                            <td>Mark</td>
                                            <td><?=$sliderItems["slider_title"]?></td>
                                            <td><?=$sliderItems["slider_title_en"]?></td>
                                            <td><?=$sliderItems["slider_href"]?></td>
                                            <td><?=$sliderItems["slider_picture_href_en"]?></td>
                                            <td>
                                                <?= $sliderItems["slider_status"] == 1 ? "<span class='badge badge-success'>Aktif</span>" : "<span class='badge badge-danger'>Pasif</span>" ?>

                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-outline-light tn-sm"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Düzenle</button>
                                                        <button class="dropdown-item" type="button">Pasif Yap</button>
                                                        <button class="dropdown-item" type="button">Sil</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Content -->
    <!-- Footer -->
    <?php include("include/footer.php"); ?>
    <!-- ./ Footer -->