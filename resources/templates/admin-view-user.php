<h1>User Data</h1>
<table class="table user-table">
    <thead>
        <tr>
            <?php
            if (mysqli_num_rows($userTableHeaderList) > 0) {
                while($row = mysqli_fetch_assoc($userTableHeaderList)) {
                    if ($row["COLUMN_NAME"] == "password") {continue;}
                    echo <<< HTML
                        <th>{$row["COLUMN_NAME"]}</td>
                    HTML;
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
            if (mysqli_num_rows($allUsers) > 0) {
                while($row = mysqli_fetch_assoc($allUsers)) {
                    echo <<< HTML
                        <tr>
                            <td>{$row["idUser"]}</td>
                            <td>{$row["email"]}</td>
                            <td>{$row["fname"]}</td>
                            <td>{$row["lname"]}</td>
                            <td>{$row["phone"]}</td>
                            <td>{$row["address"]}</td>
                            <td>{$row["zipCode"]}</td>
                            <td>{$row["country"]}</td>
                            <td>{$row["subscribedToNewsletter"]}</td>
                            <td>{$row["joined"]}</td>
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