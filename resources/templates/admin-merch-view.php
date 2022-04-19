<main>
<h1>Merch Data</h1>
<!-- <form>
    <input type="text" name="" value="">
</form>     -->
<table class="table merch-table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Discount</th>
            <th scope="col">Is Available</th>
            <th scope="col">Is Featured</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if (mysqli_num_rows($allMerch) > 0) {
                while($row = mysqli_fetch_assoc($allMerch)) {
                    echo "<tr>";
                    echo "<td>" . $row["idMerch"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["stock"] . "</td>";
                    echo "<td>" . $row["discount"] . "</td>";
                    echo "<td>" . $row["isAvailable"] . "</td>";
                    echo "<td>" . $row["isFeatured"] . "</td>";
                    echo "<td><img src='". $row["imageUrl"] . "' alt=''></td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "0 results";
            }
        ?>
    </tbody>
</table>
</main>