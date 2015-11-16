<?php

$records = new WP_Query(array(
  'post_type' => 'report_status',
  'meta_key' => 'reference',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
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
            <td><?php the_title(); ?></td>
            <td><?php echo \Content\CPT\ReportStatus::get_status(get_the_ID()); ?></td>
            <td><?php the_field('related_measures'); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

<script src="https://rawgit.com/mkoryak/floatThead/1.3.1/dist/jquery.floatThead.min.js"></script>
<script>
  jQuery(window).load(function() {
//    jQuery('.implementation-table').stickyTableHeaders({fixedOffset: $('#wpadminbar')});
    var top = 0;
    if ($('#wpadminbar').length > 0) {
      top = $('#wpadminbar').height();
    }
    jQuery('.implementation-table').floatThead({top: top});
  });
</script>
