<?php
/*
Template Name: Main Content #1
*/
?>

<?php get_header(); ?>


<div class="container main-wrap">


    <div class="columns is-multiline">



        <div class="column is-12">
            <p class="title is-1 page-title"><?php the_field('main_title');?></p>
            <div class="content">
                <?php the_field('main_description');?>

            </div>
        </div>
        <div class="column">
            <div class="box txt-center">
              <div class="content">
              <?php the_field('box_1_content');?>
            </div>
            </div>
        </div>
        <div class="column is-narrow">
            <div class="panel">
                <div class="panel-block no-flex txt-center">
                    <div class="content">
                        <?php the_field('box_2_content');?>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-12">


            <div class="columns is-multiline is-mobile">

              <?php include get_template_directory() . '/cpt-templates/post-module.php'; ?>


            </div>
        </div>
        <div class="column is-6">
            <div class="panel">
                <div class="panel-block title is-4"><span class="panel-icon"><img src="/media/icons/pedal.png"></span>RENT CUSTOM GUITAR PEDALS</div>
                <div class="panel-block no-flex txt-center">
                    <div class="content">
                        <p class="title is-5"><strong>Handbuilt by local ledgend Roland drummond</strong></p>
                        <p>Fuzz / Sustain / Bass green / Treble boost / ODDF1-1 overdrive / Harmonic percolator / Bass boost + more</p>
                        <hr>
                        <p><strong>Ask at reception</strong> for more details...</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-6">
            <div class="panel">
                <div class="panel-block title is-4"><span class="panel-icon"><img src="/media/icons/mpc.png"></span>GUITAR SET-UP & REPAIRS</div>
                <div class="panel-block no-flex txt-center">
                    <div class="content">
                        <p class="title is-5"><strong>We highly reccomend and trust our friend Pedro Martins for all your guitar repair and setup needs</strong></p>
                        <p>Contact Pedro:</p>
                        <p> <strong>01273 381044</strong><br><strong>07799563874  </strong></p>
                        <hr>
                        <p><strong>Ask at reception</strong> for more details... </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php get_footer(); ?>
