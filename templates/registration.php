<section class="introduction">
    <div class="introduction__item container">
        <h1 class="introduction__title">registration</h1>
    </div>
</section>
<main>
    <p class="<?= $className; ?>"><?= $message; ?></p>
    <div class="registration container grid">
        <?= $blockForm; ?>
        <div class="registration__slogan registration-slogan <?= $style ?>" >
            <h2 class="registration-slogan__title">LOYALTY HAS ITS PERKS</h2>
            <p class="registration-slogan__text">
                Get in on the loyalty program where you can earn points and unlock serious
                perks. Starting with these as soon as you join:
            </p>
            <ul class="registration-slogan__perk">
                <li class="registration-slogan__perk_li">15% off welcome offer</li>
                <li class="registration-slogan__perk_li">
                    Free shipping, returns and exchanges on all orders
                </li>
                <li class="registration-slogan__perk_li">
                    $10 off a purchase on your birthday
                </li>
                <li class="registration-slogan__perk_li">Early access to products</li>
                <li class="registration-slogan__perk_li">Exclusive offers & rewards</li>
            </ul>
        </div>
    </div>

</main>
