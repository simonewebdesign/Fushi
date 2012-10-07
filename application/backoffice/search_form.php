<form id=search method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>

		<legend>Ricerca avanzata</legend>

		<p class=clearfix>
			<label for=field>Cerca in:</label>
			<select id=field name=field>
				<?php foreach ( $table->columns as $column ) { ?>
				<option value="<?=$column?>"><?=humanize($column)?></option>
				<?php } ?>
			</select>
		</p>

		<p class=clearfix>
			<label for=operator>Un valore che soddisfi:</label><br>
			<input name=operator type=radio value=OR checked>almeno una delle condizioni<br>
			<input name=operator type=radio value=AND>tutte le condizioni<br>
		</p>

		<label>Condizioni:</label><br>

		<p class=clearfix>
			<label for=higher>Maggiore di</label>
			<input id=higher name=higher type=number maxlength=255>
		</p>

		<p class=clearfix>
			<label for=lower>Minore di</label>
			<input id=lower name=lower type=number maxlength=255>
		</p>

		<p class=clearfix>
			<label for=equals>Uguale a</label>
			<input id=equals name=equals type=number maxlength=255>
		</p>

		<p class=clearfix>
			<label for=contains>Contiene</label>
			<input id=contains name=contains type=text maxlength=255>
		</p>

		<p class=clearfix>
			<label for=starts>Comincia con</label>
			<input id=starts name=starts type=text maxlength=255>
		</p>

		<p class=clearfix>
			<label for=ends>Finisce con</label>
			<input id=ends name=ends type=text maxlength=255>
		</p>


		<p class=clearfix>
			<input id=submit_search name=submit_search type=submit value=Cerca>
		</p>

	</fieldset>

</form>