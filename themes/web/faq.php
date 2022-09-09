<?php
$this->layout("_theme",["categories" => $categories]);
?>

<!--=========================
=            FAQ            =
==========================-->

<section class="section faq">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Our <span class="alternate">FAQ</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore dolore magna</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion-block">
                    <div id="accordion">
                        <!-- Collapse -->

                        <?php
                        foreach ($faqs as $faq)
                        {
                        ?>
                            <div class="card">
                                <!-- Collapse Header -->
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne">
                                            <span class="fa fa-plus-circle"></span><?= $faq->question; ?>
                                        </a>
                                    </h5>
                                </div>
                                <!-- Collapse Body -->
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <?= $faq->answer; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====  End of FAQ  ====-->
