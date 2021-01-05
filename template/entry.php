<div class="card mb-3">
    <div class="card-header">
        <span><b><?= $arguments['username'] ?></b>
            <small class="text-muted">schrieb am </small> <?= date('d.m.Y') ?> <small class="text-muted"> um </small> <?= date('H:i') ?>
        </span>
    </div>
    <div class="card-body">
        <?= $arguments['message'] ?>
    </div>
</div>