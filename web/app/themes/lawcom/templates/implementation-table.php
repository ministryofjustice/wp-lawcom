<?php

$records = new WP_Query(array(
  'post_type' => 'report_status',
  'meta_key' => 'reference',
  'orderby' => 'meta_value_num',
  'order' => 'DESC',
  'posts_per_page' => -1,
));

$current_year = 0;

?>

<?php if ($records->have_posts()): ?>
  <div class="table-responsive">
    <table class="table implementation-table">
      <thead style="background:#fff">
        <th style="width:10%">LC No</th>
        <th style="width:40%">Title</th>
        <th style="width:25%">Status</th>
        <th style="width:25%">Related Measures</th>
      </thead>
      <tbody>
        <?php while ($records->have_posts()): $records->the_post(); ?>
          <?php if (get_field('year') !== $current_year): $current_year = get_field('year'); ?>
            <tr class="active">
              <td>&nbsp;</td>
              <th colspan="3"><?php echo $current_year; ?></th>
            </tr>
          <?php endif; ?>
          <tr>
            <td><?php the_field('reference'); ?></td>
            <td>
              <?php

              $associatedProject = get_field('associated_project');

              if ($associatedProject) {
                echo '<a href="' . get_permalink($associatedProject) . '" title="Read more about this project">';
              }

              the_title();

              if ($associatedProject) {
                echo '</a>';
              }

              ?>
            </td>
            <td><?php echo \Content\CPT\ReportStatus::get_status(get_the_ID()); ?></td>
            <td><?php the_field('related_measures'); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>
