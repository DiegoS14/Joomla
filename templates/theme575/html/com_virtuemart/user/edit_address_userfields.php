<?php

/**
 *
 * Modify user form view, User info
 *
 * @package	VirtueMart
 * @subpackage User
 * @author Oscar van Eijk, Eugen Stranz
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: edit_address_userfields.php 6349 2012-08-14 16:56:24Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Status Of Delimiter
$closeDelimiter = false;
$openTable = true;
$hiddenFields = ''; ?>

<div class="adminForm user-details">
    <div class="row">
	<fieldset>
	<?php
	// Output: Userfields
	foreach($this->userFields['fields'] as $field) {

		if($field['type'] == 'delimiter') { ?>
		
		</fieldset>
		<fieldset>
		
		<?php
		} elseif ($field['type'] == 'checkbox') { ?>

			<div class="form-group">
				<div class="col-md-offset-4 col-md-8">	
					<div class="checkbox">			
						<label class="<?php echo $field['name'] ?>" for="<?php echo $field['name'] ?>_field">
							<?php echo $field['formcode'] ?><?php echo $field['title'] . ($field['required'] ? ' *' : '') ?>
						</label>
					</div>	
				</div>	
			</div>
		
		<?php
		} elseif ($field['hidden'] == true) {

			$hiddenFields .= $field['formcode'] . "\n";

		} else { ?>
			<div class="form-group">					
				<label class="col-md-4 control-label <?php echo $field['name'] ?>" for="<?php echo $field['name'] ?>_field">
					<?php echo $field['title'] . ($field['required'] ? ' *' : '') ?>
				</label>					
				<div class="col-md-8">
					<?php echo $field['formcode'] ?>
				</div>					
			</div>
		<?php
		}
	}

	// At the end we have to close the current
	// table and delimiter ?>

	<?php // Output: Hidden Fields
	echo $hiddenFields
	?>
	</fieldset>
	</div>
</div>