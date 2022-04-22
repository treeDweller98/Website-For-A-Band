<h1>Merch Data</h1>
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
        </tr>
    </thead>
    <tbody>
        <form method="POST" action="add-database-entry.php" enctype="multipart/form-data">
            <tr>
                <th scope="col"><input type="hidden" name="table" value="MERCH_T">Auto</th>
                <th scope="col"><input type="text" name="Name" placeholder="Name"></th>
                <th scope="col"><input type="text" name="Description" placeholder="Description"></th>
                <th scope="col"><input type="file" name="Image"></th>
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
                <th scope="col"><input type="number" name="Price" placeholder="Price" min="0" step="0.01"></th>
                <th scope="col"><input type="number" name="Stock" placeholder="Stock"></th>
                <th scope="col"><input type="number" name="Discount" placeholder="Discount" min=0 max="99"></th>
                <th scope="col">
                    <select name="IsAvailable">
                        <option value=1>Yes</option>
                        <option value=2>No</option>
                    </select>
                </th>
                <th scope="col">
                    <select name="IsFeatured">
                        <option value=1>Yes</option>
                        <option value=2>No</option>
                    </select>
                </th>
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
                            <td><img src='{$row["imageUrl"]}' alt=''></td>
                            <td>{$row["category"]}</td>
                            <td>{$row["price"]}</td>
                            <td>{$row["stock"]}</td>
                            <td>{$row["discount"]}</td>
                            <td>{$row["isAvailable"]}</td>
                            <td>{$row["isFeatured"]}</td>
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