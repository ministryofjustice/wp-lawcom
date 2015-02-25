<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    </header>
      <div class="row">

          <div class="col-sm-8 max-col">

            <?php the_content(); ?>
            <h2>Relevant video</h2>
            <div class="videoWrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/y0QLiNH5ZHM" frameborder="0" allowfullscreen></iframe>
            </div>
            <a name="related"></a>
            <p>Any details about the video</p>
            

            <div class="related">
                            

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <h2>Reports</h2>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOneA">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneA" aria-expanded="true" aria-controls="collapseOneA">
                          Title of report A <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOneA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneA">
                      <div class="panel-body">
                        <p>Details about the report lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the report as a PDF (English)</a></p>
                        <p><a href="#">Link to the report 2 as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOneB">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneB" aria-expanded="true" aria-controls="collapseOneB">
                          Title of report B <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOneB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneB">
                      <div class="panel-body">
                        <p>Details about the report lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the report as a PDF (English)</a></p>
                        <p><a href="#">Link to the report 2 as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOneC">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneC" aria-expanded="true" aria-controls="collapseOneC">
                          Title of report C <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOneC" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneC">
                      <div class="panel-body">
                        <p>Details about the report lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the report as a PDF (English)</a></p>
                        <p><a href="#">Link to the report 2 as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>



                <h2>Consultations</h2>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwoA">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoA" aria-expanded="false" aria-controls="collapseTwoA">
                          Title of consultation A <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwoA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoA">
                      <div class="panel-body">
                        <p>Details about the consultation lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the consultation as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwoB">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoB" aria-expanded="false" aria-controls="collapseTwoB">
                          Title of consultation B <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwoB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoB">
                      <div class="panel-body">
                        <p>Details about the consultation lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the consultation as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>

                  <h2>Other related project documents</h2>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThreeA">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeA" aria-expanded="false" aria-controls="collapseThreeA">
                          Title of document <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThreeA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeA">
                      <div class="panel-body">
                        <p>Details about the document lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the document as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>
                <h2>Downloads</h2>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFourA">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourA" aria-expanded="false" aria-controls="collapseFourA">
                          Title of download A <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFourA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourA">
                      <div class="panel-body">
                        <p>Details about the download lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the download as a PDF (English)</a></p>
                      </div>
                    </div>
                  </div>
                      <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFourB">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourB" aria-expanded="false" aria-controls="collapseFourB">
                          Title of download B <span class="right">Open</span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFourB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourB">
                      <div class="panel-body">
                        <p>Details about the download lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

                        <p><a href="#">Link to the download as a PDF (English)</a></p>
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
                <p>Public law</p>
              <h4>Team</h4>
               <p>Name</p>
              <h4>Commissioner</h4>
                <p>Name</p>
              <h4>Start date</h4>
                <p>11/02/2014</p>
              <h4>End date</h4>
                <p>12/02/2014</p>
              <h4>Parent projects</h4>
                <p><a href="#">Parent project 1</a></p>
                <p><a href="#">Parent project 1</a></p>

                
          </div>

          <a href="#related" class="jumpAround">Related documents and downloads</a>



            
          </div>

      </div>


          


    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
