<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<?php
  $month_list = array(
    1  => 'Января',
    2  => 'Февраля',
    3  => 'Марта',
    4  => 'Апреля',
    5  => 'Мая', 
    6  => 'Июня',
    7  => 'Июля',
    8  => 'Августа',
    9  => 'Сентября',
    10 => 'Октября',
    11 => 'Ноября',
    12 => 'Декабря'
  );
  $day_list = array(
    1  => 'Понедельник',
    2  => 'Вторник',
    3  => 'Среда',
    4  => 'Четверг',
    5  => 'Пятница', 
    6  => 'Суббота',
    7  => 'Воскресенье',
  );

?>

<?php if (!empty($page['bottom'])): ?>
<?php endif; ?>

<div class="headbar">
   <div class="wrapper">
      <div class="date"><?php print $day_list[date('N')].', '.date('d').' '.$month_list[date('n')].' '.date('Y'); ?></div>

      <div class="headbar-right">
         <div class="socials">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/sites/all/themes/akkornew/templates/socials.tpl.php'); ?>
         </div>
         
         <div class="enter-links">
            <?php if (!empty($logged_in)): ?>
               <a href="/user/logout">Выход</a>
               <?php else: ?>
                  <a href="/user">Вход</a>
                  <?php print render($page['enter']); ?>
            <?php endif; ?>
         </div>
      </div>

   </div>
</div>

<header>
   <div class="main-banner">
      <?php if ($is_front): ?>
         <div id="logo"></div>
      <?php else: ?>
         <a href="<?php print $front_page; ?>" id="logo"></a>
      <?php endif; ?>
      <h1>
         Ассоциация крестьянских<br />
         (фермерских) хозяйств<br />
         и сельскохозяйственных<br />
         кооперативов России
      </h1>
      <div class="mbuttons">
         <div class="msearch"></div>
         <div class="burger">
            <div></div>
            <div></div>
            <div></div>
         </div>
      </div>
   </div>
   <div class="mainmenu">
      <div class="logobar">
         <div class="logo"></div>
         <div class="close"></div>
      </div>

      <?php print render($page['main_menu']); ?>
      <script src="<?php print $base_path . $directory; ?>/js/mainmenu.js"></script>

      <?php print render($page['search']); ?>
   </div>
</header>

<main>

   <?php if (!$is_front): ?>
      <section class="page">
         <?php print render($page['content']); ?>
      </section>
   <?php else: ?>
   
   <section class="left">
      <?php print render($page['left_body']); ?>

      <div class="dsg-news">
         <div class="rubric"><h3>Движение сельских женщин</h3></div>
         <div class="dsg-list">
            <div class="dsg-item">
               <div class="dsg-img"></div>
               <div class="dsg-text">
                  <div class="news-date">25 октября 2024</div>
                  <h3>
                     В рамках 11 открытого чемпионата России по пахоте пройдет конференция
                     АККОР и АО «РОСАГРОЛИЗИНГ»
                  </h3>
               </div>
            </div>
            <div class="dsg-item">
               <div class="dsg-img"></div>
               <div class="dsg-text">
                  <div class="news-date">25 октября 2024</div>
                  <h3>
                     В рамках 11 открытого чемпионата России по пахоте пройдет конференция
                     АККОР и АО «РОСАГРОЛИЗИНГ»
                  </h3>
               </div>
            </div>
            <div class="dsg-item">
               <div class="dsg-img"></div>
               <div class="dsg-text">
                  <div class="news-date">25 октября 2024</div>
                  <h3>
                     В рамках 11 открытого чемпионата России по пахоте пройдет конференция
                     АККОР и АО «РОСАГРОЛИЗИНГ»
                  </h3>
               </div>
            </div>
         </div>
      </div>

      <div class="main-partners">
         <div class="rubric"><h3>Главные партнеры</h3></div>
         <div class="main-partners-list">
            <div class="main-partner"></div>
            <div class="main-partner"></div>
            <div class="main-partner"></div>
         </div>
      </div>
   </section>

   <section class="right">
      <?php print render($page['right_body']); ?>
   </section>

   <?php endif; ?>
</main>


<section class="bottom">
   <div class="ads">
      <?php print render($page['ads']); ?>
   </div>
</section>

<section class="bottom">
         <div class="rubric center"><h3>Партнеры</h3></div>
         <div class="partners">
            <div class="partners-wrapper">
               <div class="partner"></div>
               <div class="partner"></div>
               <div class="partner"></div>
               <div class="partner"></div>
               <div class="partner"></div>
            </div>
         </div>
         <script src="./js/slider.js"></script>
         <script></script>
</section>

<footer>
   <div class="wrapper">
      <?php print render($page['footer']); ?>
      <section class="info">
         <div>
            <div class="logo"></div>
            <h3>
               Ассоциация крестьянских<br />
               (фермерских) хозяйств<br />
               и сельскохозяйственных<br />
               кооперативов России
            </h3>
         </div>
         <div class="socials">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/sites/all/themes/akkornew/templates/socials.tpl.php'); ?>
         </div>
      </section>
      
      <section class="sitemap">
         <div class="rubric"><h4>Ссылки</h4></div>
         <?php print render($page['sitemap']); ?>
         <div class="map">
            <a href="#">Новости</a>
            <a href="#">Для фермеров</a>
            <a href="#">ДСЖР</a>
            <a href="#">Слово фермерам</a>
            <a href="#">Об АККОР</a>
            <a href="#">Партнеры</a>
         </div>
      </section>
      <section class="categories">
         <div class="rubric"><h4>Категории</h4></div>
         <div class="tags dark">
            <div class="tag">Главное</div>
            <div class="tag">ДСЖ</div>
            <div class="tag">Слово фермерам</div>
            <div class="tag">От первого лица</div>
            <div class="tag">Мероприятия</div>
         </div>
      </section>
   </div>
</footer>