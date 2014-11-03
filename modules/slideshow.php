<div id="slideshow">
<?php 
    $first = true; 
    foreach ($slideshow_photos as $slideshow): 
        if ($first) { $class = "slide active"; $first = false; } else { $class = "slide"; }?>    
            <div class="<?php echo $class; ?>"><img src="slideshow_photos/<?php echo $slideshow['photo']; ?>"></div>
    <?php endforeach; ?> 
</div> 





