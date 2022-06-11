<?php

use core\forms\Form;
use core\View;


/** @var $this View */

$this->title = 'Register';

?>

<section>
    <div class="imgBox">
        <img src="<?= asset('/assets/img/img.jpg') ?>" alt="">
    </div>
    <div class="contentBox mt-4">
        <div class="formBox">
            <h2>Register</h2>
            <form action="" method="post">
                <?= Form::csrfField() ?>
                <div class="inputBox">
                    <?= Form::inputField('Username', 'username', $user->username, ['type' => 'text'], [], $errors) ?>
                </div>
                <div class="inputBox">
                    <?= Form::inputField('E-mail', 'email', $user->email, ['type' => 'email'], [], $errors) ?>
                </div>
                <div class="inputBox">
                    <?= Form::inputField('Password', 'password', '', ['type' => 'password'], [], $errors) ?>
                </div>
                <div class="inputBox">
                    <?= Form::inputField('Comfirm Password', 'confirmPassword', '', ['type' => 'password'], [], $errors) ?>
                </div>
                <div class="remember">
                    <?= Form::checkInput('Terms and Conditions', 'terms', $user->terms, ['class' => 'form-check-input'], ['class' => 'form-check'], $errors); ?>
                </div>
                <div class="inputBox">
                    <button type="submit">Sign Up</button>
                </div>
                <div class="inputBox">
                    <p>Already a Member? <a href="/login">Sign In</a></p>
                </div>

            </form>
            <h3 class="h6">Login with Social media</h3>
            <ul class="sci">
                <li><i class="fab fa-facebook"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>
        </div>
    </div>
</section>