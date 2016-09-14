<?php

/**
 * This script will migrate 'reference_number' meta fields belonging to 'document' posts,
 * to build the normalised index of 'reference_number_prefix' and 'reference_number_number' fields.
 *
 * Run using WP-CLI: wp eval-file wp-content/themes/law-comm/lib/scripts/migrate-document-references.php
 */
global $wpdb;

$documents = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_type = 'document' AND post_status = 'publish'");

foreach ($documents as $document) {
  echo "Migrating document ID: {$document->ID}... ";
  format_document_reference($document->ID);
  echo "done.\n";
}
