<div id="<?php echo $this->_row->id;?>" class="<?php echo $this->_row->class;?>">
	<ul>
	<?php foreach ($this->headings as $heading=>$label) {	?>
		<li <?php echo $this->cellClass[$heading]?>>
			<?php echo $label;?>:
			<?php echo @$this->_row->data->$heading;?>
		</li>
	<?php }?>
	</ul>
</div>

