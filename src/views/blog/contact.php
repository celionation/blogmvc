<?php


/** @var $this core\View */

use core\Session;
use core\forms\Form;

$this->title = 'Blog Contact Page';

global $currentUser;

?>


<?= partials('partials/welcome') ?>

<main class="container-fluid mt-1">
    <div class="about position-relative overflow-hidden text-center d-flex justify-content-center">
        <img src="/assets/img/about-heading.jpg" alt="" class="w-100">
        <div class="about-head position-absolute bottom-50 top-0">
            <h3 class="text-danger mt-3">About Us</h3>
            <h1 class="text-white text-uppercase fw-bold fs-1">CNB</h1>
        </div>
    </div>
    <?= Session::displaySessionAlerts() ?>
    <h2 class="text-black h3 border-bottom border-danger border-3 p-3">Our Background</h2>
    <section>
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                <img src="/assets/img/file.jpg" alt="" class="w-100 img-fluid">
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                <h2 class="text-shadow h3 text-uppercase border-bottom border-3 border-danger pb-2 text-black text-start">About CNB</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci corporis vel optio modi beatae, sunt hic culpa saepe atque ratione soluta doloremque. Quis aliquid vero quisquam, fugiat explicabo adipisci ab. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic voluptatum natus sed soluta vitae quod eum enim sint dolores omnis delectus quae voluptatem numquam, esse facere vel at quam. Beatae.</p>
            </div>
        </div>
    </section>
    <h2 class="text-black border-3 border-danger border-bottom p-2 border-top">Contact Us</h2>
    <section>
        <div class="row">
            <div class="col-12 col-lg-8 col-md-6 col-sm-12">
                <form action="" method="post" class="border-end border-3 border-danger p-2">
                    <?= Form::csrfField() ?>
                    <?php /** @var mixed $currentUser */ ?>
                    <?= Form::inputField('', 'fullname', $currentUser->username ?? $contact->fullname, ['class' => 'form-control', 'placeholder' => 'FullName'], ['class' => 'mb-3'], $errors) ?>

                    <?= Form::inputField('', 'email', $currentUser->email ?? $contact->email, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'type' => 'email'], ['class' => 'mb-3'], $errors) ?>

                    <?= Form::inputField('', 'subject', $contact->subject, ['class' => 'form-control', 'placeholder' => 'Subject'], ['class' => 'mb-3'], $errors) ?>

                    <?= Form::textareaField('', 'message', $contact->message, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Your Message Here ...'], ['class' => 'mb-3'], $errors) ?>
                    <button type="submit" class="btn btn-danger w-100">Send Message</button>
                </form>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                About the Founder
                            </button>
                        </h4>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At est assumenda nam autem pariatur sit deserunt blanditiis facere labore illo placeat ut quibusdam voluptate, culpa excepturi ipsa temporibus nemo odit?
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Mission And Aim
                            </button>
                        </h4>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem rerum illo recusandae dicta quos saepe repudiandae sunt. Omnis numquam tempora, rem ipsum et asperiores ipsa enim, corrupti tenetur consequatur nisi!
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>