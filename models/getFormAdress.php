<?php
function newFormAddress(): string
{
    return '<fieldset class="execution__item execution__item-shipping">
                <input hidden type="text" name="registrationAddress">
                <input class="state execution__input" type="text" name="state" placeholder="State"/>
                <input class="city execution__input" type="text" name="city" placeholder="city"/>
                <input class="street execution__input" type="text" name="street" placeholder="street"/>
                <input class="home execution__input" type="text" name="home" placeholder="home"/>
                <button class="execution__button" type="submit">get a quote</button>
            </fieldset>';
}

function userAddress($dataAddress): string
{
    return "<fieldset class='execution__item execution__item-shipping'>
              <input hidden type='text' name='fixAddress'>
              <p class='execution__input'>State: <span>{$dataAddress['state']}</span></p>
              <p class='execution__input'>City: <span>{$dataAddress['city']}</span></p>
              <p class='execution__input'>Street: <span>{$dataAddress['street']}</span></p>
              <p class='execution__input'>Home: <span>{$dataAddress['home']}</span></p>
              <button class='execution__button' type='submit'>fix the address</button>
            </fieldset>";
}

function userFixAddress($dataAddress): string
{
    return "<fieldset class='execution__item execution__item-shipping'>
               <input hidden type='text' name='registrationAddress'>
               <input class='state execution__input' type='text' name='state' value='{$dataAddress['state']}'/>
               <input class='city execution__input' type='text' name='city' value='{$dataAddress['city']}'/>
               <input class='street execution__input' type='text' name='street' value='{$dataAddress['street']}'/>
               <input class='home execution__input' type='text' name='home' value='{$dataAddress['home']}'/>
               <button class='execution__button' type='submit'>get a quote</button>
           </fieldset>";
}



