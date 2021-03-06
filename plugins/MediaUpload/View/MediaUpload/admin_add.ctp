<?php
$this->TomatoCrumbs->addCrumbs(
    'Media Upload',
    Router::url(
        array(
            'plugin'     => 'media_upload',
            'controller' => 'media_upload',
            'action'     => 'index'
        )
    ),
    array()
)->addCrumbs(
    'Add',
    'javascript:void(0);',
    array(
        'class' => 'active'
    )
);
?>

<h3 class="page-header page-header-top"><i class="icon-plus-sign"></i> Media Upload</h3>

<?PHP echo $this->BootstrapForm->create('MediaUpload', array('novalidate' => true, 'type' => 'file')); ?>

<div class="form-box-content">
    <?PHP
    echo $this->BootstrapForm->input('path', array(
        'type'  => 'file',
        'label' => 'Select Image'
    ));
    ?>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input class="btn btn-success" id="btnSave" type="submit" value="Save">
            <button id="btnCancel" class="btn btn-danger" type="submit">Cancel / Back</button>
        </div>
    </div>
</div>

<?PHP echo $this->BootstrapForm->end(null); ?>
<script type="application/javascript">
    $(document).ready(function(){
        $("#btnCancel").unbind('click').bind('click', function(){
            location.href='<?PHP echo Router::url(array("action"=>'index')); ?>';
            return false;
        });
    });
</script>