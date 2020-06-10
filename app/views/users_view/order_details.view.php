<?php require('app/views/partials/header.view.php'); ?>
    <link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">
    <link rel="stylesheet" href="app/public/css/user_styles/user_forms_style.css">

    <section>
        <?php require('app/views/partials/dashboard_sidenav.view.php'); ?>

        <article class="personal_info_div">
            <h1>Your orders</h1>

            <div class="order_details_table">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->user_id ?></td>
                            <td><?= $user->first_name ?></td>
                            <td><?= $user->last_name ?></td>
                            <td><?= $user->email_address ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </article>

    </section>

<?php require('app/views/partials/footer.view.php');