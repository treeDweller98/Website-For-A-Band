<table class="table merch-table">
    <thead>
        <tr>
            <?php
            if (mysqli_num_rows($concertTableHeaderList) > 0) {
                while($row = mysqli_fetch_assoc($concertTableHeaderList)) {
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
                <th scope="col"><input type="hidden" name="table" value="CONCERT_T">Auto</th>
                <th scope="col"><input type="text" name="Name" placeholder="Name"></th>
                <th scope="col"><input type="text" name="Description" placeholder="Description"></th>
                <th scope="col"><input type="text" name="Location" placeholder="Location"></th>
                <th scope="col"><input type="datetime-local" name="Schedule"></th>
                <th scope="col"><input type="number" name="Capacity" placeholder="Capacity" min="0"></th>
                <th scope="col"><input type="file" name="Image"></th>
                <th><input type="submit" value="ADD"></th>
            </tr>
        </form>
        <?php
            if (mysqli_num_rows($allConcert) > 0) {
                while($row = mysqli_fetch_assoc($allConcert)) {
                    echo <<< HTML
                        <tr>
                            <td>{$row["idConcert"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["description"]}</td>
                            <td>{$row["location"]}</td>
                            <td>{$row["schedule"]}</td>
                            <td>{$row["capacity"]}</td>
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