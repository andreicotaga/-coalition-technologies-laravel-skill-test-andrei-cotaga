<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/app.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="product-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="product-name">Product name</label>
                        <input type="text" class="form-control" id="product-name" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="product-quantity">Quantity in stock</label>
                        <input type="number" class="form-control" id="product-quantity" placeholder="Enter product quantity in stock">
                    </div>
                    <div class="form-group">
                        <label for="product-price">Product price</label>
                        <input type="number" class="form-control" id="product-price" placeholder="Enter product price">
                    </div>
                    <button type="submit" class="btn btn-primary add-product">Add product</button>
                </form>

                <div id="product-json">

                </div>
            </div>
        </div>
    </div>
</body>
</html>
