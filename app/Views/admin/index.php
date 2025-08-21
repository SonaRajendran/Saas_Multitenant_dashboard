<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<h1>Admin Panel</h1>
<h2>Organizations</h2>
<ul>
    <?php foreach ($orgs as $org): ?>
        <li><?= esc($org['name']) ?></li>
    <?php endforeach; ?>
</ul>
<h2>All Users</h2>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Org ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['org_id']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Global Analytics</h2>
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