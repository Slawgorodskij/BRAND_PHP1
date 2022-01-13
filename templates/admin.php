<section class="introduction">
    <div class="introduction__item container">
        <h1 class="introduction__title"><?= $title ?></h1>
    </div>
</section>
<div class="container">
    <table>
        <caption class="title">
            order table
        </caption>
        <tr>
            <th>order number</th>
            <th>customer</th>
            <th>product name</th>
            <th>date order</th>
            <th>order status</th>
        </tr>
        <?php foreach ($dataBase as $item): ?>
            <tr>
                <td><?= $item['orderNumber'] ?></td>
                <td>
                    <form action="/adminSecondPage" method="post">
                        <input hidden type="text" name="idUser" value="<?= $item['idUser'] ?>">
                        <input hidden type="text" name="idOrdersProduct" value="<?= $item['idOrdersProduct'] ?>">
                        <label class="pointer">
                            <input hidden type="submit">
                            <?= $item['userName'] ?>
                        </label>
                    </form>
                </td>
                <td>
                    <form action="/adminSecondPage" method="post">
                        <input hidden type="text" name="idOrdersProduct" value="<?= $item['idOrdersProduct'] ?>">
                        <label class="pointer">
                            <input hidden type="submit">
                            <?= $item['productName'] ?>
                        </label>
                    </form>
                </td>
                <td><?= $item['dateOrder'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
