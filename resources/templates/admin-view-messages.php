<h1>Message Data</h1>
<table class="table message-table">
    <thead>
        <tr>
            <?php
            if (mysqli_num_rows($messagesTableHeaderList) > 0) {
                while($row = mysqli_fetch_assoc($messagesTableHeaderList)) {
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
            if (mysqli_num_rows($allMessages) > 0) {
                while($row = mysqli_fetch_assoc($allMessages)) {
                    echo <<< HTML
                        <tr>
                            <td>{$row["idMessages"]}</td>
                            <td>{$row["idUser"]}</td>
                            <td>{$row["fname"]}</td>
                            <td>{$row["lname"]}</td>
                            <td>{$row["email"]}</td>
                            <td>{$row["subject"]}</td>
                            <td>{$row["message"]}</td>
                            <td>{$row["topic"]}</td>
                            <td>{$row["receivedTime"]}</td>
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