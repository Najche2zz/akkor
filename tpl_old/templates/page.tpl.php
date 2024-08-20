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
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
$en_active = $ru_active = '';
global $language;
if ($language->language == 'en') {
  $en_active = ' active';
}
if ($language->language == 'ru') {
  $ru_active = ' active';
}
?>
<header role="banner" class="container">
  <div class="akkor-toolbar row">
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
      <div class="btn-group btn-group-xs">
        <a href="/" class="btn btn-xs btn-default<?php print $ru_active;?>" role="button">RUS</a>
        <a href="/en" class="btn btn-xs btn-default<?php print $en_active;?>" role="button">ENG</a>
      </div>
<?php if (!empty($logged_in)): ?>
      <a class="btn btn-xs btn-danger" href="/user/logout">Выход</a>
<?php else: ?>
      <a class="btn btn-xs btn-default" href="/user">Вход</a>
<?php endif; ?>
    </div>
    <div class="hidden-xs col-sm-2 col-md-2 col-lg-2">
      <a href="<?php print $front_page; ?>" title="Главная"><img src="/sites/all/themes/akkor/images/toolbar/icon-home.png" alt="Главная" title="Главная"></a>
      <a href="/contact" title="Обратная связь"><img src="/sites/all/themes/akkor/images/toolbar/icon-mail.png" alt="Обратная связь" title="Обратная связь"></a>
      <a href="/sitemap.xml" title="Карта сайта"><img src="/sites/all/themes/akkor/images/toolbar/icon-map.png" alt="Карта сайта" title="Карта сайта"></a>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-right">
      <noindex>
        <a rel="nofollow" target="_blank" href="/rss.xml" title="RSS-лента сайта"><img src="/sites/all/themes/akkor/images/icons-social/RSS.png" alt="RSS" title="RSS"></a>
        <a rel="nofollow" target="_blank" href="http://vk.com/akkor" title="Вконтакте"><img src="/sites/all/themes/akkor/images/icons-social/VK.png" alt="ВКонтакте" title="Вконтакте"></a>
        <a rel="nofollow" target="_blank" href="https://www.facebook.com/pages/Ассоциация-российских-фермеров/459314304175012" title="Facebook"><img src="/sites/all/themes/akkor/images/icons-social/facebook.png" alt="Facebook" title="Facebook"></a>
        <a rel="nofollow" target="_blank" href="https://twitter.com/akkor_fermer" title="Twitter"><img src="/sites/all/themes/akkor/images/icons-social/twitter.png" alt="Twitter" title="Twitter"></a>
      </noindex>
    </div>
    <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 text-right" role="search">
<?php print render($page['search']); ?>
    </div>
  </div>
  <div class="row akkor-logo">
    <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img class="img-responsive pull-right" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"></a>
    </div>
  </div>

<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
  <nav role="navigation" class="<?php print $navbar_classes; ?>">
    <div class="container">
      <div class="navbar-header hidden-lg">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
          <span class="sr-only">Навигация</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand visible-xs" href="#">Навигация</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-navbar-collapse">
        <div class="visible-xs" role="search">
<?php print render($page['search']); ?>
        </div>
<?php if (!empty($primary_nav)): ?>
<?php print render($primary_nav); ?>
<?php endif; ?>
      </div>
    </div>
  </nav>
<?php endif; ?>
</header>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
<?php if (!empty($page['header'])): ?>
      <?php print render($page['header']); ?>
<?php endif; ?>
<?php if (!empty($page['content'])): ?>
      <section role="main" class="main-content">
<?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
<?php endif; ?>
<?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
<?php if (!empty($title) && empty($is_front)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
<?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
<?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
<?php endif; ?>
<?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
<?php endif; ?>
<?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
<?php endif; ?>
        <?php print render($page['content']); ?>
      </section>

<?php elseif (!empty($page['sidebar_first']) || !empty($page['sidebar_second'])): ?>
      <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
<?php if (!empty($page['sidebar_first'])): ?>
          <section role="main">
            <?php print render($page['sidebar_first']); ?>
          </section>
<?php if (!empty($page['main_bottom_left']) || !empty($page['main_bottom_right'])): ?>
          <div class="row">
<?php if (!empty($page['main_bottom_left'])): ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <aside role="complementary">
                <?php print render($page['main_bottom_left']); ?>
              </aside>
            </div>
<?php endif; ?>
<?php if (!empty($page['main_bottom_right'])): ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <aside role="complementary">
                <?php print render($page['main_bottom_right']); ?>
              </aside>
            </div>
<?php endif; ?>
          </div>
<?php endif; ?>
<?php endif; ?>
        </div>
<?php if (!empty($page['sidebar_second'])): ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <aside role="complementary">
            <?php print render($page['sidebar_second']); ?>
          </aside>
        </div>
<?php endif; ?>
      </div>
<?php endif; ?>
<?php if (!empty($page['bottom'])): ?>
      <div class="row">
        <div class="hidden-xs col-sm-12 col-md-12 col-lg-12">
          <aside role="complementary">
            <?php print render($page['bottom']); ?>
          </aside>
        </div>
      </div>
<?php endif; ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" role="complementary">
      <aside role="complementary">
        <?php print render($page['sidebar_third']); ?>
      </aside>
    </div>
  </div>
</div>


<footer class="footer container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
      <div class="copyright">&copy; <?php print date('Y'); ?> Ассоциация крестьянских (фермерских) хозяйств и сельскохозяйственных кооперативов России</div>
      <div class="outinfo">Копирование материалов сайта разрешается только при согласовании с администрацией сайта. Email:<?php echo variable_get('site_mail'); ?></div>
    </div>
    <div class="text-right col-xs-12 col-sm-4 col-md-2 col-lg-2">
        <a target="_blank" href="http://symedia.ru" title="Создание сайтов"><img src="/sites/all/themes/akkor/images/symedia_31x31.png" alt="S" title="Symedia"></a>
        <a href="/sitemap.xml"><img src="/sites/all/themes/akkor/images/sitemap.png" alt="Sitemap" title="Карта сайта"></a>
        <a href="/rss.xml"><img src="/sites/all/themes/akkor/images/rss.png" alt="RSS" title="RSS - лента сайта"></a>
      <!--LiveInternet counter--><script type="text/javascript"><!--
      document.write("<a href='http://www.liveinternet.ru/click' "+
      "target=_blank><img src='//counter.yadro.ru/hit?t45.6;r"+
      escape(document.referrer)+((typeof(screen)=="undefined")?"":
      ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
      screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
      ";"+Math.random()+
      "' alt='' title='LiveInternet' "+
      "border='0' width='31' height='31'><\/a>")
      //--></script><!--/LiveInternet-->
    </div>
  </div>
</footer>