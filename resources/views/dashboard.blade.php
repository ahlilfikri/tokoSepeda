<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/image/sepeda.png') }}" type="image/png">
    <title>Document</title>
    <style>
        .background-filter {}

        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
        }

        .product-card .text {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card .desc {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="overflow-x: hidden !important;">
        <div class="row p-0">
            <div class="col-12">
                <h1 class="text-center">KAYUH</h1>
            </div>
            <div class="col-0 col-md-4"></div>
            <div class="col-12 col-md-4">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav m-auto">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                <a class="nav-link" href="#cattegory">Cattegory</a>
                                <a class="nav-link" href="#feature">Feature</a>
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-0 col-md-4"></div>
        </div>
        <div class="row p-0">
            <div class="col-12 text-light text-center p-0"
                style="min-height:350px; width:100%; background:url('{{ asset('assets/image/bg1.jpeg') }}'); background-size:contain;">
                <div class="background-filter p-0"
                    style="background-color:rgba(23, 21, 21, 0.6); min-height:350px; min-width: 100vw;">
                    <p class="pt-5">SUMMER COLLECTION</p>
                    <h1>SUMMER BYCYCLE SALE</h1>
                    <p class="px-5 pt-4">We are thrilled to welcome you to KAYUH, your go-to destination for buying
                        and selling new and used bicycles. Whether you're looking for the latest models or a reliable
                        pre-owned bike, we have something for everyone.</p>
                    <button class="btn btn-outline-light mb-3">Shop Now</button>
                </div>
            </div>
        </div>
        <div class="row p-0 py-4" id="cattegory">
            <div class="col-12 col-md-6">
                <img class="m-auto d-flex justify-center" style="height:500px;" src="{{ asset('assets/image/old.jpg') }}" alt="">
                <div class="text p-3 m-auto my-2"
                    style="width:fit-content; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4); border-radius:1vh">
                    <h3 class="text-center">OLD BIKE</h3>
                    <p class="text-center">starting at Rp.200.000</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <img class="m-auto d-flex justify-center" style="height: 500px;" src="{{ asset('assets/image/new.jpg') }}" alt="">
                <div class="text p-3 m-auto my-2"
                    style="width:fit-content; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4); border-radius:1vh">
                    <h3 class="text-center">NEW BIKE</h3>
                    <p class="text-center">starting at Rp.200.000</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="feature">
        <div class="row align-items-stretch">
            <div class="col-12">
                <h1 class="text-center pt-5">Feature Product</h1>
            </div>
            @foreach ($produks as $produk)
            <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="product-card">
                    <img class="py-2" style="width: 100%;" src="{{ asset('storage/' . $produk->image) }}" alt="">
                    <div class="text my-2">
                        <p class="text-center" style="font-size: 20px">{{ $produk->jenis }}</p>
                        <p class="text-center" style="font-size: 35px">{{ $produk->nama }}</p>
                        <div class="desc d-flex justify-content-between">
                            <div class="harga d-flex">
                                <p>Harga :</p>
                                <p>Rp.{{ $produk->harga }}</p>
                            </div>
                            <div class="stock d-flex">
                                <p>Stock :</p>
                                <p>{{ $produk->stock }}</p>
                            </div>
                        </div>
                        <input type="number" class="form-control mb-2 quantity" min="1" max="{{ $produk->stock }}" value="1">
                        <button class="btn btn-primary btn-add-to-cart" data-id="{{ $produk->id }}" data-name="{{ $produk->nama }}" data-price="{{ $produk->harga }}" data-stock="{{ $produk->stock }}">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container" id="cart">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-5">Cart</h1>
                <ul id="cart-items" class="list-group">
                    <!-- Cart items will be appended here dynamically -->
                </ul>
                <button id="buy-now" class="btn btn-success mt-3">Buy Now</button>
            </div>
        </div>
    </div>

    <footer>
        <p class="text-center py-0 my-0 mb-2 mt-5">Follow Our Social Media</p>
        <div class="social d-flex pt-0 mt-0" style="justify-content: center">
            <i class="fa-brands fa-instagram px-2" style="font-size:20px"></i>
            <i class="fa-brands fa-facebook px-2" style="font-size:20px"></i>
        </div>
        <p class="text-center mt-3">©Muhamad Ahlil Fikri</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/e94cdb9596.js" crossorigin="anonymous"></script>
    <script>
        let cart = [];

        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn-add-to-cart');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productPrice = this.getAttribute('data-price');
                    const productStock = this.getAttribute('data-stock');
                    const quantityInput = this.previousElementSibling;
                    const quantity = parseInt(quantityInput.value);

                    if (quantity > 0 && quantity <= productStock) {
                        const existingProduct = cart.find(product => product.id === productId);

                        if (existingProduct) {
                            const newQuantity = existingProduct.quantity + quantity;

                            if (newQuantity <= productStock) {
                                existingProduct.quantity = newQuantity;
                            } else {
                                alert('Cannot add more than available stock.');
                            }
                        } else {
                            cart.push({
                                id: productId,
                                name: productName,
                                price: productPrice,
                                quantity: quantity,
                                stock: productStock
                            });
                        }

                        updateCartDisplay();
                    } else {
                        alert('Invalid quantity. Please enter a value between 1 and ' + productStock + '.');
                    }
                });
            });

            // document.getElementById('buy-now').addEventListener('click', function () {
            //     if (cart.length > 0) {
            //         const cartData = getCartItems();
            //         fetch('{{ route('buyNow') }}', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //             },
            //             body: cartData
            //         }).then(response => {
            //             if (response.ok) {
            //                 alert('Purchase successful!');
            //                 cart = [];
            //                 updateCartDisplay();
            //             } else {
            //                 alert('Purchase failed. Please try again.');
            //             }
            //         });
            //     } else {
            //         alert('Your cart is empty.');
            //     }
            // });
        });

        function updateCartDisplay() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';

            cart.forEach(item => {
                const cartItem = document.createElement('li');
                cartItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                cartItem.innerHTML = `${item.name} - Quantity: ${item.quantity} - Price: Rp.${item.price} <button class="btn btn-danger btn-sm btn-remove-from-cart" data-id="${item.id}">Delete</button>`;
                cartItemsContainer.appendChild(cartItem);
            });

            const deleteButtons = document.querySelectorAll('.btn-remove-from-cart');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    removeFromCart(productId);
                });
            });
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartDisplay();
        }

        function getCartItems() {
            return JSON.stringify(cart);
        }
    </script>
</body>

</html>
