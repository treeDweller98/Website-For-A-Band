<aside>
    <div class="filter-option">
        <input class="form-check-input" id="albumCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".album" aria-expanded="false" checked>
        <label class="form-check-label" for="albumCheck">Albums</label>
    </div>
    <div class="filter-option">
        <input class="form-check-input" id="tshirtCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".tshirt" aria-expanded="false" checked>
        <label class="form-check-label" for="tshirtCheck">T Shirts</label>
    </div>
    <div class="filter-option">
        <input class="form-check-input" id="sweatshirtCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".sweatshirt" aria-expanded="false" checked>
        <label class="form-check-label" for="sweatshirtCheck">Sweatshirts</label>
    </div>
    <div class="filter-option">
        <input class="form-check-input" id="jacketCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".jacket" aria-expanded="false" checked>
        <label class="form-check-label" for="jacketCheck">Jackets</label>
    </div>
    <div class="filter-option">
        <input class="form-check-input" id="hatCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".hat" aria-expanded="false" checked>
        <label class="form-check-label" for="hatCheck">Hats</label>
    </div>
    <div class="filter-option">
        <input class="form-check-input" id="wristbandCheck" type="checkbox" data-bs-toggle="collapse" data-bs-target=".wristband" aria-expanded="false" checked>
        <label class="form-check-label" for="wristbandCheck">Wristbands</label>
    </div>
</aside>
<main>
    <section class="merch-list">
    <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if ($row["isAvailable"]) {
                    echo <<< HTML
                    <div class="merch-card collapse multi-collapse {$row['category']} show">
                        <img src='{$row["imageUrl"]}' class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{$row['name']}</h2>
                            <div class="merch-price">{$row["price"]}</div>
                            <p class="card-text">{$row["description"]}</p>
                            <form class="merch-form">
                                <input type="hidden" name="idMerch" value='{$row["idMerch"]}' >
                                <input type="number" id="amount" name="amount" placeholder="Amount" min="1" max="5">
                                <input class="btn" type="submit" name="add-to-cart" value="Add to Cart">
                            </form>
                        </div>
                    </div>
                    HTML;
                }
            }
        }
    ?>
    </section>
</main>