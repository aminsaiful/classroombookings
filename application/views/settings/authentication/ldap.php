<?php

echo form_open(current_url(), array('id' => 'ldap_settings', 'class' => 'cssform', 'ldap-settings' => ''));

?>


<fieldset>

	<legend accesskey="L" tabindex="<?php echo tab_index() ?>">LDAP</legend>

	<?php
	$field = 'ldap_enabled';
	$value = set_value($field, element($field, $settings, '0'), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Enable</label>
		<?php
		echo form_hidden($field, '0');
		$input = form_checkbox(array(
			'name' => $field,
			'id' => $field,
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => ($value == '1')
		));
		echo "<label for='{$field}' class='ni'>{$input} Use LDAP to authenticate users</label>";
	?>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_create_users';
	$value = set_value($field, element($field, $settings, '0'), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Create users</label>
		<?php
		echo form_hidden($field, '0');
		$input = form_checkbox(array(
			'name' => $field,
			'id' => $field,
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => ($value == '1')
		));
		echo "<label for='{$field}' class='ni'>{$input} Automatically create user accounts on successful login.</label>";
		?>
	</p>
	<?php echo form_error($field) ?>

</fieldset>


<fieldset>

	<legend accesskey="C" tabindex="<?php echo tab_index() ?>">Connection</legend>

	<?php
	$field = 'ldap_server';
	$value = set_value($field, element($field, $settings), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Server</label>
		<?php
		echo form_input(array(
			'name' => $field,
			'id' => $field,
			'size' => '40',
			'maxlength' => '100',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">Hostname or IP address.</p>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_port';
	$value = set_value($field, element($field, $settings), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Port</label>
		<?php
		echo form_input(array(
			'type' => 'number',
			'name' => $field,
			'id' => $field,
			'size' => '5',
			'maxlength' => '5',
			'tabindex' => tab_index(),
			'value' => $value,
			'style' => 'max-width:50px'
		));
		?>
		<p class="hint">Standard ports are 389 (non-SSL) or 636 (SSL).</p>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_version';
	$value = set_value($field, element($field, $settings, 3), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Protocol version</label>
		<?php
		echo form_input(array(
			'type' => 'number',
			'name' => $field,
			'id' => $field,
			'size' => '5',
			'maxlength' => '5',
			'tabindex' => tab_index(),
			'value' => $value,
			'style' => 'max-width:50px'
		));
		?>
		<p class="hint">Usually 3.</p>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_use_tls';
	$value = set_value('ldap_use_tls', element('ldap_use_tls', $settings, '0'), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Use TLS</label>
		<?php
		echo form_hidden($field, '0');
		echo form_checkbox(array(
			'name' => $field,
			'id' => $field,
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => ($value == '1')
		));
	?>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_ignore_cert';
	$value = set_value('ldap_ignore_cert', element('ldap_ignore_cert', $settings, '0'), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Ignore certificate</label>
		<?php
		echo form_hidden($field, '0');
		echo form_checkbox(array(
			'name' => $field,
			'id' => $field,
			'value' => '1',
			'tabindex' => tab_index(),
			'checked' => ($value == '1')
		));
	?>
	</p>
	<?php echo form_error($field) ?>

</fieldset>

<fieldset>

	<legend accesskey="H" tabindex="<?php echo tab_index() ?>">Search</legend>

	<?php
	$field = 'ldap_user_attr';
	$value = set_value($field, element($field, $settings), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">User attribute</label>
		<?php
		echo form_input(array(
			'name' => $field,
			'id' => $field,
			'size' => '40',
			'maxlength' => '100',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">Typicall sAMAccountName or uid.</p>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_base_dn';
	$value = set_value($field, element($field, $settings), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Base DN</label>
		<?php
		echo form_textarea(array(
			'name' => $field,
			'id' => $field,
			'rows' => '3',
			'cols' => '60',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">E.g. dc=example,dc=local</p>
	</p>
	<?php echo form_error($field) ?>

	<?php
	$field = 'ldap_search_filter';
	$value = set_value($field, element($field, $settings), FALSE);
	?>
	<p>
		<label for="<?= $field ?>">Search filter</label>
		<?php
		echo form_textarea(array(
			'name' => $field,
			'id' => $field,
			'rows' => '6',
			'cols' => '60',
			'tabindex' => tab_index(),
			'value' => $value,
		));
		?>
		<p class="hint">Example: (&(&lt;attr&gt;=&lt;user&gt;))</p>
		<br>
		<p class="hint">The tags <span>&lt;attr&gt;</span> and <span>&lt;user&gt;</span> will be replaced by the User Attribute configured above and the supplied Username.</p>
	</p>
	<?php echo form_error($field) ?>

</fieldset>


<fieldset>

	<legend accesskey="U" tabindex="<?php echo tab_index() ?>">User attribute mapping</legend>

	<div class="fieldset-description">
		<p>When you use a search filter to find the authenticating user, you can populate the following classroombookings user details with attributes found in LDAP each time they log in.</p>
		<p>Combine multiple LDAP attributes by adding a colon before the attribute name, for example - <span>:givenName :sn</span>.</p>
		<p>Leave these fields blank to disable automatic population.</p>
	</div>

	<?php

	$fields = [
		['name' => 'ldap_attr_firstname', 'label' => 'First Name', 'hint' => 'E.g. givenName'],
		['name' => 'ldap_attr_lastname', 'label' => 'Last Name', 'hint' => 'E.g. sn'],
		['name' => 'ldap_attr_displayname', 'label' => 'Display Name', 'hint' => "E.g. displayName or ':givenName :sn'"],
		['name' => 'ldap_attr_email', 'label' => 'Email address', 'hint' => 'E.g. mail'],
	];

	foreach ($fields as $field) {

		$value = set_value($field['name'], element($field['name'], $settings), FALSE);

		$label_el = "<label for='{$field['name']}'>{$field['label']}</label>";
		$input = form_input([
			'name' => $field['name'],
			'id' => $field['name'],
			'size' => '40',
			'maxlength' => '100',
			'tabindex' => tab_index(),
			'value' => $value,
		]);

		$hint = '';
		if (isset($field['hint'])) {
			$hint = "<p class='hint'>{$field['hint']}</p>";
		}

		echo "<p>\n{$label_el}\n{$input}\n{$hint}</p>";
		echo form_error($field['name']);

	}
	?>

</fieldset>



<?php

$this->load->view('partials/submit', array(
	'submit' => array('Save', tab_index()),
	'cancel' => array('Cancel', tab_index(), 'controlpanel'),
));

echo form_close();
