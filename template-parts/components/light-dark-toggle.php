<?php
/**
 * Light and Dark mode toggle.
 * 
 * @package AlphaWebConsult
 */

 ?>

<button id="theme-toggle" aria-label="Toggle dark mode" class="p-2 border-0 flex items-center relative" title="Toggle dark mode">
    <?php the_svg(
        'moon',
        array(
            'class' => 'dark-icon hidden cursor-pointer text-white relative',
            'width' => 20,
            'height' => 20,
            'title' => 'Dark Mode'
        )
    ); ?>
    <?php the_svg(
        'sun',
        array(
            'class' => 'light-icon cursor-pointer text-white relative',
            'width' => 20,
            'height' => 20,
            'title' => 'Light Mode'
        )
    ); ?>
</button>
