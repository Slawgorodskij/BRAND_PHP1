<section class="introduction">
    <div class="introduction__item container">
        <h1 class="introduction__title"><?= $title ?></h1>
    </div>
</section>
<div class="container">
    <h1 class="title"><?= $title ?></h1>

    <?php if ($customer): ?>
        <div>
            <p class="user-cart__proposal-text_info"><?= $nameCustomer ?></p>
            <?php if (is_null($addressCustomer)): ?>
                <p class="user-cart__proposal-text_info">address unknown</p>
            <?php else: ?>
                <p class="user-cart__proposal-text_info">State: <span><?= $addressCustomer['state'] ?></span></p>
                <p class="user-cart__proposal-text_info">City: <span><?= $addressCustomer['city'] ?></span></p>
                <p class="user-cart__proposal-text_info">Street: <span><?= $addressCustomer['street'] ?></span></p>
                <p class="user-cart__proposal-text_info">Home: <span><?= $addressCustomer['home'] ?></span></p>
                <p class="user-cart__proposal-text_info"> order for the total amount: <span
                            class="user-cart__proposal-text_color"
                    > $<?= $dataTotalCosts ?></span></p>
            <?php endif; ?>
        </div>
        <table>
            <caption class="title">
                <?= $nameTable ?>
            </caption>
            <tr>
                <th>product name</th>
                <th>product color</th>
                <th>product size</th>
                <th>total</th>
                <th>price</th>
            </tr>
            <?php foreach ($dataBase as $item): ?>
                <tr>
                    <td><?= $item['productName'] ?></td>
                    <td><?= $item['productColor'] ?></td>
                    <td><?= $item['productSize'] ?></td>
                    <td><?= $item['total'] ?></td>
                    <td>$<?= $item['productPrice'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <table>
            <caption class="title">
                <?= $nameTable ?>
            </caption>
            <tr>
                <th>product name</th>
                <th>product color</th>
                <th>product size</th>
                <th>total</th>
            </tr>
            <tr>
                <td><?= $dataBase['productName'] ?></td>
                <td><?= $dataBase['productColor'] ?></td>
                <td><?= $dataBase['productSize'] ?></td>
                <td><?= $dataBase['total'] ?></td>
            </tr>

        </table>
    <?php endif; ?>
</div>