<table border="0">
    <tr>
        <td>
            <?php if ($mode == "add"): ?>
            <?php echo $this->KendbForm->input('obligation_code', array('type' => 'text')); ?>
            <?php else: ?>
            <div class="input text"><label><?php echo __('Obligation Code', true); ?></label>
            <?php echo $this->KendbForm->value('obligation_code'); ?>
            </div>
            <?php endif; ?>
        </td>
    </tr>
</table>

<table border="0">
    <tr>
        <td><?php echo $this->KendbForm->input('obligation_name'); ?></td>
        <td><?php echo $this->KendbForm->input('ob_represent_name'); ?></td>
        <td><?php echo $this->KendbForm->input('ob_job_title'); ?></td>
    </tr>
</table>

<table border="0">
    <tr>
        <td><?php echo $this->KendbForm->input('ob_postal_code_address', array('size' => 120)); ?></td>
    </tr>
</table>

<table border="0">
    <tr>
        <td><?php echo $this->KendbForm->input('ob_section'); ?></td>
        <td><?php echo $this->KendbForm->input('ob_person_in_charge'); ?></td>
        <td><?php echo $this->KendbForm->input('obligation_name_short'); ?></td>
    </tr>
</table>

<table border="0">
    <tr>
        <td><?php echo $this->KendbForm->input('ob_postal_code', array('size' => 10)); ?></td>
        <td><?php echo $this->KendbForm->input('ob_address', array('size' => 100)); ?></td>
    </tr>
</table>


<?php echo $this->element("form_tips"); ?>

