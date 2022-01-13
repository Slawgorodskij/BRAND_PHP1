<div class="introduction">
    <div class="introduction__item container">
        <h1 class="introduction__title"><?= $dataProduct['name'] ?></h1>
        <p class="introduction__address">
            Home / Catalog / <?= $dataProduct['category'] ?> /
            <span class="introduction__address_color"><?= $dataProduct['name'] ?></span>
        </p>
    </div>
</div>
<main>
    <div class="slider">
        <button class="slider__button">
            <svg
                    class="slider__button-logo"
                    viewBox="0 0 284.935 284.936"
                    width="24"
                    height="24"
            >
                <path
                        d="M110.488,142.468L222.694,30.264c1.902-1.903,2.854-4.093,2.854-6.567c0-2.474-0.951-4.664-2.854-6.563L208.417,2.857
                        C206.513,0.955,204.324,0,201.856,0c-2.475,0-4.664,0.955-6.567,2.857L62.24,135.9c-1.903,1.903-2.852,4.093-2.852,6.567
                        c0,2.475,0.949,4.664,2.852,6.567l133.042,133.043c1.906,1.906,4.097,2.857,6.571,2.857c2.471,0,4.66-0.951,6.563-2.857
                        l14.277-14.267c1.902-1.903,2.851-4.094,2.851-6.57c0-2.472-0.948-4.661-2.851-6.564L110.488,142.468z"
                />
            </svg>
        </button>

        <div class="slider__photo">
            <img
                    class="slider__photo-image"
                    src="/<?= IMAGES_DIR, $dataProduct['filename'] ?>"
                    alt="photo"
            />
        </div>

        <button class="slider__button">
            <svg
                    class="slider__button-logo"
                    viewBox="0 0 792.033 792.033"
                    width="24"
                    height="24"
            >
                <path
                        d="M617.858,370.896L221.513,9.705c-13.006-12.94-34.099-12.94-47.105,0c-13.006,12.939-13.006,33.934,0,46.874
                        l372.447,339.438L174.441,735.454c-13.006,12.94-13.006,33.935,0,46.874s34.099,12.939,47.104,0l396.346-361.191
                        c6.932-6.898,9.904-16.043,9.441-25.087C627.763,386.972,624.792,377.828,617.858,370.896z"
                />
            </svg>
        </button>
    </div>

    <section class="card container">
        <h2 class="card__title"><?= $dataProduct['category'] ?> COLLECTION</h2>
        <h2 class="card__name"><?= $dataProduct['name'] ?> Cheap And Chic</h2>
        <p class="card__text">
            <?= $dataProduct['description'] ?>
        </p>
        <h3 class="card__price">$<?= $dataProduct['price'] ?></h3>

        <div class="card__option card-option">
            <div class="card-option__item">
                <div class="card-option__wrapper">
                    <select class="card-option__frame" name="color">
                        <option value="1">CHOOSE COLOR</option>
                        <option value="2">Red</option>
                        <option value="3">blue</option>
                        <option value="4">black</option>
                    </select>
                </div>

                <div class="card-option__wrapper">
                    <select class="card-option__frame" name="size">
                        <option value="1">CHOOSE SIZE</option>
                        <option value="2">XXL</option>
                        <option value="3">XL</option>
                        <option value="4">L</option>
                    </select>
                </div>

                <div class="card-option__wrapper">
                    <select class="card-option__frame" name="count">
                        <option value="1">QUANTITY</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

            <button class="card-option__button button-js" data-id="<?= $dataProduct['id'] ?>">
                <svg
                        class="card-option__button-logo"
                        viewBox="0 0 27 25"
                        width="26"
                        height="24"
                >
                    <path
                            d="M21.876 22.2662C21.921 22.2549 21.9423 22.2339 21.96 22.2129C21.9678 22.2037 21.9756 22.1946 21.9835 22.1855C22.02 22.1438 22.0233 22.0553 22.0224 22.0105C22.0092 21.9044 21.9185 21.8315 21.8412 21.8315C21.8375 21.8315 21.8336 21.8317 21.8312 21.8318C21.7531 21.8372 21.6653 21.9409 21.6719 22.0625C21.6813 22.1793 21.7675 22.2662 21.8392 22.2662H21.876ZM8.21954 22.2599C8.31873 22.2599 8.39935 22.1655 8.39935 22.0496C8.39935 21.9341 8.31873 21.8401 8.21954 21.8401C8.12042 21.8401 8.03973 21.9341 8.03973 22.0496C8.03973 22.1655 8.12042 22.2599 8.21954 22.2599ZM21.9995 24.2662C21.9517 24.2662 21.8878 24.2662 21.8392 24.2662C20.7017 24.2662 19.7567 23.3545 19.6765 22.198C19.5964 20.9929 20.4937 19.9183 21.6953 19.8364C21.7441 19.8331 21.7928 19.8315 21.8412 19.8315C22.9799 19.8315 23.9413 20.7324 24.019 21.8884C24.0505 22.4915 23.8741 23.0612 23.4898 23.5012C23.1055 23.9575 22.5764 24.2177 21.9995 24.2662ZM8.21954 24.2599C7.01532 24.2599 6.03973 23.2709 6.03973 22.0496C6.03973 20.8291 7.01532 19.8401 8.21954 19.8401C9.42371 19.8401 10.3994 20.8291 10.3994 22.0496C10.3994 23.2709 9.42371 24.2599 8.21954 24.2599ZM21.1984 17.3938H9.13306C8.70013 17.3938 8.31586 17.1005 8.20331 16.6775L4.27753 2.24768H1.52173C0.993408 2.24768 0.560547 1.80859 0.560547 1.27039C0.560547 0.733032 0.993408 0.292969 1.52173 0.292969H4.99933C5.43134 0.292969 5.81561 0.586304 5.9281 1.01025L9.85394 15.4391H20.5576L24.1144 7.13379H12.2578C11.7286 7.13379 11.2957 6.69373 11.2957 6.15649C11.2957 5.61914 11.7286 5.17908 12.2578 5.17908H25.5886C25.9091 5.17908 26.2141 5.34192 26.3896 5.61914C26.566 5.89539 26.5984 6.23743 26.4697 6.547L22.0795 16.807C21.9193 17.1653 21.5827 17.3938 21.1984 17.3938Z"
                    />
                </svg>
                <span class="card-option__button-text">Add to Cart</span>
            </button>
        </div>
    </section>

    <section class="product container">
        <div class="product-items product-items_top grid">
            <?php foreach ($dataBase as $product): ?>
                <figure class="product-items__item product-item">
                    <div class="suggestion-item__photo product-item__photo">
                        <img
                                class="product-item__photo_image"
                                src="/<?= IMAGES_DIR, $product['filename'] ?>"
                                alt="photo"
                        />
                        <div class="product-item__hover">
                            <button class="product-item__hover-dorder button-js" data-id="<?= $product['id'] ?>">
                                <img
                                        class="product-item__hover-logo"
                                        src="/images/icons/logo-cart.svg"
                                        alt="cart"
                                />
                                <span class="product-item__hover-text">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    <figcaption class="product-item__text">
                        <a href="/product/<?= $product['id'] ?>">
                            <h2 class="product-item__text-title"><?= $product['name'] ?></h2>
                            <p class="product-item__text-description">
                                <?= $product['description'] ?>
                            </p>
                            <h3 class="product-item__text-price"><?= $product['price'] ?></h3>
                        </a>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>

</main>