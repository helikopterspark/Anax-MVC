<div class='comments' id='comments'>
	<hr class='comments-hr'>
	<?php if (!$noForm) : ?>
		<div class='comment-button-container'>
			<p><a class='comment-button' href='<?=$this->url->create("{$this->request->getRoute()}?comment=yes#comment-form")?>' title='Ny kommentar'>Ny kommentar</a></p>
		</div>
		<!-- 
		<form method="post" action="#comment-form">
			<input type="hidden" name="redirect" value="<?=$this->url->create($redirect)?>">
			<p>
				<input class=buttons type="submit" name="doEnterComment" value="Ny kommentar">
			</p>
		</form>
	-->
<?php endif; ?>

<?php if (is_array($comments) && count($comments) > 0) : ?>
	<div class='comments-heading-container'>
		<div class='comments-heading'>
			<?php if (count($comments) == 1) : ?>
				<p><i class="fa fa-comment"></i> <?=count($comments)?> Kommentar</p>
			<?php else : ?>
				<p><i class="fa fa-comments"></i> <?=count($comments)?> Kommentarer</p>
			<?php endif; ?>
		</div>
		<div class='comments-heading-side'></div>
	</div> <!-- comments-heading-container -->

	<?php foreach ($comments as $comment) : ?>
		<div class='comment-container'>
			<img src='<?=$comment->getProperties()['gravatar']?>'>
			<div class="comment-section">
				<p><span class='comments-name'><a href="mailto:<?=$comment->getProperties()['email']?>"><?=$comment->getProperties()['name']?></a></span> 
					<span class='comments-id-time'>| 
						<?php $timestamp = strtotime($comment->getProperties()['created']); ?>

						<?php $timeinterval = time() - $timestamp; ?>
						<?php if (($timeinterval) < 60): ?>
							<?=round($timeinterval)?> sekunder sedan
						<?php elseif (($timeinterval/60) < 2): ?>
							<?=round($timeinterval/60)?> minut sedan
						<?php elseif (($timeinterval/60) < 60): ?>
							<?=round($timeinterval/60)?> minuter sedan
						<?php elseif (($timeinterval/(60*60)) < 2): ?>
							<?=round($timeinterval/(60*60))?> timme sedan
						<?php elseif (($timeinterval/(60*60)) < 24): ?>
							<?=round($timeinterval/(60*60))?> timmar sedan
						<?php elseif (($timeinterval/(60*60*24)) < 7): ?>
							<?=round($timeinterval/(60*60*24))?> dygn sedan
						<?php elseif (($timeinterval/(60*60*24)) < 30) : ?>
							<?=round($timeinterval/(60*60*24*7))?> veckor sedan
						<?php else : ?>
							<?=round($timeinterval/(60*60*24*30))?> månader sedan
						<?php endif; ?>

						<?php if (isset($comment->getProperties()['updated'])) : ?>
							| <span class='italics'> Uppdaterad för 
							<?php $timestamp = strtotime($comment->getProperties()['updated']); ?>

							<?php $timeinterval = time() - $timestamp; ?>
							<?php if (($timeinterval) < 60): ?>
								<?=round($timeinterval)?> sekunder sedan
							<?php elseif (($timeinterval/60) < 2): ?>
								<?=round($timeinterval/60)?> minut sedan
							<?php elseif (($timeinterval/60) < 60): ?>
								<?=round($timeinterval/60)?> minuter sedan
							<?php elseif (($timeinterval/(60*60)) < 2): ?>
								<?=round($timeinterval/(60*60))?> timme sedan
							<?php elseif (($timeinterval/(60*60)) < 24): ?>
								<?=round($timeinterval/(60*60))?> timmar sedan
							<?php elseif (($timeinterval/(60*60*24)) < 7): ?>
								<?=round($timeinterval/(60*60*24))?> dygn sedan
							<?php elseif (($timeinterval/(60*60*24)) < 30) : ?>
								<?=round($timeinterval/(60*60*24*7))?> veckor sedan
							<?php else : ?>
								<?=round($timeinterval/(60*60*24*30))?> månader sedan
							<?php endif; ?>
							</span>
						<?php endif; ?>

						<?php if ($comment->getProperties()['url']) : ?>
							<br/>
							<a href='<?=$comment->getProperties()['url']?>'><?=$comment->getProperties()['url']?></a>
						<?php endif; ?>
					</span>
				</p>
				<p><?=$comment->getProperties()['content']?></p>
				<p><a class='edit-button' href='<?=$this->url->create("{$this->request->getRoute()}?edit=yes&id=".$comment->getProperties()['id']."#comment-form")?>' title='Redigera'>Redigera</a></p>
				<!--
				<form method=post action="#comment-form">
					<input type=hidden name="commentID" value="<?=$comment->getProperties()['id']?>">
					<input type=hidden name="redirect" value="<?=$this->url->create($redirect)?>">
					<input class=edit-button type='submit' name='doEditComment' value='Redigera'>
				</form>
				-->
			</div> <!-- comment-section -->
		</div> <!-- comment-container -->
	<?php endforeach; ?>
<?php endif; ?>
</div> <!-- comments -->