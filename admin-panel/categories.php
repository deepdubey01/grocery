<?php 
include 'layouts/header.inc.php'; 
$sql = "SELECT * FROM categories ";
$result = $conn->query($sql);

// Check if the type and id parameters are set in the URL
if(isset($_GET['type']) && isset($_GET['id'])) {

   if($_GET['type'] === 'status') {
    $categoryId = $_GET['id'];
    $statusValue = $_GET['value'];

    $sql = "UPDATE categories SET status = '$statusValue' WHERE cat_id = '$categoryId'";
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "Data updated successfully";
        header('location: categories.php');
        exit();
    } else {
        echo "Error updating category status: " . $conn->error;
    }
}

    if($_GET['type'] === 'delete') {
        // SQL query to delete category from the categories table
        $categoryId = $_GET['id'];
        $sql = "DELETE FROM categories WHERE cat_id = $categoryId";

        if ($conn->query($sql) === TRUE) {

            session_start();
                $_SESSION['success_message'] = "New Data deleted successfully";
                header('location: categories.php');
            exit();
        } else {
            echo "Error deleting category: " . $conn->error;
        }

        $conn->close();
    }



} 
?>

<div class="container">
    <div class="card">
        <div class="card-header d-lg-flex justify-content-between">
            Categoies Table <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#addCategoryModal">
                Add Category
            </button>
        </div>
        <div class="card-body">

            <?php
           
            // Check if the success message session variable is set
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
                            <th>Category Name</th>
                            <th>Photos</th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                         if ($result->num_rows > 0) {
                            $sr_no = 1; 
                            while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $sr_no ?></td>
                            <td><?= $row["category_name"] ?></td>
                            <td><img src="<?= PRODUCT_IMAGE_SITE_PATH.$row["photos"] ?>" alt="Category Photo"
                                    width="100"></td>
                            <td>

                                <?php
                                if($row['status'] === 'active'){
                                     echo "<a class='badge p-2 btn-success' href='?type=status&value=inactive&id=" . $row["cat_id"] . "'> ".$row["status"]."</a>"; 
                                }else{
                                     echo "<a class='badge p-2 btn-danger' href='?type=status&value=active&id=" . $row["cat_id"] . "'> ".$row["status"]."</a>"; 

                                }

                                ?>
                            </td>
                            <td>
                                <?php echo "<a class='badge p-2 btn-danger' href='?type=delete&id=" . $row["cat_id"] . "'>Delete</a>"; ?>


                            </td>
                        </tr>
                        <?php
                            $sr_no++;
                        }
                        } else {
                            ?>
                        <tr>
                            <td colspan="5">No categories found</td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="config/add_category.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryImage">Category Image</label>
                        <input type="file" class="form-control-file" id="categoryImage" name="categoryImage"
                            accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryStatus">Status</label>
                        <select class="form-control" id="categoryStatus" name="categoryStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footer.inc.php'; ?>