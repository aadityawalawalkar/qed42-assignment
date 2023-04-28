<?php

namespace Drupal\qed42\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Provides a 'ExtractArticleCategory' migrate process plugin.
 *
 * @MigrateProcessPlugin(
 *  id = "extract_article_category"
 * )
 */
class ExtractArticleCategory extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Plugin logic goes here.
    $category = '';

    if (!empty($value)) {
      // Parse url to fetch path.
      $parsed_url = parse_url($value);
      // Extract first path from path key.
      $cat = explode('/', ltrim($parsed_url['path'], '/'));
      // Seperate by hyphen.
      $cat = explode('-', current($cat));
      // Concat by a space & capitalize first letter of each word.
      $category = ucwords(implode(' ', $cat));
    }

    return $category;
  }

}
