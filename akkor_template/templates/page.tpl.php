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
            <?php print render($page['socials']); ?>
         </div>
         
         <div class="enter-links">
            <?php if (!empty($logged_in)): ?>
               <a class="btn btn-xs btn-danger" href="/user/logout">Выход</a>
               <?php else: ?>
                  <a class="btn btn-xs btn-default" href="/user">Вход</a>
                  <?php print render($page['enter']); ?>
            <?php endif; ?>
         </div>
      </div>

   </div>
</div>

<header>
   <div class="main-banner">
      <?php if ($front_page == '/'): ?>
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

      <?php print render($page['search']); ?>
   </div>
</header>

<?php print render($page['content']); ?>

<main>
   <section class="left">
      <?php print render($page['left_body']); ?>
      <div class="main-news">
         <div class="rubric"><h3>Главные новости</h3></div>

         <div class="main-news-wrapper">
            <div class="head-new">
               <div class="first-img"></div>
               <div class="first-text">
                  <div class="news-date">25 октября 2024</div>
                  <h2>
                     В рамках 11 открытого чемпионата России по пахоте пройдет конференция
                     АККОР и АО «РОСАГРОЛИЗИНГ»
                  </h2>
                  <div class="first-intro">
                     Заседание Расширенного Президиума Совета Ассоциации крестьянских
                     (фермерских) хозяйств и сельскохозяйственных кооперативов России
                     состоится в рамках деловой программы 11-го Открытого Чемпионата по
                     пахоте.
                  </div>
               </div>
            </div>

            <div class="main-list">
               <div class="main-item">
                  <div class="main-img"></div>
                  <div class="main-text">
                     <div class="news-date">25 октября 2024</div>
                     <h3>Состоится расширенный президиум совета АККОР</h3>
                  </div>
               </div>
               <div class="main-item">
                  <div class="main-img"></div>
                  <div class="main-text">
                     <div class="news-date">25 октября 2024</div>
                     <h3>Состоится расширенный президиум совета АККОР</h3>
                  </div>
               </div>
               <div class="main-item">
                  <div class="main-img"></div>
                  <div class="main-text">
                     <div class="news-date">25 октября 2024</div>
                     <h3>Состоится расширенный президиум совета АККОР</h3>
                  </div>
               </div>
               <div class="main-item">
                  <div class="main-img"></div>
                  <div class="main-text">
                     <div class="news-date">25 октября 2024</div>
                     <h3>Состоится расширенный президиум совета АККОР</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="news">
         <div class="rubric"><h3>Новости</h3></div>
         <div class="list">
            <div class="item">
               <div class="news-date">25 октября 2024</div>
               <h3>
                  В рамках 11 открытого чемпионата России по пахоте пройдет конференция АККОР
                  и АО «РОСАГРОЛИЗИНГ»
               </h3>
               <div class="intro">
                  Заседание Расширенного Президиума Совета Ассоциации крестьянских
                  (фермерских) хозяйств и сельскохозяйственных кооперативов России состоится в
                  рамках деловой программы 11-го Открытого Чемпионата по пахоте.
               </div>
            </div>
            <div class="item">
               <div class="news-date">25 октября 2024</div>
               <h3>
                  В рамках 11 открытого чемпионата России по пахоте пройдет конференция АККОР
                  и АО «РОСАГРОЛИЗИНГ»
               </h3>
               <div class="intro">
                  Заседание Расширенного Президиума Совета Ассоциации крестьянских
                  (фермерских) хозяйств и сельскохозяйственных кооперативов России состоится в
                  рамках деловой программы 11-го Открытого Чемпионата по пахоте.
               </div>
            </div>
            <div class="item">
               <div class="news-date">25 октября 2024</div>
               <h3>
                  В рамках 11 открытого чемпионата России по пахоте пройдет конференция АККОР
                  и АО «РОСАГРОЛИЗИНГ»
               </h3>
               <div class="intro">
                  Заседание Расширенного Президиума Совета Ассоциации крестьянских
                  (фермерских) хозяйств и сельскохозяйственных кооперативов России состоится в
                  рамках деловой программы 11-го Открытого Чемпионата по пахоте.
               </div>
            </div>
            <div class="item">
               <div class="news-date">25 октября 2024</div>
               <h3>
                  В рамках 11 открытого чемпионата России по пахоте пройдет конференция АККОР
                  и АО «РОСАГРОЛИЗИНГ»
               </h3>
               <div class="intro">
                  Заседание Расширенного Президиума Совета Ассоциации крестьянских
                  (фермерских) хозяйств и сельскохозяйственных кооперативов России состоится в
                  рамках деловой программы 11-го Открытого Чемпионата по пахоте.
               </div>
            </div>
            <div class="item">
               <div class="news-date">25 октября 2024</div>
               <h3>
                  В рамках 11 открытого чемпионата России по пахоте пройдет конференция АККОР
                  и АО «РОСАГРОЛИЗИНГ»
               </h3>
               <div class="intro">
                  Заседание Расширенного Президиума Совета Ассоциации крестьянских
                  (фермерских) хозяйств и сельскохозяйственных кооперативов России состоится в
                  рамках деловой программы 11-го Открытого Чемпионата по пахоте.
               </div>
            </div>
         </div>
      </div>

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
      <div class="first">
         <div class="rubric"><h4>От первого лица</h4></div>
         <div class="first-header">
            <div class="f-img"></div>
            <div class="first-title">
               ПУТИН Владимир Владимирович<span>Президент РФ</span>
            </div>
         </div>
         <div class="first-text">
            За короткий по историческим меркам срок российское фермерство убедительно доказало
            свою экономическую и социальную значимость, стало серьезной созидательной силой,
            достойно продолжило лучшие традиции крестьянского труда, которыми всегда славилась
            наша страна.
         </div>
      </div>

      <div class="people">
         <div class="rubric"><h4>Слово фермерам</h4></div>
         <div class="people-list">
            <div class="people-item">
               <div class="people-header">
                  <div class="people-img"></div>
                  <div class="people-title">
                     КОЛЕСНИКОВ Сергей Александрович
                     <span>Председатель Совета АККОР Ставропольского края</span>
                  </div>
               </div>
               <div class="people-text">
                  За короткий по историческим меркам срок российское фермерство убедительно
                  доказало свою экономическую и социальную значимость, стало серьезной
                  созидательной силой, достойно продолжило лучшие традиции крестьянского
                  труда, которыми всегда славилась наша страна.
               </div>
            </div>

            <div class="people-item">
               <div class="people-header">
                  <div class="people-img"></div>
                  <div class="people-title">
                     КОЛЕСНИКОВ Сергей Александрович
                     <span>Председатель Совета АККОР Ставропольского края</span>
                  </div>
               </div>
               <div class="people-text">
                  За короткий по историческим меркам срок российское фермерство убедительно
                  доказало свою экономическую и социальную значимость, стало серьезной
                  созидательной силой, достойно продолжило лучшие традиции крестьянского
                  труда, которыми всегда славилась наша страна.
               </div>
            </div>
         </div>
      </div>

      <div class="events">
         <div class="rubric"><h4>Материалы мероприятий</h4></div>
         <div class="events-list">
            <a href="#" class="event" style="height: 150px"></a>
            <a href="#" class="event" style="height: 200px"></a>
            <a href="#" class="event" style="height: 250px"></a>
         </div>
      </div>
   </section>
</main>

<?php print render($page['ads']); ?>

<?php print render($page['bottom']); ?>

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
            <?php print render($page['socials']); ?>
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