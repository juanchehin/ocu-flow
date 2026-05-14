<style>
    /* Estilos radicalmente renovados */
    .carousel-item>img {
        object-fit: cover !important;
        filter: brightness(0.8) contrast(1.1);
    }
    #carouselExampleControls .carousel-inner {
        height: 40em !important;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }
    .carousel {
        border: 8px solid #fff;
        border-radius: 25px;
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
    }
    .product-img-holder {
        width: 100%;
        height: 18em;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
        background: #f8f9fa;
    }
    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .product-item:hover .product-img {
        transform: scale(1.15);
        filter: saturate(1.2);
    }
    .card.product-item {
        border: none;
        border-radius: 15px !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: linear-gradient(to bottom, #ffffff, #f8f9fa);
    }
    .product-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
    }
    .badge {
        font-size: 0.9em;
        padding: 0.5em 1.2em !important;
        background: linear-gradient(135deg, #343a40, #495057) !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    .btn-deafault {
        background: linear-gradient(135deg, #6c757d, #495057) !important;
        border: none;
        font-weight: 600;
        letter-spacing: 1px;
        padding: 0.8em 2em !important;
        transition: all 0.3s ease;
    }
    .btn-deafault:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        background: linear-gradient(135deg, #5a6268, #3d4348) !important;
    }
    .card-title {
        font-weight: 700;
        color: #343a40;
        font-size: 1.1em;
    }
    .card-description small {
        font-size: 0.85em;
    }
</style>

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            $upload_path = "uploads/banner";
                            if(is_dir(base_app.$upload_path)): 
                            $file= scandir(base_app.$upload_path);
                            $_i = 0;
                                foreach($file as $img):
                                    if(in_array($img,array('.','..')))
                                        continue;
                            $_i++;
                                
                        ?>
                        <div class="carousel-item h-100 <?php echo $_i == 1 ? "active" : '' ?>">
                            <img src="<?php echo validate_image($upload_path.'/'.$img) ?>" class="d-block w-100 h-100" alt="<?php echo $img ?>">
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-n4">
            <div class="col-lg-10 col-md-11 col-sm-11 col-sm-11">
                <div class="card card-outline rounded-3 shadow-sm">
                    <div class="card-body">
                        <div class="row row-cols-xl-4 row-md-6 col-sm-12 col-xs-12 gy-3 gx-3">
                            <?php 
                                $qry = $conn->query("SELECT *, (COALESCE((SELECT SUM(quantity) FROM `stock_list` where product_id = product_list.id), 0) - COALESCE((SELECT SUM(quantity) FROM `order_items` where product_id = product_list.id), 0)) as `available` FROM `product_list` where (COALESCE((SELECT SUM(quantity) FROM `stock_list` where product_id = product_list.id), 0) - COALESCE((SELECT SUM(quantity) FROM `order_items` where product_id = product_list.id), 0)) > 0 order by RAND() limit 4");
                                while($row = $qry->fetch_assoc()):
                            ?>
                            <div class="col">
                                <a class="card product-item text-decoration-none text-reset" href="./?p=products/view_product&id=<?= $row['id'] ?>">
                                    <div class="position-relative">
                                        <div class="img-top position-relative product-img-holder">
                                            <img src="<?= validate_image($row['image_path']) ?>" alt="Imagen del producto" class="product-img">
                                        </div>
                                        <div class="position-absolute bottom-1 right-1" style="bottom:.5em;right:.5em">
                                            <span class="badge border text-light px-4 rounded-pill"><?= format_num($row['price'], 2) ?> $</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div style="line-height:1em">
                                            <div class="card-title w-100 mb-0"><?= $row['name'] ?></div>
                                            <div class="card-description w-100"><small class="text-muted">Marca: <?= $row['brand'] ?></small></div>
                                            <div class="card-description w-100"><small class="text-muted">Disponibles: <?= format_num($row['available'],0) ?></small></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="text-center py-3">
                            <a href="./?p=products" class="btn btn-lg btn-deafault text-light col-lg-4 col-md-6 col-sm-12 col-xs-12">Ver Más Productos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>