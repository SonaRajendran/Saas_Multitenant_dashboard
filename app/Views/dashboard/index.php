<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<h1>Welcome to Dashboard</h1>
<h2>Usage Analytics</h2>
<table class="table">
    <thead>
        <tr>
            <th>Action</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($analytics as $stat): ?>
            <tr>
                <td><?= esc($stat['action']) ?></td>
                <td><?= esc($stat['count']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>