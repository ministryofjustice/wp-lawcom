<?php while (have_posts()) : the_post(); ?>
<?php $project_title = get_the_id(); ?>
<article <?php post_class(); ?>>
  <header><h1 class="entry-title"><?php the_title(); ?></h1></header>
  <div class="row">
    <div class="col-sm-8 max-col">
      <?php $parent = url_to_postid(get_field('parent_project')); ?>
      <?php if(!empty($parent)): ?>
        <div class="emph-box">
        <h2>Main project: <a href="<?= get_permalink($parent); ?>"><?= get_the_title($parent); ?></a></h2>
        </div>
      <?php endif; ?>
      <?php
      $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'meta_query' => array(
          array(
            'key'     => 'parent_project',
            'value'   => $post->ID,
          ),
        ),
      );
      $query = new WP_Query($args);
      ?>
      <?php if ( $query->have_posts() ): ?>
        <div class="emph-box">
        <h2>Sub-projects</h2>
        <ul>
        <?php while ( $query->have_posts() ): $query->the_post(); ?>
          <li><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul></div>
      <?php else: ?>

       <?php if( get_field('disable_implementation_status') )
          {
            echo "";
          }
        else
        { ?>

      <h2>Current project status</h2>
        <div class="hidden">
          <p>The current status of this project is: <strong><?php the_field('implementation_status');  ?></strong>.</p>
          <h3>List of project stages:</h3>
          <ol>
            <li>Pre-project</li>
            <li>Pre-consultation</li>
            <li>Consultation</li>
            <li>Analysis of responses</li>
            <li>Complete</li>
          </ol>
        </div>
        <?php
        $implementation_status = get_field('implementation_status');
        if($implementation_status){
          switch ($implementation_status) {
            case "Pre-project":
                $i = 1;
                break;
            case "Pre-consultation":
                $i = 2;
                break;
            case "Consultation":
                $i = 3;
                break;
            case "Analysis of responses":
                $i = 4;
                break;
            case "Complete":
                $i = 5;
                break;
          } ?>
          <div aria-hidden="true" class="status stage<?= $i ?>">
            <ul class="stages">
              <li class="r1">Initiation</li>
              <li class="r2">Pre-consultation</li>
              <li class="r3">Consultation</li>
              <li class="r4">Policy development</li>
              <li class="r5">Reported</li>
            </ul>
          </div>
          <ul class="rollovers">
            <li id="r1"<?php if($i == 1): echo ' class="default"'; endif; ?>><strong>Initiation:</strong> Could include discussing scope and terms of reference with lead Government Department</li>
            <li id="r2"<?php if($i == 2): echo ' class="default"'; endif; ?>><strong>Pre-consultation:</strong> Could include approaching interest groups and specialists, producing scoping and issues papers, finalising terms of project</li>
            <li id="r3"<?php if($i == 3): echo ' class="default"'; endif; ?>><strong>Consultation:</strong> Likely to include consultation events and paper, making provisional proposals for comment</li>
            <li id="r4"<?php if($i == 4): echo ' class="default"'; endif; ?>><strong>Policy development:</strong> Will include analysis of consultation responses. Could include further issues papers and consultation on draft Bill</li>
            <li id="r5"<?php if($i == 5): echo ' class="default"'; endif; ?>><strong>Reported:</strong> Usually recommendations for law reform but can be advice to government, scoping report or other recommendations</li>
          </ul>

        <?php }; ?>

          <p><strong><?php the_field('status');  ?></strong></p>
        <?php } ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      <?php the_field('description');?>
      <?php the_field('further_description');?>
      <?php if (get_field('youtube_video')): ?>
        <div class="videoWrapper">
          <?= _e( wp_oembed_get( get_field( 'youtube_video' ) ) ); ?>
        </div>
        <?= get_field('video_description'); ?>
      <?php endif; ?>

      <a name="related"></a>

      <?php if (project_has_documents($project_title)): ?>
        <div class="related">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            $document_types = array('reports-related-documents','consultations-related-documents','other-documents-more-information');
            $i = 0;
            foreach($document_types as $document_type):
            $post = get_post($project_title);
            $args = array(
              'post_type' => 'document',
              'document_type' => $document_type,
              'meta_query' => array(array(
                'key' => 'project',
                'value' => $project_title,
                'compare' => '='
              ))

            );

            $query = new WP_Query($args);
            ?>
            <?php if($query->have_posts()): ?>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOneA">
                <h3 class="panel-title">
                  <a data-toggle="collapse" href="#collapse<?= $i; ?>" aria-expanded="true" aria-controls="collapse<?= $i; ?>">
                    <?php $docType = get_term_by('slug', $document_type, "document_type"); echo $docType->name; ?><span class="toggleText">Open</span></a>
                </h3>
              </div>
              <div id="collapse<?= $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneA">
                <div class="panel-body">
                  <ul>
                  <?php while($query->have_posts()): $query->the_post(); ?>
                    <?php if(have_rows('files') || have_rows('links')): ?>
                    <li>
                    <a name="<?= $post->post_name; ?>"></a>
                      <div class="related-details">
                        <!-- <h3><?php if(get_field('title')): ?><?= get_field('title'); ?><?php else: ?><?php $taxoField = get_field('Type', get_the_ID()); $docType = get_term($taxoField[0], "document_type"); echo $docType->name; ?><?php endif; ?></h3> -->
                        <!--<?php the_excerpt(); ?>-->
                        <div class="row">
                            <?php if( have_rows('files') ): ?>
                            <div class="col-sm-<?php if(have_rows('links')): ?>6<?php else: ?>12<?php endif; ?>">
                              <h4>Documents</h4>
                              <ul>
                              <?php while ( have_rows('files') ) : the_row(); ?>
                                <?php if(get_sub_field('file')): ?>
                                  <?php $file = get_sub_field('file'); ?>
                                  <li>
                                    <a href="<?= wp_get_attachment_url($file); ?>"><?= get_sub_field('title'); ?></a>
                                    <span class="file-meta"><?= attachment_file_meta($file) ?></span>
                                  </li>
                                <?php endif; ?>
                              <?php endwhile; ?>
                              </ul>
                            </div>
                            <?php endif; ?>
                            <?php if( have_rows('links') ): ?>
                            <div class="col-sm-<?php if(have_rows('files')): ?>6<?php else: ?>12<?php endif; ?>">
                              <h4>Links</h4>
                              <ul>
                              <?php while ( have_rows('links') ) : the_row(); ?>
                                <li><a href="<?= get_sub_field('link') ?>"><?= get_sub_field('title') ?></a></li>
                              <?php endwhile; ?>
                              </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="other-meta">
                          <table>
                            <?php if(get_field('reference_number')): ?>
                              <tr>
                                <td><strong>Reference:</strong></td> <td><?php the_field('reference_number'); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php $date = DateTime::createFromFormat('Y-m-d', get_field('publication_date')); ?>
                            <?php if (!empty($date)): ?>
                              <tr>
                                <td><strong>Publication date:</strong></td><td><?php echo $date->format('j F Y') ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if(get_field('response_date')): ?>
                              <tr>
                                <td><strong>Response date:</strong></td><td><?php the_field('response_date'); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if(get_field('open_date')): ?>
                              <tr>
                                <td><strong>Open date:</strong></td><td><?php the_field('open_date'); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if(get_field('close_date')): ?>
                              <tr>
                                <td><strong>Close date:</strong></td><td><?php the_field('close_date'); ?></td>
                              </tr>
                            <?php endif; ?>
                          </table>
                        </div>
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php endwhile; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php $i++; ?>
          <?php endforeach; ?>
          <?php wp_reset_query(); ?>
          <?php wp_reset_postdata(); ?>
          <?php $query = NULL; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="col-sm-4 min-col">
      <?php if (project_has_documents($project_title)): ?>
        <a href="#related" class="jumpAround">Documents and downloads</a>
      <?php endif; ?>
      <div class="project-details">
        <h3>Project details</h3>
        <?php if($field = get_field('areas_of_law')): ?>
        <h4>Area of law</h4>
        <p><?php $area_of_law = get_term($field, "areas_of_law"); echo $area_of_law->name; ?></p>
        <?php endif; ?>

        <?php if($field = get_field('team')): ?>
        <h4>Team</h4>
        <p><?php $team = get_term($field, "team"); echo $team->name; ?></p>
        <?php endif; ?>

        <?php if($field = get_field('commissioners')): ?>
        <h4>Commissioner</h4>
        <p><?php $commissioners = get_term($field, "commissioner"); echo $commissioners->name; ?></p>
        <?php endif; ?>

        <?php if($field = get_field('start_date')): ?>
        <h4>Start date</h4>
        <p><?php the_field('start_date');  ?></p>
        <?php endif; ?>

        <?php if($field = get_field('end_date')): ?>
        <h4>End date</h4>
        <p><?php the_field('end_date');  ?></p>
        <?php endif; ?>

        <?php /*<?php if($parent = get_field('parent_project')): ?>
        <h4>Parent project</h4>
        <p><a href="<?= get_permalink($parent->ID ); ?>"><?php echo get_the_title( $parent->ID ); ?></p>
        <?php endif; ?>*/ ?>
      </div>
    </div>
  </div>
</article>
<?php endwhile; ?>
