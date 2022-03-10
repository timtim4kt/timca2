<!-- the head section -->
<head>
<title>My PHP CRUD App</title>
<link rel="stylesheet" type="text/css" href="styles/main.scss">
</head>

<header>
    
<h1>AUDIOJUMO</h1>

    <select placeholder="Select product type" onchange="location = this.value">
    <option selected value="" class="placeholder">Select Product ID Type</option>
        <?php foreach ($categories as $category) : ?>
            <option value=".?category_id=<?php echo $category['categoryID']; ?>">
            <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
    </select>


</header>


<!-- the body section -->
<body>

    </body>