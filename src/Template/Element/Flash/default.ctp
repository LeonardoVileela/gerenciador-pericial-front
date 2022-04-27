<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
    toastr.options = {
        positionClass: "toast-top-center",
        toast: true,
        showConfirmButton: false
    }

    toastr.info('<?= $message ?>');
</script>   