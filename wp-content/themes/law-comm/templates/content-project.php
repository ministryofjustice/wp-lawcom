<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    </header>
      <div class="row">

          <div class="col-sm-8 max-col">


            <?php the_field('description');?>


            <h2>Current project status</h2>

            <div class="hidden">

              <p>The current status of this project is: <strong><?php the_field('implementation_status');  ?></strong>.

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

                  if (get_field('implementation_status')) { 

                      $status = get_field('implementation_status'); 

                      if ($status === 'Pre-project') { 
                          $statusClass = 'stage1';

                      } else if ($status === 'Pre-consultation') { 
                          $statusClass = 'stage2';

                      } else if ($status === 'Consultation') { 
                          $statusClass = 'stage3';

                      } else if ($status === 'Analysis of responses') { 
                          $statusClass = 'stage4';

                      } else if ($status === 'Complete') { 
                          $statusClass = 'stage5';

                      } 

                      echo '<div aria-hidden="true" class="status ' . $statusClass . '"><ul class="stages"><li>Pre-project</li><li>Pre-consultation</li><li>Consultation</li><li>Analysis of <br>responses</li><li>Complete</li></ul></div>';
                  }

                  ?>

          <?php the_field('further_description');?>

          <?php

                  if (get_field('youtube_video')) { 

                  echo    '<h2>Relevant video</h2><div class="videoWrapper">';
      
                  _e( wp_oembed_get( get_field( 'youtube_video' ) ) ); 
                  
                  echo '</div>';

                  the_field('video_description');

                  };
          ?>

            <a name="related"></a>

            <h2>Related documents and downloads</h2>
            

            <div class="related">
                            

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOneA">
                      <h3 class="panel-title">
                        <a data-toggle="collapse" href="#collapseOneA" aria-expanded="true" aria-controls="collapseOneA">
                          Reports<span class="toggleText">Open</span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseOneA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneA">
                      <div class="panel-body">

       <ul>

        <?php

          $thisProject = get_the_title();

          $report_args = array(
            'post_type' => 'document',
            'document_type' => 'report',
            'project' => $thisProject );
          
          $report_query = new WP_Query( $report_args );
          // Iterate over entries and display
          while ( $report_query->have_posts() ) : $report_query->the_post();
            ?>

              <li>
                <div class="related-details">

           <h3><?php $taxoField = get_field('Type', get_the_ID()); $docType = get_term($taxoField[0], "document_type"); echo $docType->name; ?></h3>

                  <?php the_excerpt(); ?>

                    <div class="row">

                        <div class="col-sm-6">

                        <h4>Documents</h4>

                           <?php

                        if( have_rows('files') ):

                            while ( have_rows('files') ) : the_row();

                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('file');
                                echo '">';
                                the_sub_field('title');
                                echo '</a>';
                                echo ' <span class="file-meta">PDF, 199kB</span></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo '<p>No documents in this section</p>';

                        endif;

                          ?>

                        </div>

                        <div class="col-sm-6">

                        <h4>Links</h4>

                          <?php

                        // check if the repeater field has rows of data
                        if( have_rows('links') ):

                          // loop through the rows of data
                            while ( have_rows('links') ) : the_row();

                                // display a sub field value
                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('link');
                                echo '">';
                                the_sub_field('title');
                                echo '</a></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo '<p>No links in this section</p>';

                        endif;

                      ?>

                        </div>

                    </div>

                    <hr>

                    <div class="other-meta">
                    <table>
                      <tr>
                        <td><strong>Reference:</strong></td> <td><?php the_field('reference_number'); ?></td>
                      </tr>
                      <tr>
                        <td><strong>Publication date:</strong></td><td><?php the_field('publication_date'); ?></td>
                      </tr>
                      <tr>
                        <td><strong>Response date:</strong></td><td><?php the_field('response_date'); ?></td>
                      </tr>
                    </table>
                    </div>
              </div>
              </li>
            
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>

        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwoA">
                      <h3 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwoA" aria-expanded="false" aria-controls="collapseTwoA">
                          Consultations <span class="toggleText">Open</span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseTwoA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoA">
                      <div class="panel-body">

                  <ul>
                          <?php

                            $thisProject = get_the_title();

                            $report_args = array(
                              'post_type' => 'document',
                              'document_type' => 'consultation',
                              'project' => $thisProject );
                            
                            $report_query = new WP_Query( $report_args );
                            // Iterate over entries and display
                            while ( $report_query->have_posts() ) : $report_query->the_post();
                              ?>
                                <li>
                                  <div class="related-details">

                             <h3><?php $taxoField = get_field('Type', get_the_ID()); $docType = get_term($taxoField[0], "document_type"); echo $docType->name; ?></h3>

                                    <?php the_excerpt(); ?>

                                      <div class="row">

                                          <div class="col-sm-6">

                                          <h4>Documents</h4>

                                             <?php

                                          // check if the repeater field has rows of data
                                          if( have_rows('files') ):

                                            // loop through the rows of data
                                              while ( have_rows('files') ) : the_row();

                                                  // display a sub field value
                                                  echo '<ul>';
                                                  echo '<li><a href="';
                                                  the_sub_field('file');
                                                  echo '">';
                                                  the_sub_field('title');
                                                  echo '</a>';
                                                  echo ' <span class="file-meta">PDF, 199kB</span></li>';
                                                  echo '</ul>';

                                              endwhile;

                                          else :

                                              echo 'No documents in this section';

                                          endif;

                                            ?>

                                          </div>

                                          <div class="col-sm-6">

                                          <h4>Links</h4>

                                            <?php

                                          // check if the repeater field has rows of data
                                          if( have_rows('links') ):

                                            // loop through the rows of data
                                              while ( have_rows('links') ) : the_row();

                                                  // display a sub field value
                                                  echo '<ul>';
                                                  echo '<li><a href="';
                                                  the_sub_field('link');
                                                  echo '">';
                                                  the_sub_field('title');
                                                  echo '</a></li>';
                                                  echo '</ul>';

                                              endwhile;

                                          else :

                                              echo 'No links in this section';

                                          endif;

                                        ?>

                                          </div>
                                      </div>

                                      <hr>

                                      <div class="other-meta">
                                      <table>
                                        <tr>
                                          <td><strong>Reference:</strong></td> <td><?php the_field('reference_number'); ?></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Open date:</strong></td><td><?php the_field('open_date'); ?></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Close date:</strong></td><td><?php the_field('close_date'); ?></td>
                                        </tr>
                                      </table>
                                      </div>
                                </div>
                                </li>
                              
                              <?php endwhile; ?>
                              <?php wp_reset_query(); ?>

                          </ul>

                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThreeA">
                      <h3 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" href="#collapseThreeA" aria-expanded="false" aria-controls="collapseThreeA">
                          Other related project documents <span class="toggleText">Open</span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseThreeA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeA">
                      <div class="panel-body">
                        

                <ul>

        <?php

          $thisProject = get_the_title();

          $report_args = array(
            'post_type' => 'document',
            'document_type' => 'other-project-documents-and-downloads',
            'project' => $thisProject );
          
          $report_query = new WP_Query( $report_args );
          // Iterate over entries and display
          while ( $report_query->have_posts() ) : $report_query->the_post();
            ?>
              <li>
                <div class="related-details">

           <h3><?php $taxoField = get_field('Type', get_the_ID()); $docType = get_term($taxoField[0], "document_type"); echo $docType->name; ?></h3>

                  <?php the_excerpt(); ?>

                    <div class="row">

                        <div class="col-sm-6">

                        <h4>Documents</h4>

                           <?php

                        // check if the repeater field has rows of data
                        if( have_rows('files') ):

                          // loop through the rows of data
                            while ( have_rows('files') ) : the_row();

                                // display a sub field value
                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('file');
                                echo '">';
                                the_sub_field('title');
                                echo '</a>';
                                echo ' <span class="file-meta">PDF, 199kB</span></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo 'No documents in this section';

                        endif;

                          ?>

                        </div>

                        <div class="col-sm-6">

                        <h4>Links</h4>

                          <?php

                        // check if the repeater field has rows of data
                        if( have_rows('links') ):

                          // loop through the rows of data
                            while ( have_rows('links') ) : the_row();

                                // display a sub field value
                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('link');
                                echo '">';
                                the_sub_field('title');
                                echo '</a></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo 'No links in this section';

                        endif;

                      ?>

                        </div>

                    </div>

                    <hr>

                    <div class="other-meta">
                    <table>
                      <tr>
                        <td><strong>Reference:</strong></td> <td><?php the_field('reference_number'); ?></td>
                      </tr>
                      <tr>
                        <td><strong>Publication date:</strong></td><td><?php the_field('publication_date'); ?></td>
                      </tr>
                      <tr>
                        <td><strong>Response date:</strong></td><td><?php the_field('response_date'); ?></td>
                      </tr>
                    </table>
                    </div>
              </div>
              </li>
            

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>

        </ul>


                      </div>
                    </div>
                  </div>

                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFourA">
                      <h3 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" href="#collapseFourA" aria-expanded="false" aria-controls="collapseFourA">
                          Downloads <span class="toggleText">Open</span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseFourA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourA">
                      <div class="panel-body">


                <ul>

        <?php

          $thisProject = get_the_title();

          $report_args = array(
            'post_type' => 'document',
            'document_type' => 'project-related-documents-and-downloads',
            'project' => $thisProject );
          
          $report_query = new WP_Query( $report_args );
          // Iterate over entries and display
          while ( $report_query->have_posts() ) : $report_query->the_post();
            ?>
              <li>
                <div class="related-details">

           <h3><?php $taxoField = get_field('Type', get_the_ID()); $docType = get_term($taxoField[0], "document_type"); echo $docType->name; ?></h3>

                  <?php the_excerpt(); ?>

                    <div class="row">

                        <div class="col-sm-6">

                        <h4>Documents</h4>

                           <?php

                        // check if the repeater field has rows of data
                        if( have_rows('files') ):

                          // loop through the rows of data
                            while ( have_rows('files') ) : the_row();

                                // display a sub field value
                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('file');
                                echo '">';
                                the_sub_field('title');
                                echo '</a>';
                                echo ' <span class="file-meta">PDF, 199kB</span></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo 'No documents in this section';

                        endif;

                          ?>

                        </div>

                        <div class="col-sm-6">

                        <h4>Links</h4>

                          <?php

                        // check if the repeater field has rows of data
                        if( have_rows('links') ):

                          // loop through the rows of data
                            while ( have_rows('links') ) : the_row();

                                // display a sub field value
                                echo '<ul>';
                                echo '<li><a href="';
                                the_sub_field('link');
                                echo '">';
                                the_sub_field('title');
                                echo '</a></li>';
                                echo '</ul>';

                            endwhile;

                        else :

                            echo 'No links in this section';

                        endif;

                      ?>

                        </div>

                    </div>

              </div>
              </li>
            

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>

        </ul>


                      </div>
                    </div>
                  </div>
                </div>


            </div>

          </div>


          <div class="col-sm-4 min-col">

          <div class="project-details">

            <h3>Project details</h3>
            
              <h4>Area of law</h4>
                <p><?php $field = get_field('areas_of_law'); $area_of_law = get_term($field[0], "areas_of_law"); echo $area_of_law->name; ?></p>
              <h4>Team</h4>
               <p><?php $field = get_field('team'); $team = get_term($field[0], "team"); echo $team->name; ?></p>
              <h4>Commissioner</h4>
                <p><?php $field = get_field('commissioners'); $commissioners = get_term($field[0], "commissioner"); echo $commissioners->name; ?></p>
              <h4>Start date</h4>
                <p><?php the_field('start_date');  ?></p>
              <h4>End date</h4>
                <p><?php the_field('end_date');  ?></p>
              <h4>Parent project</h4>
                <p><a href="<?php $postid = url_to_postid( the_field('parent_project') ); ?>"><?php echo get_the_title( $postid ); ?></p>
                
          </div>

          <a href="#related" class="jumpAround">Related documents and downloads</a>
     
          </div>

      </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
