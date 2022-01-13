<?php

function authenticationForm(): string
{
    return " <div class='registration-form'>
               <form class='registration__form ' action='/registration' method='post'>          
                 <label class='registration-form__name'>
                    <input class='registration-form__input' type='email' name='email' placeholder='Email'>
                    <input class='registration-form__input' type='password' name='password' placeholder='Password'>
                 </label>
                 <div class='registration-form__bottom'>
                    <label class='registration-form__button registration-form__button_mb15'>
                       <span class='registration-form__button_text'>remember me</span>
                       <input type='checkbox' name='remember' checked>
                    </label>
                    <input class='inactive' type='checkbox' name='authentication' checked>
                    <label class='registration-form__button registration-form__button_mb15'>
                       <span class='registration-form__button_text'>entrance</span>
                       <svg class='registration-form__button_arrow' viewBox='0 0 493.356 493.356'>
                            <path d='M490.498,239.278l-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427c-3.613,1.525-5.427,4.283-5.427,8.282v63.954H9.136
                                  c-2.666,0-4.856,0.855-6.567,2.568C0.859,214.438,0,216.628,0,219.292v54.816c0,2.663,0.855,4.853,2.568,6.563
                                  c1.715,1.712,3.905,2.567,6.567,2.567h356.313v63.953c0,3.812,1.817,6.57,5.428,8.278c3.62,1.529,6.95,0.951,9.996-1.708
                                  l109.632-101.077c1.903-1.902,2.852-4.182,2.852-6.849C493.356,243.367,492.401,241.181,490.498,239.278z'/>
                       </svg>
                       <input class='inactive' type='submit'>
                    </label>
                 </div>
               </form>

               <form action='/registration' method='post'>
                   <input class='inactive' type='checkbox' name='newRegistration' checked>
                   <label class='registration-form__button'>
                      <span class='registration-form__button_text'>REGISTRATION</span>
                      <svg class='registration-form__button_arrow' viewBox='0 0 493.356 493.356'>
                         <path d='M490.498,239.278l-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427c-3.613,1.525-5.427,4.283-5.427,8.282v63.954H9.136
                               c-2.666,0-4.856,0.855-6.567,2.568C0.859,214.438,0,216.628,0,219.292v54.816c0,2.663,0.855,4.853,2.568,6.563
                               c1.715,1.712,3.905,2.567,6.567,2.567h356.313v63.953c0,3.812,1.817,6.57,5.428,8.278c3.62,1.529,6.95,0.951,9.996-1.708
                               l109.632-101.077c1.903-1.902,2.852-4.182,2.852-6.849C493.356,243.367,492.401,241.181,490.498,239.278z'/>
                      </svg>
                      <input class='inactive' type='submit'>
                   </label>
              </form>
          </div>";
}

function registrationForm(): string
{
    return "<form class='registration__form registration-form' action='/registration' method='post'>
              <label class='registration-form__name'>
                <span class='registration-form__title'>Your Name</span>
                <input class='registration-form__input' type='text' name='firstname' placeholder='First Name'>
                <input class='registration-form__input' type='text' name='lastname' placeholder='Last Name'>
            </label>
            
            <fieldset class='registration-form__gender form-gender'>
                <label class='form-gender__btn'>
                    <input class='form-gender__btn_real' name='gender' value='male' type='radio'>
                    <span class='form-gender__btn_fake'></span>
                    <span class='form-gender__btn_text'>Male</span>
                </label>
                <label class='form-gender__btn'>
                    <input class='form-gender__btn_real' name='gender' value='female' type='radio'>
                    <span class='form-gender__btn_fake'></span>
                    <span class='form-gender__btn_text'>Female</span>
                </label>
                <label class='form-gender__btn form-gender__btn-last'>
                    <input class='form-gender__btn_real' name='gender' value='other' type='radio'>
                    <span class='form-gender__btn_fake'></span>
                    <span class='form-gender__btn_text'>Other</span>
                </label>
            </fieldset>

            <label class='registration-form__name'>
                <span class='registration-form__title'>Login details</span>
                <input class='registration-form__input' type='email' name='email' placeholder='Email'>
                <input class='registration-form__input' type='password' name='password' placeholder='Password'>
                <p class='registration-form__text'> Please use 8 or more characters, with at least 1 number and a mixture of
                    uppercase and lowercase letters </p>
            </label>

            <div class='registration-form__bottom'>
               <input class='inactive' type='checkbox' name='newRegistration' checked>
               <input class='inactive' type='checkbox' name='checkedNewRegistration' checked>
               <label class='registration-form__button'>
                  <span class='registration-form__button_text'>JOIN NOW</span>
                  <svg class='registration-form__button_arrow' viewBox='0 0 493.356 493.356'>
                    <path d='M490.498,239.278l-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427c-3.613,1.525-5.427,4.283-5.427,8.282v63.954H9.136
                          c-2.666,0-4.856,0.855-6.567,2.568C0.859,214.438,0,216.628,0,219.292v54.816c0,2.663,0.855,4.853,2.568,6.563
                          c1.715,1.712,3.905,2.567,6.567,2.567h356.313v63.953c0,3.812,1.817,6.57,5.428,8.278c3.62,1.529,6.95,0.951,9.996-1.708
                          l109.632-101.077c1.903-1.902,2.852-4.182,2.852-6.849C493.356,243.367,492.401,241.181,490.498,239.278z'/>
                  </svg>
                  <input class='inactive' type='submit'>
               </label>
            </div>
        </form>";
}

function goOutForm(): array
{
    $params['className'] = 'valid';
    $params['style'] = 'inactive';
    $params['message'] = "Good afternoon, {$_SESSION['login']}";
    $params['blockForm'] = "<form class='registration__form registration-form' action='/registration' method='post'>
               <input class='inactive' type='checkbox' name='goOut' checked>
               <label class='registration-form__button'>
                  <span class='registration-form__button_text'>go out</span>
                  <svg class='registration-form__button_arrow' viewBox='0 0 493.356 493.356'>
                     <path d='M490.498,239.278l-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427c-3.613,1.525-5.427,4.283-5.427,8.282v63.954H9.136
                           c-2.666,0-4.856,0.855-6.567,2.568C0.859,214.438,0,216.628,0,219.292v54.816c0,2.663,0.855,4.853,2.568,6.563
                           c1.715,1.712,3.905,2.567,6.567,2.567h356.313v63.953c0,3.812,1.817,6.57,5.428,8.278c3.62,1.529,6.95,0.951,9.996-1.708
                           l109.632-101.077c1.903-1.902,2.852-4.182,2.852-6.849C493.356,243.367,492.401,241.181,490.498,239.278z'/>
                  </svg>
                  <input class='inactive' type='submit'>
               </label>
           </form>";
    return $params;
}
