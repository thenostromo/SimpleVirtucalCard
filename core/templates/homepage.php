<!DOCTYPE html>
<html>

<head>
    <?php include_once 'embed/html_head.php' ?>
</head>

<body>
    <div class="container">
        <?php include_once 'embed/header.php' ?>
        <main role="main" class="container">
            <?php $iteration = 1; ?>
            <?php foreach ($productList as $product): ?>
                <?php if (($iteration % 2) != 0): ?>
                    <div class="row">
                <?php endif; ?>

                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">Product</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?php echo $product->name; ?>
                                </a>
                            </h3>
                            <div class="mb-1 text-muted">
                                <?php echo $product->priceDollar; ?>$
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+</div>
                                        </div>
                                        <input type="number" min="0" class="form-control" id="<?php echo "fieldQuantity_" . $product->id; ?>" placeholder="Enter quantity">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" onclick="addToCart('<?php echo $product->id; ?>')" class="btn btn-primary">Add to Cart</button>
                                </div>
                            </div>
                            <span class="text-danger" id="<?php echo "warningFieldQuantity_" . $product->id; ?>" style="display: none;">Indicate the number of products.</span>
                        </div>
                    </div>
                </div>

                <?php if (($iteration % 2) == 0): ?>
                    </div>
                <?php endif; ?>
                <?php $iteration += 1; ?>
            <?php endforeach; ?>
        </main>
    </div>

    <?php include_once 'embed/html_scripts.php' ?>
    <script>
        let urlCartApiAddProduct = '<?php echo $url['cartApiAddProduct']; ?>';

        function addToCart(productId)
        {
            let formIsValid = false;
            let quantityValue = Number(document.getElementById('fieldQuantity_' + productId).value);
            if (quantityValue) {
                document.getElementById('warningFieldQuantity_' + productId).style.display = 'none';
                formIsValid = true;
            } else {
                document.getElementById('warningFieldQuantity_' + productId).style.display = 'block';
            }

            if (formIsValid) {
                $.post(
                    urlCartApiAddProduct,
                    {
                        param1: "param1",
                        param2: 2
                    },
                    onAjaxSuccess
                );
                function onAjaxSuccess(data)
                {
                    // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
                    alert(data);
                }
            }
        }
    </script>
</body>

</html>