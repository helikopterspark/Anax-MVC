<?php if (isset($aside)) : ?>
	<aside class="appad">
	<div class="div_middle">
		<?=$aside?>
		</div>
	</aside>
<?php endif; ?>

<article class="article1">
	<?=$content?>

<?php if(isset($byline)) : ?>
	<footer class="byline">
    	<?=$byline?>
	</footer>
	<?php endif; ?>
</article>