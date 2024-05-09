<?php include 'layouts/header.inc.php';

$sql = "SELECT products.*, categories.*, products.photos AS prodPhoto 
         FROM products  
         INNER JOIN categories ON products.cat_id = categories.cat_id
         ORDER BY products.product_id desc";

$result = $conn->query($sql);


?>


<div class="container">
    <div class="card">
        <div class="card-header d-lg-flex justify-content-between">
            Product Table
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#addProductModal"> Add
                Product
            </button>
        </div>
        <div class="card-body">
            <?php
           session_start();
            if(isset($_SESSION['success_message'])) {
            // Print the success message
            echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";

            // Unset the success message session variable to clear it
            unset($_SESSION['success_message']);
            }
           ?>
            <div class="table-responsive">
                <table class="table tabler-bordered">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Photos</th>
                            <th>Short Desc1</th>
                            <th>Short Desc2</th>
                            <th>Description</th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  if ($result->num_rows > 0) {
                        $sr_no = 1;
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["category_name"] ?></td>
                            <td><img src="<?= PRODUCT_IMAGE_SITE_PATH.$row["prodPhoto"] ?>" alt="Product Photo"
                                    width="100"></td>
                            <td><?= $row["short_desc1"] ?></td>
                            <td><?= $row["short_desc2"] ?></td>
                            <td><?= $row["description"] ?></td>
                            <td><?= $row["status"] ?></td>
                            <td><a href="#" data-toggle="modal" class="edit-btn"
                                    data-product-id="<?= $row["product_id"] ?>">Edit</a>
                            </td>
                        </tr>
                        <?php
                            $sr_no++; 
                        }
                        } else {
                        ?>
                        <tr>
                            <td colspan="9">No products found</td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="config/update_product.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col">
                            <label for="productName">Product Name</label>
                            <input type="hidden" id="editProductId" name="productId">
                            <input type="text" class="form-control productName" id="productName" name="productName"
                                required>
                        </div>
                        <div class="form-group col">
                            <label for="productCategory">Category</label>
                            <select class="form-control productCategory" id="productCategory" name="productCategory"
                                required>
                                <?php
                                        // Fetch categories from the database
                                        $sql = "SELECT * FROM categories where status = 'active'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["cat_id"] . "'>" . $row["category_name"] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No categories found</option>";
                                        }
                                        ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <input type="file" class="form-control-file form-control productImage" id="productImage"
                            name="productImage" accept="image/*">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="productShortDesc1">Short Description 1</label>
                            <input type="text" class="form-control productShortDesc1" id="productShortDesc1"
                                name="productShortDesc1">
                        </div>
                        <div class="form-group col">
                            <label for="productShortDesc2">Short Description 2</label>
                            <input type="text" class="form-control productShortDesc2" id="productShortDesc2"
                                name="productShortDesc2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control productDescription" id="productDescription"
                            name="productDescription" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productStatus">Status</label>
                        <select class="form-control productStatus" id="productStatus" name="productStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="config/add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col">
                            <label for="productName">Product Name</label>

                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="form-group col">
                            <label for="productCategory">Category</label>
                            <select class="form-control" id="productCategory" name="productCategory" required>
                                <?php
                                        // Fetch categories from the database
                                        $sql = "SELECT * FROM categories where status = 'active'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row["cat_id"] . "'>" . $row["category_name"] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No categories found</option>";
                                        }
                                        ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <input type="file" class="form-control-file form-control" id="productImage" name="productImage"
                            accept="image/*" required>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="productShortDesc1">Short Description 1</label>
                            <input type="text" class="form-control" id="productShortDesc1" name="productShortDesc1">
                        </div>
                        <div class="form-group col">
                            <label for="productShortDesc2">Short Description 2</label>
                            <input type="text" class="form-control" id="productShortDesc2" name="productShortDesc2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productStatus">Status</label>
                        <select class="form-control" id="productStatus" name="productStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'layouts/footer.inc.php'; ?>
<script>
$(document).ready(function() {
    $(".edit-btn").click(function() {
        var productId = $(this).data("product-id");
        $.ajax({
            url: "config/fetch_product.php",
            method: "GET",
            data: {
                productId: productId
            },
            dataType: "json",
            success: function(data) {
                $(".productName").val(data.product_name);
                $(".productCategory").val(data.cat_id);
                $(".productStatus").val(data.status);
                $(".productDescription").val(data.description);
                $(".productShortDesc1").val(data.short_desc1);
                $(".productShortDesc2").val(data.short_desc2);
                $('#editProductId').val(productId);
                // alert(productId);
                $("#editProductModal").modal("show");
            }
        });
    });
});
</script>