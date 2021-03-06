<?php $form->html(); ?>
<?php $form->view()->attr('action', \Request::$current->uri().'#lead-form-anchor'); ?>
<div class="row">
	<div id="lead-form" class="<?=$full ? 'span12' : 'span8'?>">
		<span id="lead-close" data-reload="<?=$complete ? '1' : ''?>" class="icon close right"></span>
		<div id="lead-form-anchor" class="span4"></div>
		<div class="span4 contact-well">
			<div class="padded padded-top">
				<h3>Für Demo registrieren und testen.</h3>
				<p>Füllen Sie das Anfrageformular aus, oder kontaktieren Sie uns auf herkömmlichem Wege.</p>
				<table>
					<tr>
						<td class="align-top"><h4>Anschrift:&nbsp;</h4></td>
						<td class="align-top">
							<span>Dornhofstr. 44-46</span><br />
							<span>63263 Neu-Isenburg</span><br />
							<span>Deutschland</span>
						</td>
					</tr>
					<tr>
						<td class="align-top"><h4>Telefon:&nbsp;</h4></td>
						<td class="align-top">+49 (0) 61 02 - 816-0</td>
					</tr>
					<tr>
						<td class="align-top"><h4>E-Mail:&nbsp;</h4></td>
						<td class="align-top"><a href="mailto:info@matrix42.de">info@matrix42.de</a></td>
					</tr>
				</table>
			</div>
		</div><!-- contact-well -->
		<div class="<?=$full ? 'span8' : 'span4'?> contact-form">
			<div class="row padded-top">
				<?php if($complete): ?>
				<div class="span8">
					<h2 class="padded-content">Ihre Anfrage wurde gesendet.</h2>
					<p class="padded-content">Sie werden in Kürze bezüglich Ihrer Anfrage kontaktiert werden.</p>
					<?php if($lead_download): ?>
					<div class="well padded">
						<h3 class="emphasis">Um den Download zu starten, klicken Sie hier...</h3>
						<a href="<?=$lead_download?>" class="btn btn-primary btn-large btn-icon"><span class="icon download"></span>Jetzt Herunterladen!</a>
					</div>
					<?php endif; ?>
				</div>
				<?php else: ?>
				<?=$form->view()->open()?>
				<?=$form->campaign_id->render()?>
				<div class="span4">
					<div class="padded">
						<?=$form->name->render()?>
						<?=$form->email->render()?>
						<?=$form->number->render()?>
					</div>
				</div>
				<div class="span4">
					<div class="padded">
						<?=$form->company->render()?>
						<?=$form->message->render()?>
						<?=$form->submit->render()?>
					</div>
				</div>
				<?=$form->view()->close()?>
				<?php endif; ?>
			</div>
		</div><!-- contact-form -->
		<div class="clear"></div>
	</div><!-- lead-form -->
</div><!-- row -->