<?php

namespace Drupal\qed42\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Provides a 'ExtractArticleSource' migrate process plugin.
 *
 * @MigrateProcessPlugin(
 *  id = "extract_article_source"
 * )
 */
class ExtractArticleSource extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Plugin logic goes here.
    $source = '';

    if (!empty($value)) {
      // Parse url to fetch path.
      $parsed_url = parse_url($value);
      // Extract source from host.
      $source = $parsed_url['host'];
    }

    return $source;
  }

}
