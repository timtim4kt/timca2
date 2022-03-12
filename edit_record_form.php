<link rel="stylesheet" type="text/css" href="styles/forms.scss">
<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
<div class="editDiv">
 <div class="editContainer">
        <h1 class="editHeader">Edit Product</h1>
        <form class="editForm" action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

            <label>Category ID:</label>
            <input class="userInputs" type="category_id" name="category_id" 
            placeholder="Enter Category id"
                   value="<?php echo $records['categoryID']; ?>"
                   required
                   >
            <br>

            <label>Name:</label>
            <input class="userInputs" type="input" name="name"
            placeholder="Enter Product Name"
                   value="<?php echo $records['name']; ?>"
                   required
                   >
            <br>

            <label>Brand:</label>
            <input class="userInputs" type="input" name="brand"
            placeholder="Enter Product Brand"
                   value="<?php echo $records['brand']; ?>"
                   required
                   >
            <br>

            <label>Year:</label>
            <input class="userInputs" type="number" min="1980" max="2022" name="year"
            placeholder="Enter Product Year"
                   value="<?php echo $records['year']; ?>"
                   required
                   >
            <br>

            <label>List Price:</label>
            <input class="userInputs" type="number" min="0"  name="price"
            placeholder="Enter Product Price"
                   value="<?php echo $records['price']; ?>" pattern='[0-9]+(\.[0-9][0-9]?)?'
                   required
                   >
            <br>

       

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <div>
            <input class="addButton" type="submit" value="Save">
            <p> <a class="cancel" href="index.php">Cancel</a></p>
            </div>
        </form>
            </div>
            </div>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>