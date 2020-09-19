<?php snippet('header'); ?>
  <div class="layout-wrapper--contained">
    <div class="student__title" style="--color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;">
      <?= $page->title() ?>
    </div>
    <div class="text">
      <?= $page->main_content()->kt(); ?>
    </div>
  </div>
  <div class="layout-wrapper">
    <ul class="student__work">
      <?php foreach($page->main_works()->toStructure() as $block): ?>
        <li class="student__work__item">
          <?php if ($block->type_of_work() == 'upload'): ?>
            <div class="student__work__item__upload">
              <?php $blockFile = $block->work_upload()->toFile(); ?>
                <?php if ($blockFile->type() == 'image'): ?>
                  <a href="<?=$blockFile->resize(2000)->url(); ?>">
                    <img src="<?=$blockFile->resize(1000)->url(); ?>" loading="lazy">
                  </a>
                <?php elseif ($blockFile->type() == 'video'): ?>
                  <video controls playsinline loop controlslist="nodownload">
                    <source src="<?= $blockFile->url(); ?>" type="<?= $blockFile->mime(); ?>">
                  </video>
                <?php elseif ($blockFile->type() == 'audio'): ?>
                  <audio controls>
                    <source src="<?= $blockFile->url(); ?>" type="<?= $blockFile->mime(); ?>">
                  </audio>
                <?php else: ?>
                  <a href="<?=$blockFile->url(); ?>">
                    <div class="text">
                      <?=$blockFile->filename(); ?>
                    </div>
                  </a>
                <?php endif; ?>
            </div>
          <?php endif; ?>
          <div class="student__work__item__text text">
            <?= $block->work_text()->kt(); ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php snippet('footer'); ?>
