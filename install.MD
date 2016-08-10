composer create-project drupal-composer/drupal-project:8.x-dev dd --stability dev --no-interaction

composer install

````
../vendor/drush/drush/drush si minimal --db-url=mysql://root:root@localhost/dd1
```

drush @dd8.val en shakudo

drush rsync @dd.a2h:%files/ @dd8.val:%files


chmod a+w sites/default/settings.php

http://www.jeffgeerling.com/blog/2016/migrate-custom-json-feed-drupal-8-migrate-source-json

drush cim --y;drush cr;drush migrate-status
drush @dd8.val cim --y;drush @dd8.val cr;drush @dd8.val ms;

drush mi books --update

drush @dd8.val sqlq "update node__body set body_format ='full_html';"
drush @dd8.val sqlq "update node_revision__body set body_format ='full_html';"

install steps from http://bourbon.io/
valencia:sebas boris$ sass --watch stylesheets/sass:stylesheets

design
colors
http://www.colorcombos.com/color-schemes/43/ColorCombo43.html
https://wordpress.org/themes/twentysixteen/
https://www.google.com/fonts#QuickUsePlace:quickUse/Family:Montserrat

todo:
- disable commenting
//- sidebar first div overlaps main
//- block titles
//- homepage controller
- multip file upload / files source
- translate interface
- resp image
- migrate
