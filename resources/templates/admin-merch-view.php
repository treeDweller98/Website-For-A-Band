<main>
<h1>Merch Data</h1>
<!-- <form>
    <input type="text" name="" value="">
</form>     -->
<table class="table merch-table">
    <thead>
        <tr>
            <?php 
                if (mysqli_num_rows($tableHeaderList) > 0) {
                    while($row = mysqli_fetch_assoc($tableHeaderList)) {
                        echo <<< HTML
                            <th>{$row["COLUMN_NAME"]}</td>
                        HTML;
                    }
                } 
            ?>
            <!-- <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Discount</th>
            <th scope="col">Is Available</th>
            <th scope="col">Is Featured</th>
            <th scope="col">Image</th> -->

        </tr>
    </thead>
    <tbody>
        <form method="POST">
            <tr>
                <th scope="col">Auto</th>
                <th scope="col"><input type="text" name="Name" placeholder="Name"></th>
                <th scope="col"><input type="text" name="Description" placeholder="Description"></th>
                <th scope="col">
                    <select name="Category">
                        <?php 
                        if (mysqli_num_rows($categoryList) > 0){
                            foreach ($categoryList as $row) {
                                echo <<< HTML
                                    <option value="{$row["category"]}">{$row["category"]}</option>
                                HTML;
                            }
                        }
                        ?>
                    </select>
                </th>
                <th scope="col"><input type="number" placeholder="Price" min="0" step="0.01"></th>
                <th scope="col"><input type="number" placeholder="Stock"></th>
                <th scope="col"><input type="number" placeholder="Discount" min=0 max="99"></th>
                <th scope="col">
                    <select name="IsAvailable">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </th>
                <th scope="col">
                    <select name="IsFeatured">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </th>
                <th scope="col"><input type="file" name="Image"></th>
                <th><input type="submit" value="ADD"></th>
            </tr>
        </form>
        <?php 
            if (mysqli_num_rows($allMerch) > 0) {
                while($row = mysqli_fetch_assoc($allMerch)) {
                    echo <<< HTML
                        <tr>
                            <td>{$row["idMerch"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["description"]}</td>
                            <td>{$row["category"]}</td>
                            <td>{$row["price"]}</td>
                            <td>{$row["stock"]}</td>
                            <td>{$row["discount"]}</td>
                            <td>{$row["isAvailable"]}</td>
                            <td>{$row["isFeatured"]}</td>
                            <td><img src='{$row["imageUrl"]}' alt=''></td>
                        </tr>
                    HTML;
                }
            } 
            else {
                echo "0 results";
            }
        ?>
    </tbody>
</table>
</main>