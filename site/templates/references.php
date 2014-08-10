<?php snippet('header') ?>

<main class="main references" role="main">

  <h1 class="alpha margin-bottom">Made with Kirby and <b class="red">&#9829;</b class="love"></h1>

  <ul class="reference-list list-3">
    <?php $references = $page->children()->flip()->paginate(30) ?>
    <?php foreach($references as $reference): ?><!--
 --><li class="screenshot">
      <div class="screen-wrap">
        <?php if($reference->hasImages()): ?>
        <img src="<?php echo thumb($reference->image(), array('width' => 350, 'height' => 220, 'crop' => true))->url() ?>" alt="Screenshot: <?php echo $reference->title() ?>" />
        <?php endif ?>
        <div class="screen-refl"><a class="btn-white" href="<?php echo $reference->link() ?>">visit</a></div>
      </div>
      <a href="<?php echo $reference->link() ?>">
        <h2 class="gamma truncate"><?php echo html($reference->title()) ?></h2>
        <p><?php echo url::short($reference->link()) ?></p>
      </a>
    </li><!--
 --><?php endforeach ?>
  </ul>

  <?php $pagination = $references->pagination(); ?>
  <?php if($references->pagination()->hasPages()): ?>
  <nav class="pagination clear">
    <?php if($references->pagination()->hasPrevPage()): ?>
    <a class="btn prev" href="<?php echo $references->pagination()->prevPageURL() ?>">newer entries</a>
    <?php endif ?>
    <?php if($references->pagination()->hasNextPage()): ?>
    <a class="btn next" href="<?php echo $references->pagination()->nextPageURL() ?>">older entries</a>
    <?php endif ?>
  </nav>
  <?php endif ?>

</main>

<?php snippet('footer') ?>