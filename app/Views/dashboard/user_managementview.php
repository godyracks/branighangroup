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
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>Admin</td>
                            <td>June 23, 2024 10:30 AM</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>Agent</td>
                            <td>June 22, 2024 9:45 AM</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="user-roles">
                <h3>User Roles</h3>
                <div class="role-list">
                    <div class="role">
                        <h4>Admin</h4>
                        <p>Can manage all aspects of the dashboard.</p>
                        <button>Edit</button>
                    </div>
                    <div class="role">
                        <h4>Agent</h4>
                        <p>Can manage properties and inquiries.</p>
                        <button>Edit</button>
                    </div>
                    <!-- Add more roles as needed -->
                </div>
            </div>
            <div class="user-activity">
                <h3>User Activity</h3>
                <ul class="activity-list">
                    <li>
                        <span class="date">June 23, 2024 10:30 AM</span>
                        <span class="activity">John Doe logged in.</span>
                    </li>
                    <li>
                        <span class="date">June 22, 2024 9:45 AM</span>
                        <span class="activity">Jane Smith updated property details.</span>
                    </li>
                    <!-- Add more user activities -->
                </ul>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>