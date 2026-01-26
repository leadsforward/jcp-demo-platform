<?php
$variant = $args['variant'] ?? 'standard';
$eyebrow = $args['eyebrow'] ?? '';
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$bullets = $args['bullets'] ?? [];
$primary = $args['primary'] ?? null;
$secondary = $args['secondary'] ?? null;
$visual = $args['visual'] ?? '';
?>

<section class="jcp-hero jcp-hero--<?php echo esc_attr($variant); ?>">
  <div class="jcp-container jcp-grid-2">
    <div>
      <?php if ($eyebrow) : ?>
        <div class="jcp-hero-eyebrow"><?php echo esc_html($eyebrow); ?></div>
      <?php endif; ?>
      <h1 class="jcp-hero-title"><?php echo esc_html($title); ?></h1>
      <?php if ($subtitle) : ?>
        <p class="jcp-hero-subtitle"><?php echo esc_html($subtitle); ?></p>
      <?php endif; ?>
      <?php if (!empty($bullets)) : ?>
        <ul class="jcp-hero-bullets">
          <?php foreach ($bullets as $bullet) : ?>
            <li><?php echo esc_html($bullet); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <div class="jcp-actions">
        <?php if ($primary) : ?>
          <a class="jcp-btn jcp-btn-primary" href="<?php echo esc_url($primary['href']); ?>">
            <?php echo esc_html($primary['label']); ?>
          </a>
        <?php endif; ?>
        <?php if ($secondary) : ?>
          <a class="jcp-btn jcp-btn-secondary" href="<?php echo esc_url($secondary['href']); ?>">
            <?php echo esc_html($secondary['label']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <?php if ($visual) : ?>
      <div class="jcp-hero-visual">
        <?php echo $visual; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
