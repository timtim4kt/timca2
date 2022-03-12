<link rel="stylesheet" type="text/css" href="styles/forms.scss">
<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div class="addDiv">
 <div class="container">
        <h1 class="addHeader">Add Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <input class="userInputs" type="input" name="name"
            placeholder="Enter Product name" required
            >
            <br>
            <input class="userInputs" type="input" name="brand"
            placeholder="Enter Product Brand" required
            >
            <br> 
            <input class="userInputs" type="number" min="1980" max="2022" name="year"
            placeholder="Enter Product Year" required
            >
            <br>
            <input class="userInputs" type="number" min="0" name="price"
            placeholder="Enter Product Price" pattern='[0-9]+(\.[0-9][0-9]?)?' required
            >
            <br>
            <input class="file" type="file" name="image" accept="image/*" />
            <br>
            
            <div>
            <input class="addButton" type="submit" value="Add Record">
            <p> <a class="cancel" href="index.php">Cancel</a></p>
            </div>

        </form>
        
        </div>
            </div>
    <?php
    
include('includes/footer.php');
?>