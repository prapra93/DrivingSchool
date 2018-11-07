<div class="users form ">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Are you sure to you want to change your password?') ?></legend>
    </fieldset>
    <?= $this->Form->button(__('YES')) ?>
    <?= $this->Form->end() ?>
</div>