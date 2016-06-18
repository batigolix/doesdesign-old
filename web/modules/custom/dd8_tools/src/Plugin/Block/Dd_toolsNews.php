<?php

/**
 * @file
 * Contains \Drupal\dd_tools\Plugin\Block\Dd_toolsNews .
 */

namespace Drupal\dd_tools\Plugin\Block;

use Drupal\Core\block\BlockBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'Example: configurable text string' block.
 *
 * @Block(
 *   id = "News",
 *   subject = @Translation("News"),
 *   admin_label = @Translation("DD tools: News")
 * )
 */
class Dd_toolsNews extends BlockBase {

  /**
   * Overrides \Drupal\Core\Block\BlockBase::defaultConfiguration().
   */
  public function defaultConfiguration() {
    return array(
      'label' => t("News"),
      'content' => t('Default news content'),
      'cache' => array(
        'max_age' => 3600,
        'contexts' => array(
          'cache_context.user.roles',
        ),
      ),
    );
  }

  /**
   * Overrides \Drupal\Core\Block\BlockBase::blockForm().
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['content'] = array(
      '#type' => 'textfield',
      '#title' => t('Block contents'),
      '#size' => 60,
      '#description' => t('This text will appear in the demo block.'),
      '#default_value' => $this->configuration['content'],
    );

    $form['news_items'] = array(
      '#type' => 'select',
      '#options' => array(2 => 2, 5 => 5, 10 => 10),
      '#description' => t('This number of items will be shown in the news block'),
      '#title' => t('Number of items'),
      '#default_value' => $this->configuration['news_items'],
    );

    $form['block_count'] = array(
      '#type' => 'select',
      '#options' => array(2 => 2, 5 => 5, 10 => 10),
      '#description' => t('This number of items will be shown in the news block'),
      '#title' => t('Number of items'),
      '#default_value' => $this->configuration['block_count'],
    );

    return $form;
  }

  /**
   * Overrides \Drupal\Core\Block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['content'] = $form_state->getValue('content');
  }

  /**
   * Implements \Drupal\Core\Block\BlockBase::blockBuild().
   */
  public function build() {

//  case 'News':
//      $blocks['subject'] = t('Photo\'s on News');
//      $blocks['content'] = array(
//        '#markup' => '<div id="News_images"> </div>',
//        '#attached' => array(
//          'js' => array(
//            'data' => drupal_get_path('module', 'dd_tools') . '/js/News.js',
//            array(
//              'data' => array(
//                'dd_tools' => array(
//                  'block_items' => variable_get('News_items', 13),
//                ),
//              ),
//              'type' => 'setting',
//            ),
//          ),
//        ),
//      );


    $query = db_select('node', 'n')
      ->fields('n')
      ->addTag('node_access')
//      ->addMetaData('base_table', 'forum_index')
//      ->orderBy('created', 'DESC')
      ->range(0, $this->configuration['block_count']);


    $result = $query->execute();
    dpm($result);

    foreach($result as $row) {
      dsm($row);
      var_dump($row);
    }

    $elements = array();
    if ($node_title_list = node_title_list($result)) {
      $elements['forum_list'] = $node_title_list;
//      $elements['forum_more'] = array(
//        '#type' => 'more_link',
//        '#url' => Url::fromRoute('forum.index'),
//        '#attributes' => array('title' => $this->t('Read the latest forum topics.')),
//      );
    }
    $build = array();
    $build['elements']['#markup'] = $elements;
    $build['elements']['#markup'] = 'sdfsdafsd';

    $build['container']['#markup'] = '<div id="News_images">sdcsadvsdvsd </div>';
//    $test = \Drupal::config('nognix.settings')->get('doh_you');
//    $build['stuff2']['#markup'] = $this->configuration['content'];
//    $build['#attached']['library'][] = 'dd_tools/News';
    $build['#attached']['library'][] = 'dd_tools/misc';
    return $build;
  }

}
