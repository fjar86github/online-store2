<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toko Online</title>
</head>
<body>
    <h1>Produk Toko Online</h1>
    <div id="products"></div>
    <form id="addProductForm">
        <input type="text" id="productName" placeholder="Nama Produk" required>
        <input type="number" id="productPrice" placeholder="Harga Produk" required>
        <button type="submit">Tambah Produk</button>
    </form>

    <script>
        async function fetchProducts() {
            const response = await fetch('api/get_products.php');
            const products = await response.json();
            const productsDiv = document.getElementById('products');
            productsDiv.innerHTML = '';
            products.forEach(product => {
                productsDiv.innerHTML += `<div>${product.name} - Rp. ${product.price} <button onclick="deleteProduct(${product.id})">Hapus</button></div>`;
            });
        }

        document.getElementById('addProductForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.getElementById('productName').value;
            const price = document.getElementById('productPrice').value;

            const response = await fetch('api/add_product.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `name=${name}&price=${price}`
            });

            await response.json();
            fetchProducts();
            document.getElementById('addProductForm').reset();
        });

        async function deleteProduct(id) {
            const response = await fetch('api/delete_product.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${id}`
            });

            await response.json();
            fetchProducts();
        }

        fetchProducts();
    </script>
</body>
</html>
