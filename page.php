<?php get_header(); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if( is_page( 'superfoods' )):?>
                  <div class="container page-setup">
                      <div class="row page-top" >
                          <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                      </div>
                      <div class="row">
                          <?php the_content(); ?>
                      </div>
                  </div>
                  <div align="center" class="superfoodSidenav hidden-sm hidden-xs">
                    <h2><i class="pe-7s-search"></i> Unsere Superfoods</h2>
                    <div class="btn-group-vertical" role="group" aria-label="superfoodSidenavBtns">
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/gerstengras/" role="button">Gerstengras</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/moringa/" role="button">Moringa</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/spirulina/" role="button">Spirulina</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/lucuma/" role="button">Lucuma</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/baobab/" role="button">Baobab</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/maca/" role="button">Maca</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/aronia/" role="button">Aronia</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/guarana/" role="button">Guarana</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/amla/" role="button">Amla</a>
                      <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/brahmi/" role="button">Brahmi</a>
                    </div>
                  </div>
                <?php elseif( is_child( 'superfoods' ) && !is_page( 'superfoods' )):?>
                    <div class="container page-setup">
                        <div class="row page-top">
                            <h2 class=""><a href="<?php the_permalink() ?>">Superfood - <?php the_title(); ?></a></h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 superfoodThumbnail"><?php if(has_post_thumbnail()) {the_post_thumbnail();} ?></div>
                            <div class="col-sm-8"><?php the_content(); ?></div>
                        </div>
                    </div>
                    <div align="center" class="superfoodSidenav Detail hidden-sm hidden-xs">
                      <h2><i class="pe-7s-search"></i> Unsere Superfoods</h2>
                      <div class="btn-group-vertical" role="group" aria-label="superfoodSidenavBtns">
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/" role="button"><span class="pe-7s-back" aria-hidden="true"></span>Zurück zur Übersicht</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/gerstengras/" role="button">Gerstengras</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/moringa/" role="button">Moringa</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/spirulina/" role="button">Spirulina</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/Lucuma/" role="button">Lucuma</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/baobab/" role="button">Baobab</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/maca/" role="button">Maca</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/aronia/" role="button">Aronia</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/guarana/" role="button">Guarana</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/amla/" role="button">Amla</a>
                        <a class="btn btn-default" href="http://localhost/yourdailygreen/superfoods/brahmi/" role="button">Brahmi</a>
                      </div>
                    </div>
                  <?php elseif( is_page( 'team-dailygreen' )):?>
                      <div class="container page-setup">
                          <div class="row page-top" >
                              <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                          </div>
                          <div class="row teamBackground">
                              <?php the_content(); ?>
                          </div>
                      </div>
                <?php else:?>
                    <div class="container page-setup">
                        <div class="row page-top" >
                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <div class="row">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; endif; ?>
<?php get_footer(); ?>
