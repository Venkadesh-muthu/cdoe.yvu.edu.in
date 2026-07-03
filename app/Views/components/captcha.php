<?php
$idPrefix = $idPrefix ?? 'login';
$imageId = $idPrefix . '-captcha-image';
$inputId = $idPrefix . '-captcha-input';
$buttonId = $idPrefix . '-captcha-refresh';
?>

<div class="mb-3">
    <label class="form-label" for="<?= esc($inputId) ?>">Enter CAPTCHA</label>
    <div class="d-flex align-items-center gap-2 mb-2">
        <img
            id="<?= esc($imageId) ?>"
            src="<?= base_url('captcha/image') ?>?t=<?= time() ?>"
            alt="CAPTCHA image"
            width="180"
            height="52"
            class="border rounded bg-light"
        >
        <button
            type="button"
            id="<?= esc($buttonId) ?>"
            class="btn btn-outline-secondary"
        >
            Refresh CAPTCHA
        </button>
    </div>
    <input
        type="text"
        name="captcha"
        id="<?= esc($inputId) ?>"
        class="form-control"
        placeholder="Enter CAPTCHA"
        autocomplete="off"
        required
    >
</div>

<script>
    document.getElementById('<?= esc($buttonId) ?>').addEventListener('click', function () {
        document.getElementById('<?= esc($imageId) ?>').src = '<?= base_url('captcha/image') ?>?t=' + Date.now();
        document.getElementById('<?= esc($inputId) ?>').value = '';
        document.getElementById('<?= esc($inputId) ?>').focus();
    });
</script>
