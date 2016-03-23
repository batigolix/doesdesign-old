<?php

/**
 * @file
 * Contains \Drupal\dd_tools\Plugin\Block\Dd_toolsSocials .
 */

namespace Drupal\dd_tools\Plugin\Block;

use Drupal\Core\block\BlockBase;
//use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
//use Drupal\Core\Session\AccountInterface;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;


/**
 * Provides a 'Example: configurable text string' block.
 *
 * @Block(
 *   id = "socials",
 *   subject = @Translation("Socials"),
 *   admin_label = @Translation("DD tools: Socials")
 * )
 */
class Dd_toolsSocials extends BlockBase {

  /**
   * Implements \Drupal\Core\Block\BlockBase::blockBuild().
   */
  public function build() {


    $socials = array(
      array(
        'name' => 'Facebook',
        'img' => 'facebook-logo.png',
        'cta' => t('Visit Doesdesign at Facebook'),
        'url' => 'https://www.facebook.com/Doesdesign.nl',
        'class' => 'facebook',
      ),
      array(
        'name' => 'Linkedin',
        'img' => 'linkedin-logo.png',
        'cta' => t('Visit Birigit at Linkedin'),
        'url' => 'http://nl.linkedin.com/in/birgitdoesborg',
        'class' => 'linkedin',
      ),
      array(
        'name' => 'Twitter',
        'img' => 'twitter-logo.png',
        'cta' => t('Tweet Birigit'),
        'url' => 'http://twitter.com/#!/Doesdesign_nl',
        'class' => 'twitter',
      ),
      array(
        'name' => 'YouTube',
        'cta' => t('Visit YouTube page'),
        'img' => 'youtube-logo.png',
        'url' => 'http://www.youtube.com/user/metalartcreations',
        'class' => 'youtube',
      ),
    );
    $img_path = drupal_get_path('module', 'dd_tools') . '/images/';
    $items = array();
    foreach ($socials as $social) {


//     $img = set('logo.url', file_create_url($theme_object->getPath() . '/logo.png'))

//      $img = theme('image', array(
//        'path' => $img_path . $social['img'], 'attributes' => array(
//          'title' => $social['cta'],
//          'alt' => $social['name'],
//        )
//      ));

//      $img = $social['name'];

      $items[] = $social['name'];


//$items[] = \Drupal::l($img, $social['url'], array('html' => TRUE, 'attributes' => array('class' => array('social', $social['class']), 'alt' => $social['cta'])));

$items[] = \Drupal::l('hej',new Url('/'));
    }
//    $build['doespic'] = array(
//      '#theme' => 'image',
//      '#path' => $img_path . 'Doesklein.jpg',
//      '#attributes' => array(
//        'class' => array(
//          'doespic'
//        ),
//        'title' => 'Birgit Doesborg',
//        'alt' => 'Foto Birgit Doesborg',
//      ),
//    );
//    $build['about']['#markup'] = '<div class="about"><strong>' . \Drupal::l('Birgit Doesborg', 'about') . '</strong>, Goud- en zilversmid.</div>';
//    $build['contact_link']['#markup'] = '<div class="contact"><strong>' . \Drupal::l('Contact', 'contact') . '</strong></div>';
    $build['social'] = array(
      '#theme' => 'item_list',
      '#items' => $items,
      '#attributes' => array('class' => array('socialist')),
    );



//    $build['doh'] = array(
//      '#theme' => 'item_list',
//      '#items' => $missing_extensions,
//    );
//    $description .= drupal_render($item_list);



    return $build;

  }

}
