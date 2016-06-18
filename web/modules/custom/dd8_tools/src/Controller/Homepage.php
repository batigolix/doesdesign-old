<?php
/**
 * @file
 * Contains \Drupal\dd8_tools\Controller\Homepage.
 */

namespace Drupal\dd8_tools\Controller;

use Drupal\Core\Controller\ControllerBase;

class Homepage extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello, World!'),
    );
  }
}
?>