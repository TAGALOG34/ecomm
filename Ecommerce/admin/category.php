<?php include 'includes/header.php'; ?>
<!-- Content area -->
<main class="flex-1 p-6 overflow-auto">
    <div class="justify-start mb-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCategory">
            <i class="bi bi-plus-circle"></i> Add Category
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gray-300">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="config/code.php" method="post">
                        <div>
                            <div class="mb-3">
                                <label>Category Name</label>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
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
                <th scope="col">Category Name</th>
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

            $result = $conn->query("SELECT * FROM category");

            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>{$i}</th>";
                    echo "<td>{$row['category_name']}</td>";
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