<?php include 'includes/header.php'; ?>
<!-- Content area -->
<main class="flex-1 p-6 overflow-auto">
    <div class="justify-start mb-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProduct">
            <i class="bi bi-plus-circle"></i> Add Product
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gray-300">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="config/code.php" method="post" enctype="multipart/form-data">
                        <div>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label>Product Description</label>
                                <textarea name="product_description" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label>Product Quantity</label>
                                <input type="number" name="product_quantity" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label>Product Price (₱)</label>
                                <input type="number" name="product_price" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <input type="checkbox" name="is_new" class="form-check-input">
                                <label>New</label>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="is_sale" class="form-check-input">
                                <label>Sale</label>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <select name="" class="form-control">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label>Product Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Tags</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "cyberzone");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM products");

            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>{$i}</th>";
                    echo "<td><img src='uploads/{$row['image']}' alt='Product Image' class='rounded-full object-fill w-10'></td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['product_description']}</td>";
                    echo "<td>{$row['product_quantity']}</td>";
                    echo "<td>₱{$row['product_price']}</td>";
                    echo "<td>" . ($row['is_new'] ? "New" : "Sale") . "</td>";
                    echo "<td>
        <a href='edit_product.php?id={$row['id']}' class='text-blue-600 hover:text-blue-700 text-xl'><i class='bi bi-pencil-square'></i></a>
        <a href='delete_product.php?id={$row['id']}' class='text-red-600 hover:text-red-700 text-xl ml-4' onclick=\"return confirm('Are you sure you want to delete this product?');\"><i class='bi bi-trash'></i></a>
      </td>";
                    echo "</tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='8'>No products found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

</main>
<?php include 'includes/footer.php'; ?>