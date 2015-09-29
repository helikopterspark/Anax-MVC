<div class='comments' id='comments'>
	<hr class='comments-hr'>
	<?php if (!$form) : ?>
		<form method="post" action="#comment-form">
			<input type="hidden" name="redirect" value="<?=$this->url->create($comment['redirect'])?>">
			<p>
				<input class=buttons type="submit" name="doEnterComment" value="Ny kommentar">
			</p>
		</form>
	<?php endif; ?>

	<?php if (is_array($comments) && count($comments) > 0) : ?>
		<div class='comments-heading-container'>
			<div class='comments-heading'>
				<?php if (count($comments) == 1) : ?>
					<p><?=count($comments)?> Kommentar</p>
				<?php else : ?>
					<p><?=count($comments)?> Kommentarer</p>
				<?php endif; ?>
			</div>
			<div class='comments-heading-side'></div>
		</div> <!-- comments-heading-container -->
		<?php foreach ($comments as $id => $comment) : ?>
			<div class='comment-container'>
				<img src='<?=$comment['gravatar']?>'>
				<div class="comment-section">
					<p><span class='comments-name'><a href="mailto:<?=$comment['mail']?>"><?=$comment['name']?></a></span> 
						<span class='comments-id-time'>| 
							<!-- <?=date('Y/m/d H:i:s', $comment['timestamp'])?> -->

							<?php $timeinterval = (time()-$comment['timestamp']); ?>
							<?php if (($timeinterval) < 60): ?>
								<?=round($timeinterval)?> sekunder sedan
							<?php elseif (($timeinterval/60) < 60): ?>
								<?=round($timeinterval/60)?> minuter sedan
							<?php elseif (($timeinterval/(60*60)) < 24): ?>
								<?=round($timeinterval/(60*60))?> timmar sedan
							<?php elseif (($timeinterval/(60*60*24)) < 7): ?>
								<?=round($timeinterval/(60*60*24))?> dygn sedan
							<?php elseif (($timeinterval/(60*60*24)) < 30) : ?>
								<?=round($timeinterval/(60*60*24*7))?> veckor sedan
							<?php else : ?>
								<?=round($timeinterval/(60*60*24*30))?> månader sedan
							<?php endif; ?>

							<?php if (isset($comment['updated'])) : ?>
								| <span class='italics'> Uppdaterad för 
								<!-- <?=date('Y/m/d H:i:s', $comment['updated'])?></span> -->
								<?php $timeinterval = (time()-$comment['updated']); ?>
								<?php if (($timeinterval) < 60): ?>
									<?=round($timeinterval)?> sekunder sedan
								<?php elseif (($timeinterval/60) < 60): ?>
									<?=round($timeinterval/60)?> minuter sedan
								<?php elseif (($timeinterval/(60*60)) < 24): ?>
									<?=round($timeinterval/(60*60))?> timmar sedan
								<?php elseif (($timeinterval/(60*60*24)) < 7): ?>
									<?=round($timeinterval/(60*60*24))?> dygn sedan
								<?php elseif (($timeinterval/(60*60*24)) < 30) : ?>
									<?=round($timeinterval/(60*60*24*7))?> veckor sedan
								<?php else : ?>
									<?=round($timeinterval/(60*60*24*30))?> månader sedan
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($comment['web']) : ?>
								<br/>
								<a href='<?=$comment['web']?>'><?=$comment['web']?></a>
							<?php endif; ?>
						</span>
					</p>
					<p><?=$comment['content']?></p>
					<form method=post action="#comment-form">
						<input type=hidden name="commentID" value="<?=$id?>">
						<input type=hidden name="redirect" value="<?=$this->url->create($comment['redirect'])?>">
						<input class=edit-button type='submit' name='doEditComment' value='Redigera'>
					</form>
				</div> <!-- comment-section -->
			</div> <!-- comment-container -->
			<!-- <p><?=dump($comment)?></p> -->
		<?php endforeach; ?>
	<?php endif; ?>
</div> <!-- comments -->