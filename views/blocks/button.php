<a
    href="<?php echo $payload->link->payload; ?>"
    target="_blank"
    class="button <?php echo $classes; ?>"
    <?php if ($styles) : ?>style="<?php echo $styles; ?>"<?php endif; ?>
>
    <?php echo $payload->text; ?>
</a>