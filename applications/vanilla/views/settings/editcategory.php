<?php if (!defined('APPLICATION')) exit();

echo $this->Form->Open(array('enctype' => 'multipart/form-data'));
echo $this->Form->Errors();
?>
<h1><?php echo T('Edit Category'); ?></h1>
<ul>
   <li>
      <?php
         echo $this->Form->Label('Category', 'Name');
         echo $this->Form->TextBox('Name');
      ?>
   </li>
   <?php if ($this->Category->AllowDiscussions) { ?>
   <li id="UrlCode">
		<?php
		echo Wrap(T('Category Url:'), 'strong');
		echo ' ';
		echo Gdn::Request()->Url('categories', TRUE);
		echo '/';
		echo Wrap(htmlspecialchars($this->Form->GetValue('UrlCode')));
		echo $this->Form->TextBox('UrlCode');
		echo '/';
		echo Anchor(T('edit'), '#', 'Edit');
		echo Anchor(T('OK'), '#', 'Save SmallButton');
		?>
   </li>
   <?php } ?>
   <li>
      <?php
         echo $this->Form->Label('Description', 'Description');
         echo $this->Form->TextBox('Description', array('MultiLine' => TRUE));
      ?>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Css Class', 'CssClass');
         echo $this->Form->TextBox('CssClass', array('MultiLine' => FALSE));
      ?>
   </li>
   <li>
      <?php
         echo $this->Form->Label('Photo', 'PhotoUpload');
         if ($Photo = $this->Form->GetValue('Photo')) {
            echo Img(Gdn_Upload::Url($Photo));
            echo '<br />'.Anchor(T('Delete Photo'), 
               CombinePaths(array('vanilla/settings/deletecategoryphoto', $this->Category->CategoryID, Gdn::Session()->TransientKey())), 
               'SmallButton Danger PopConfirm');
         }
         echo $this->Form->Input('PhotoUpload', 'file');
      ?>
   </li>
   <?php
   echo $this->Form->Simple(
      $this->Data('_ExtendedFields', array()),
      array('Wrap' => array('', '')));
   ?>
   <li>
      <?php
         echo $this->Form->Label('Display As', 'DisplayAs');
         echo $this->Form->DropDown('DisplayAs', array('Default' => 'Default', 'Categories' => 'Categories', 'Discussions' => 'Discussions'));
      ?>
   </li>
   <li>
      <?php
      echo $this->Form->CheckBox('HideAllDiscussions', 'Hide from the recent discussions page.');
      ?>
   </li>
   <?php if ($this->ShowCustomPoints): ?>
   <li>
      <?php
      echo $this->Form->CheckBox('CustomPoints', 'Track points for this category separately.');
      ?>
   </li>
   <?php endif; ?>
   <li>
      <?php
      echo $this->Form->CheckBox('Archived', 'This category is archived.');
      ?>
   </li>
   <?php $this->FireEvent('AfterCategorySettings'); ?>
   <li>
      <?php
		if(count($this->PermissionData) > 0) {
         echo $this->Form->CheckBox('CustomPermissions', 'This category has custom permissions.');
         
         echo '<div class="CategoryPermissions">';
         
         if (count($this->Data('DiscussionTypes')) > 1) {
            echo '<div class="P DiscussionTypes">';
            echo $this->Form->Label('Discussion Types');
            foreach ($this->Data('DiscussionTypes') as $Type => $Row) {
               echo $this->Form->CheckBox("AllowedDiscussionTypes[]", GetValue('Plural', $Row, $Type), array('value' => $Type));
            }
            echo '</div>';
         }
         
         echo $this->Form->Simple(
            $this->Data('_PermissionFields', array()),
         array('Wrap' => array('', ''), 'ItemWrap' => array('<div class="P">', '</div>')));

         echo T('Check all permissions that apply for each role');
         echo $this->Form->CheckBoxGridGroups($this->PermissionData, 'Permission');
         echo '</div>';
		}
      ?>
   </li>
</ul>
<?php echo $this->Form->Close('Save'); ?>