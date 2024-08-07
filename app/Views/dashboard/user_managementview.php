<?= $this->extend('layouts/dash_base') ?>
<?= $this->section('dash_content') ?>
<div class="container">
    <section class="user-management">
        <h2>User Management</h2>
        <div class="user-list">
            <h3>User List</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?? 'N/A' ?></td>
                        <td><?= $user['last_login'] ?? 'N/A' ?></td>
                        <td>
                            <a href="<?= base_url('dashboard/user/edit/'.$user['id']) ?>">Edit</a>
                            <a href="<?= base_url('dashboard/user/delete/'.$user['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
