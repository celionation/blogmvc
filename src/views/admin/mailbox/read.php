<?php


/** @var $this View */

use core\View;

$this->title = 'Admin Mailbox Read';

?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0 p-0">Folders</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Inbox
                                    <span class="badge bg-primary float-right text-white">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Drafts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-filter"></i> Junk
                                    <span class="badge bg-warning float-right text-dark">65</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-trash-alt"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header bg-white d-flex m-0 p-0 pt-2 px-1 justify-content-between align-items-center text-muted">
                        <h6 class="card-title">Read Mail</h6>

                        <div class="card-tools">
                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info py-2">
                            <h5 class="m-0">Message Subject Is Placed Here</h5>
                            <h6>From: support@adminlte.io
                                <span class="mailbox-read-time float-right text-muted small">15 Feb. 2015 11:03 PM</span>
                            </h6>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <hr class="my-1">
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm" title="Print">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                        <hr class="my-1">
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message px-2">
                            <p>Hello John,</p>

                            <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                                on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                                master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                                gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
                                asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
                                blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
                                Apparel.</p>

                            <p>Raw denim McSweeney's bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B
                                literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar
                                toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth
                                umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B
                                flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed
                                slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix.
                                Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore
                                whatever viral Truffaut.</p>

                            <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny
                                pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar
                                toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo
                                locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney's messenger bag swag
                                slow-carb. Odd Future photo booth pork belly, you probably haven't heard of them actually tofu ennui
                                keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>

                            <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray
                                leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American
                                Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral
                                plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid
                                vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha
                                flannel chambray chia cronut.</p>

                            <p>Thanks,<br>Jane</p>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-outline-secondary"><i class="fas fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-outline-secondary"><i class="fas fa-share"></i> Forward</button>
                        </div>
                        <button type="button" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->